<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['gender','phone','avatar','user_id'];

    function books(){
        return $this->belongsToMany(Book::class)
        ->using(BookCustomer::class)
        ->withPivot('rate')
        ->withTimestamps();
    }
}
