<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Product;

class PageController extends Controller
{
    //Show list product
    public function listProducts()
    {
        $products = Product::paginate(2);
        return view('page.products')->with('products',$products); 
    }
    //get product detail by slug
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('page.product')->with('product', $product);
    }
    //Index page
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('index')->with('products', $products);
    }
}
