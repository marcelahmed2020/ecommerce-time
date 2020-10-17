<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];
    protected $table = 'orders';
    protected $fillable =['first_name','enabled','status','arrived','edit','delete','last_name','user_email'
        ,'user_id','country','address','city','zip','state','phone1','shiping_charges','coupon_code','coupon_amount','order_status','payment_method','grand_total'];

    public function order_products(){
        return $this->hasMany(OrderProducts::class,'order_id');
    }
}
