<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'rate'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\products','product_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\users','user_id','id');
    }
    public $appends =[
        'created_at'

    ];
    public function getCreatedAtAttribute(){
        
    }
}
