<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::all();
        return[
            'success'=>true,
            'message'=>'all books',
            'data'=>$books
        ];
    }
    public function bookByTitle(Request $request){
        $title = $request->title;
        $book=Book::where('title','like',"%$title%")->get();
        return[
            'success'=>true,
            'message'=>'book by title successfully',
            'data'=>$book
        ];
    }
    public function bookByCategoryId(Request $request){
        $category_id=$request->category_id;
        $book=Book::where('category_id',$category_id)->get();
        return $book;
        /*return[
            'success'=>true,
            'message'=>'book by category id successfully',
            'data'=>$book
        ];*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book=Book::create($request->all());
        return[
            'success'=>true,
            'message'=>'book added successfully',
            'data'=>$book
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return[
            'success'=>true,
            'message'=>'book showed successfully',
            'data'=>$book
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return[
            'success'=>true,
            'message'=>'book updated successfully',
            'data'=>$book
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return[
            'success'=>true,
            'message'=>'book deleted successfully',
            'data'=>$book
        ];
    }
}
