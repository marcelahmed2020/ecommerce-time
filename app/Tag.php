<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TagMore;
class Tag extends Model
{
    use TagMore;
    protected $guarded = [];

}
