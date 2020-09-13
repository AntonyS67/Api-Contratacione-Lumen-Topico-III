<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller{
    public function index(){
        $tasks = Task::all();

        return response()->json($tasks,200);
    }

    public function store(Request $request){
        $task = new Task();
        $task->name = $request->name;
        $task->activity_id = $request->activity_id;

        if($task->save()){
            return response()->json(['success'=>true,'data'=>$task],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }

    public function getTask($id){
        $task = Task::find($id);
        if($task){
            return response()->json(['success'=>true,'data'=>$task],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }

    public function getByActivity($activityId){
        $task = Task::where('activity_id',$activityId)->with('activity')->get();

        return response()->json(['success'=>true,'data'=>$task],200);
    }
}