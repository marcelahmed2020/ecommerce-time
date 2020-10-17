<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Settings extends Model
{
    protected $table = 'settings';
    protected $fillable = ['site_name','phone','facebook','twitter','instagram','linkedin','email','description','keywords','status','message_maintenance',
        'facebook_status', 'adress','instagram_status','linkedin_status', 'twitter_status','head_office',
        'latitude',
        'longitude','logo','date',
    ];
}
