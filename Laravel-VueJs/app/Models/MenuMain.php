<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuMain extends Model
{
    protected $fillable = [
        'name',
        'link',
        'enabled'
    ];
    protected $table = "menumain";

    use HasFactory;
}
