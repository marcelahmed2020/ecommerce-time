<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = [];

    protected $table = 'currencies';
    protected $fillable =['name','code','symbol','exchange_rate'];
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
