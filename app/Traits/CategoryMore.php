<?php
namespace App\Traits;
trait CategoryMore {
    /*Get the Products for the Category.*/
    public function products()
    {
        return $this->hasMany('App\Product','cat_id');
    }
    /**Get the Product's users .**/
    public function users()
    {
        return $this->morphToMany(\App\User::class, 'userable');
    }
    public function category()
    {
        return $this->hasOne('App\Category','id');
    }
      public function categories_ch()
    {
        return $this->hasMany('App\Category','parent');
    }
    public function editor()
    {
        return $this->belongsTo(\App\User::class, 'edit');
    }
    public function deleted_by()
    {
        return $this->belongsTo(\App\User::class, 'delete');
    }
}
