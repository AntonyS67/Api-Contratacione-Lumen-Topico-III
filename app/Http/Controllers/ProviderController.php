<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Provider;

class ProviderController extends Controller{
    public function store(Request $request){
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->city = $request->city;
        $provider->district = $request->district;
        if($request->file('image')){
            $file =  $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = '/public/uploads/image/provider/';
            $file->move(base_path().$path,$fileName);
            $provider->image = $path.$fileName;
        }
        if($provider->save()){
            return response()->json(['success'=>true,'data'=>$provider],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }

    public function getProvider($id,$taskId){
        $provider = Provider::join('providers_tasks','providers.id','=','providers_tasks.provider_id')
        ->join('tasks','tasks.id','=','providers_tasks.task_id')
        ->select(
            'providers.id as provider_id',
            'providers.name as provider_name',
            'providers.city as provider_city',
            'providers.district as provider_district',
            'providers.image as provider_image',
            'tasks.id as task_id',
            'tasks.name as task_name',
            'tasks.activity_id as task_activity_id',
            'providers_tasks.cost as provider_task_cost'
        )
        ->where('providers_tasks.provider_id','=',$id)
        ->where('providers_tasks.task_id','=',$taskId)
        ->first();

        return response()->json(['success'=>true,'data'=>$provider]);
    }
    public function getByTask($taskId){
        $providers = Provider::join('providers_tasks','providers.id','=','providers_tasks.provider_id')
        ->join('tasks','tasks.id','=','providers_tasks.task_id')
        ->select(
            'providers.id as provider_id',
            'providers.name as provider_name',
            'providers.city as provider_city',
            'providers.district as provider_district',
            'providers.image as provider_image',
            'tasks.id as task_id',
            'tasks.name as task_name',
            'tasks.activity_id as task_activity_id',
            'providers_tasks.cost as provider_task_cost'
        )
        ->where('providers_tasks.task_id','=',$taskId)
        ->get();

        return response()->json(['success'=>true,'data'=>$providers]);
    }

}