<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SubFooter extends Model
{
    protected $table = "subfooter";
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'link',
        'footer_id',
    ];
}