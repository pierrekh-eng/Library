<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCustomerController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
                    /*Category Routes */

Route::middleware('auth:sanctum')->group(function(){
    Route::controller(CategoryController::class)->group(
        function(){
            Route::get('/categories','index');
            Route::post('/category','store');
            Route::put('/update-category/{id}','update');
            Route::get('/show-category/{id}','show');
            Route::delete('/delete-category/{id}','destroy');
        }
    );

    /*Route::get('/categories',[CategoryController::class,'index']);
    Route::post('/category',[CategoryController::class,'store']);
    Route::put('/update-category/{id}',[CategoryController::class,'update']);
    Route::get('/show-category/{id}',[CategoryController::class,'show']);
    Route::delete('/delete-category/{id}',[CategoryController::class,'destroy']);*/

                        /*Book api resource */
    Route::apiResource('/book',BookController::class);
    Route::get('/book-by-title',[BookController::class,'bookByTitle']);
    Route::get('/book-by-category-id',[BookController::class,'bookByCategoryId']);

                        /*Author api resource route */
    Route::apiResource('/authors',AuthorController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('current-user',function(){
    return['user'=>Auth::user()->currentAccessToken()];
});
                    /*Rating */
Route::post('/book-customer', [BookCustomerController::class, 'store']);
Route::delete('/book-customer/{bookISBN}/{customerId}', [BookCustomerController::class, 'destroy']);
