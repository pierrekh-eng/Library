<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = Author::all();
        return[
            'success'=>true,
            'message'=>'all authors',
            'data'=>$author
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author=Author::create($request->validated());
        return[
            'success'=>true,
            'message'=>'author added successfully',
            'data'=>$author
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return[
            'success'=>true,
            'message'=>'author showed successfully',
            'data'=>$author
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return[
            'success'=>true,
            'message'=>'author updated successfully',
            'data'=>$author
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return[
            'success'=>true,
            'message'=>'author deleted successfully',
            'data'=>null
        ];
    }
}
