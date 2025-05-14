<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'product_category';


    public $incrementing = true;

    protected $fillable = [
        'category_id',
        'product_id',
    ];
}