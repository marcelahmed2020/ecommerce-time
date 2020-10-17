<?php
namespace App\Traits;
trait TagMore {
    /**Get the Product's tage.**/
    public function products()
    {
        return $this->morphedByMany(\App\Product::class, 'taggable');
    }
    /**Get the Product's users .**/
    public function users()
    {
        return $this->morphToMany(\App\User::class, 'userable');
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
