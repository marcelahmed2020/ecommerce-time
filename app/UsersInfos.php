<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersInfos extends Model
{
 protected $table = 'users_infos';
 protected $fillable =  ['zip','birth','company','title','country','city','state','address','phone1','phone2','user_id'];
}
