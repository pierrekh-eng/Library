<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        return[
            'success'=>true,
            'message'=>'all Categories',
            'data'=>$categories
        ];
    }

    function store(Request $request){
        /*first way*/
        $validated=$request->validate([
            'name'=>'required|unique:categories,name|max:50'
        ]);
        $category = new Category();
        $category->name = $validated['name'];

        $category->save();
        return[
            'success'=>true,
            'message'=>'category added successfully',
            'data'=>$category
        ];
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
        return[
            'success'=>true,
            'message'=>'category updated successfully',
            'data'=>$category
        ];
        // $category=Category::find($id)->update($request->all());
    }
    function show($id){
        $category=Category::find($id);
        return[
            'success'=>true,
            'message'=>'category showed successfully',
            'data'=>$category
        ];
    }
    function destroy($id){
        $category=Category::find($id)->delete();
        return[
            'success'=>true,
            'message'=>'category deleted successfully',
            'data'=>$category
        ];
    }
}
