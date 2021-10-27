<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $carts = Cart::with('product')->where('user_id', Auth::user()->id)->orderBy('id', 'ASC')->paginate(15);
            return view('page.cart')->with('carts', $carts);
        } else {
            request()->session()->flash('error', 'Please login for view cart!');
            return back();
        }
    }

    //Store product to cart
    public function addToCart(Request $request)
    {
        if (!Auth::user()) {
            request()->session()->flash('error', 'Please login for add product to cart!');
            return back();
        }
        $quant = $request->quantity;
        if (!$quant) {
            $quant = 1;
        }
        if (empty($request->slug)) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }
        $product = Product::where('slug', $request->slug)->first();
        // return $product;
        if (empty($product)) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
        // return $already_cart;
        if ($already_cart) {
            // dd($already_cart);
            $already_cart->quantity = $already_cart->quantity + $quant;
            $already_cart->amount = $product->price + $already_cart->amount;
            // return $already_cart->quantity;
            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $already_cart->save();
        } else {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = $product->price;
            $cart->quantity = $quant;
            $cart->amount = $cart->price * $cart->quantity;
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $cart->save();
        }
        request()->session()->flash('success', 'Product successfully added to cart');
        return back();
    }


    //Update cart quantity
    public function updateCart(Request $request)
    {
        if ($request->quantity) {
            foreach ($request->quantity as $position => $quant) {
                $id = $request->cartId[$position];
                $cart = Cart::find($id);
                if ($quant > 0 && $cart) {
                    if ($cart->product->stock < $quant) {
                        request()->session()->flash('error', 'Out of stock');
                        return back();
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                    if ($cart->product->stock <= 0) continue;
                    $after_price = $cart->product->price;
                    $cart->amount = $after_price * $quant;
                    $cart->save();
                }
            }
            return back()->with('success', 'Cart successfully updated!');
        } else {
            return back()->with('Cart Invalid!');
        }
    }

    //Remove product without cart
    public function removeCart($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            request()->session()->flash('success', 'Cart successfully removed');
            return back();
        }
        request()->session()->flash('error', 'Error please try again');
        return back();
    }
}
