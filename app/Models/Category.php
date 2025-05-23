<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
