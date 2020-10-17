<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pincodes extends Model
{
    protected $guarded = [];
//    protected $fillable = ['enabled','edit','delete'];

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
