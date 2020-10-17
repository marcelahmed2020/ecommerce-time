<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CategoryMore;
class Category extends Model
{
    use  CategoryMore;
    protected $guarded = [];

}
