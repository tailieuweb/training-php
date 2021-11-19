<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oauth_token extends Model
{
    protected $table = 'oauth_access_tokens';
    use HasFactory;
}
