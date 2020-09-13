<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
class ActivityController extends Controller{
    public function index(){
        $activities = Activity::all();

        return response()->json($activities,200);
    }

    public function store(Request $request){
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->category_id = $request->category_id;

        if($activity->save()){
            return response()->json(['success'=>true,'data'=>$activity],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }

    public function getActivity($id){
        $activity = Activity::find($id);
        if($activity){
            return response()->json(['success'=>true,'data'=>$activity],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }

    public function getByCategory($categoryId){
        $activity = Activity::where('category_id',$categoryId)->with('category')->get();
        return response()->json(['success'=>true,'data'=>$activity],200);
    }
}