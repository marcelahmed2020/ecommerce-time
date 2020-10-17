<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
  protected $guarded = [];
  public function editor()
  {
      return $this->belongsTo(\App\User::class, 'edit');
  }
  public function deleted_by()
  {
      return $this->belongsTo(\App\User::class, 'delete');
  }
  public function users()
  {
      return $this->morphToMany(\App\User::class, 'userable');
  }
}
