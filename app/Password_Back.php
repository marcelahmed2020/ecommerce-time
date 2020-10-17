<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_Back extends Model
{
    protected $table = 'password__backs';
    protected $fillable = ['email','token'];
}
