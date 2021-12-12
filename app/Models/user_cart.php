<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_cart extends Model
{
    public $timestamps = false;


    use HasFactory;
    protected $table = 'user_cart';
}
