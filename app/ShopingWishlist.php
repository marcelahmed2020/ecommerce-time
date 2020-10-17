<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopingWishlist extends Model
{
    protected $table = 'shoping_wishlists';
    protected $fillable = ['title','short_desc','image','size','code','color','quantity','session_id','email','price','enabled','product_id','user_id'];
    protected $appends = ['product_image'];
    public function getProductImageAttribute()
    {
        return  ! empty($this->image)?$this->image:'default.png';
    }
}
