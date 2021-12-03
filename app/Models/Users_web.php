<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_web extends Authenticate
{
    use HasFactory,Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_web';
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      //profile Models được gọi tương ứng với giá trị id của bảng Users_web 
      public function profile(){
        return $this->hasOne(Profile_User::class,'user_id');
    }
}
