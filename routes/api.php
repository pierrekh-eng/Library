<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
                    /*Category Routes */
Route::get('/categories',[CategoryController::class,'index']);
Route::post('/category',[CategoryController::class,'store']);
Route::put('/update-category/{id}',[CategoryController::class,'update']);
Route::get('/show-category/{id}',[CategoryController::class,'show']);
Route::delete('/delete-category/{id}',[CategoryController::class,'destroy']);

                    /*Book api resource */
Route::apiResource('/book',BookController::class);
Route::get('/book-by-title',[BookController::class,'bookByTitle']);
Route::get('/book-by-category-id',[BookController::class,'bookByCategoryId']);
