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
        $category = new Category();
        $category->name = $request->name;

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
        $category=Category::find($id);
        $category->name=$request->name;
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
