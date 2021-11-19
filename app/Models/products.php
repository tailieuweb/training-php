<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'product_image',
        'description',
        'quantity'
        
    ];
    
    public function categories()
    {
        return $this->belongsTo('App\Models\categories');
    }
}
