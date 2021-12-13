<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Slide extends Model
{
    protected $table = "slide";
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'active',
        'title',
        'btn_text',
        'image',
        'des_1',
        'des_2',
        'color',
    ];
}
