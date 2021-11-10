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
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
