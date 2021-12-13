<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
{
    protected $table = "subgroup";
    protected $fillable = [
        'subgroup_name',
        'status',
    ];
    use HasFactory;
}
