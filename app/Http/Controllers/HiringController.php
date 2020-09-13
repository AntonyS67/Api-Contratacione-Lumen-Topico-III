<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hiring;

use Carbon\Carbon;

class HiringController extends Controller{
    public function store(Request $request){
        $hiring = new Hiring();
        $hiring->task_id = $request->task_id;
        $hiring->provider_id = $request->provider_id;
        $hiring->address = $request->address;
        $hiring->end_date = Carbon::parse($request->end_date,'America/Lima');
        $hiring->start_date = Carbon::parse($request->start_date,'America/Lima');
        $hiring->start_time = Carbon::parse($request->start_time,'America/Lima')->subHour(5);
        $hiring->number_people = $request->number_people;
        $hiring->number_hours = $request->number_hours;
        $hiring->total = $request->total;

        if($hiring->save()){
            return response()->json(['success'=>true,'data'=>$hiring],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }
}