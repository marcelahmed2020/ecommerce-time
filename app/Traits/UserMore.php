<?php
namespace App\Traits;
use App\Orders;
use App\ShopingCart;
use App\ShopingWishlist;

trait UserMore {
    public function image()
     {
        return $this->morphOne(\App\Image::class, 'imageable');
     }/**Get the User's image.**/
    public function usersinfos()
    {
        return $this->hasOne(\App\UsersInfos::class, 'user_id');
    }
    public function charges()
     {
        return $this->morphedByMany(\App\Charges::class, 'userable');
     }
    public function currencies()
     {
        return $this->morphedByMany(\App\Currency::class, 'userable');
     }
    public function products()
     {
        return $this->morphedByMany(\App\Product::class, 'userable');
     }/**Get the User's Produects.**/
    public function category()
     {
        return $this->morphedByMany(\App\Category::class, 'userable');
     } /**Get the User's category.**/
    public function tag()
     {
        return $this->morphedByMany(\App\Tag::class, 'userable');
     }  /**Get the User's Tags.**/
    public function pincodes()
     {
        return $this->morphedByMany(\App\Pincodes::class, 'userable');
     }
    public function coupon()
     {
        return $this->morphedByMany(\App\Coupon::class, 'userable');
     }  /**Get the User's Tags.**/
    public function users()
     {
        return $this->morphedByMany(\App\User::class, 'userable');
     }/**Get the User's Users.**/
    public function settinges()
    {
        return $this->morphedByMany(\App\Settings::class, 'userable');
    } /**Get the User's settinges.**/
    public function getUserImageAttribute()
    {
        return  ! empty($this->image->image)?$this->image->image:'default.png';
    } /**Get the User's Image.**/
    public function editor()
    {
        return $this->belongsTo(\App\User::class, 'edit');
    }
    public function deleted_by()
    {
        return $this->belongsTo(\App\User::class, 'delete');
    }
    public function cms()
     {
        return $this->morphedByMany(\App\CmsPage::class, 'userable');
     }  /**Get the User's Tags.**/
    public function orders(){
        return $this->hasMany(Orders::class,'user_id');
    }
    public function carts(){
        return $this->hasMany(ShopingCart::class,'user_id');
    }
    public function wishlist(){
        return $this->hasMany(ShopingWishlist::class,'user_id');
    }

}
