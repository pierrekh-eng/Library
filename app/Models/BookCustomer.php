<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookCustomer extends Pivot
{
    protected $table = 'book_customer';
    protected $fillable = ['book_ISBN','customer_id','rate'];
}
