<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->morphToMany(\App\User::class, 'userable');
    }
}
