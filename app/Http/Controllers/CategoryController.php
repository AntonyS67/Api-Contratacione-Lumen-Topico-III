<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller{
    public function index(){
        $categories = Category::all();

        return response()->json($categories,200);
    }
    public function store(Request $request){
        $category = new Category();
        $category->name = $request->name;
        if($request->file('image')){
            $file =  $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = '/public/uploads/image/category/';
            $file->move(base_path().$path,$fileName);
            $category->image = $path.$fileName;
        }

        if($category->save()){
            return response()->json(['success'=> true,'data'=>$category],200);  
        }
        return response()->json(['success'=>false,'data'=>''],200);  
    }

    public function getImage($id){
        $category = Category::find($id);
        if($category){
            return response()->json(['success'=>true,'data'=>$category],200);
        }
        return response()->json(['success'=>false,'data'=>''],200);
    }
}