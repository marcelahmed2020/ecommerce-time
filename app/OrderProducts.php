<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $guarded = [];
    protected $table = 'order_products';
    protected $fillable = ['user_id','order_id','product_id','title','short_desc','code','quntity','size','desc','price','enabled','status','edit','delete'];
    public function order(){
        return $this->belongsTo(Orders::class);
    }
    public function products(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
