<?php

namespace AlgarTech;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id', 'name', 'quantity'
    ];
}
