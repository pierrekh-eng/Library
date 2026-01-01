<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookCustomerRequest;
use App\Models\BookCustomer;
use Illuminate\Http\Request;

class BookCustomerController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookCustomerRequest $request)
    {
        $bookCustomer=$request->validated();
        $bC=BookCustomer::updateOrCreate(
            [
                'book_ISBN'=>$bookCustomer['book_ISBN'],
                'customer_id'=>$bookCustomer['customer_id']
            ],
            ['rate'=>$bookCustomer['rate']]
        );
        return[
            'success'=>true,
            'message'=>'Rating saved',
            'data'=>$bC
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bookISBN,$customerId)
    {
        BookCustomer::where('book_ISBN',$bookISBN)
        ->where('customer_id',$customerId)
        ->delete();
        return[
            'success'=>true,
            'message'=>'Rating removed',
            'data'=>null
        ];
    }
}
