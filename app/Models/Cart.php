<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity', 'amount', 'price'];
    //Set relationship with table products
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    //Count number of cart items
    public static function cartCount()
    {
        return Cart::with('product')->where('user_id', Auth::user()->id)->orderBy('id', 'ASC')->count();
    }
}
