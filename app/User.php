<?php
namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Traits\UserMore;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use UserMore;
    protected $guarded = [];
    protected $appends = ['user_image'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['last_name','first_name', 'edit','delete','email', 'password','status','enabled'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime', ];

}
