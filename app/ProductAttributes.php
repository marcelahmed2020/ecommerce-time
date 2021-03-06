<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $guarded = [];
    protected $fillable = ['edit','sku','size','stock','product_id','price','purchasing_price',];

    public function products()
    {
        return $this->hasMany('App\Product','id');
    }
}
