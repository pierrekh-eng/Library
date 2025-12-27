<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    protected $fillable = ["ISBN","title","price","mortgage","category_id"];
}
