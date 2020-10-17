<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];
    protected $table = 'coupons';
    protected $fillable = ['coupon_code','amount','amount_type','expire_date','enabled','status','edit','delete'];
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
