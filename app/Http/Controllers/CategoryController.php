<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::withCount('books')->get();
        // return[
        //     'success'=>true,
        //     'message'=>'all Categories',
        //     'data'=>CategoryResource::collection($categories)
        // ];
        return ResponseHelper::success('all Categories',CategoryResource::collection($categories));
    }

    function store(Request $request){
        /*first way*/
        $validated=$request->validate([
            'name'=>'required|unique:categories,name|max:50'
        ]);
        $category = new Category();
        $category->name = $validated['name'];

        $category->save();
        // return[
        //     'success'=>true,
        //     'message'=>'category added successfully',
        //     'data'=>$category
        // ];
        return ResponseHelper::success('category added successfully',$category);
        /*
                    Second way 
        Category::Create($request->all());

        */
    }
    function update(Request $request,$id){
        $validated=$request->validate([
            'name'=>"required|unique:categories,name,$id|max:50"
        ]);
        $category=Category::find($id);
        $category->name=$validated['name'];
        $category->save();
        // return[
        //     'success'=>true,
        //     'message'=>'category updated successfully',
        //     'data'=>$category
        // ];
        // $category=Category::find($id)->update($request->all());
        return ResponseHelper::success('category updated successfully',$category);
    }
    function show($id){
        $category=Category::find($id);
        // return[
        //     'success'=>true,
        //     'message'=>'category showed successfully',
        //     'data'=>new CategoryResource($category)
        // ];
        return ResponseHelper::success('category showed successfully',new CategoryResource($category));
    }
    function destroy($id){
        $category=Category::find($id);
        if($category->books->count())
            return ResponseHelper::error('cant delete category has books');
        $category->delete();
        return ResponseHelper::success('category deleted successfully',null);
    }
}
