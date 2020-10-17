<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $guarded = [];
    protected $fillable = ['product_id','image',];
}
