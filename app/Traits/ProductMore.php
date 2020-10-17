<?php
namespace App\Traits;
trait ProductMore {
    /**Get the Product's image.**/
    public function image()
    {
        return $this->morphOne(\App\Image::class, 'imageable');
    }
    /**Get the Product's tage.**/
    public function tags()
    {
        return $this->morphToMany(\App\Tag::class, 'taggable');
    }
    /**Get the Product's category.**/
    public function category()
    {
        return $this->hasOne('App\Category','id','cat_id');
    }
    /**Get the Product's users .**/
    public function users()
    {
        return $this->morphToMany(\App\User::class, 'userable');
    }
    public function getProductImageAttribute()
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
    public function product_attributes()
    {
        return $this->hasMany(\App\ProductAttributes::class);
    }
    public function product_images()
    {
        return $this->hasMany(\App\ProductImages::class);
    }

}
