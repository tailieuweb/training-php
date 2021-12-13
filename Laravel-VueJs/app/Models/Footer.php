<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Footer extends Model
{
    //model
    protected $table = "footer";
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'topics',
        'subfooter',
    ];
}