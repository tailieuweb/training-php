<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//test models

class users extends Model
{
    protected $fillable = [
        'Username',
        'email',
        'password',
        'phone',
        'type',
        'address',
    ];
   
}
