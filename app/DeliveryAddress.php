<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $guarded = [];
    protected $table = 'delivery_addresses';

    protected $fillable =['user_id','ship_first_name','ship_last_name','ship_email','ship_country','ship_address','ship_city','ship_state','ship_zip','ship_phone1'];
}
