<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cart::where('id_user', '=', Auth::id())->join('products', 'carts.id_product', '=', 'products.id')->get();

        if (count($data) == 0) {

            return response('Your cart is empty!', 200);
        } else {
            return response($data, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'id_product' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $checkExist = Cart::where([['id_user', '=', Auth::id()], ['id_product', '=', $fields['id_product']]])->get();

        if (count($checkExist) == 0) {
            $newdata = new Cart();
            $newdata->id_user = Auth::id();
            $newdata->id_product = $fields['id_product'];
            $newdata->quantity = $fields['quantity'];
            $newdata->save();

            return response('Add to cart successfully', 200);
        } else {
            $checkExist[0]->quantity = $checkExist[0]->quantity + $fields['quantity'];
            $checkExist[0]->save();
            return response('Add to cart successfully', 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $fields = $request->validate([
            'id_product' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $checkExist = Cart::where([['id_user', '=', Auth::id()], ['id_product', '=', $fields['id_product']]])->get();

        if (count($checkExist) == 0) {

            return abort(404, 'Item doesn\'t exist');
        } else {
            $checkExist[0]->quantity = $fields['quantity'];
            $checkExist[0]->save();
            return response('Update cart successfully', 200);
        }
    }

    /**
     * Remove a single item from list
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroySingleItem(Request $request)
    {
        $fields = $request->validate([
            'id_product' => 'required|integer',
        ]);

        $checkExist = Cart::where([['id_user', '=', Auth::id()], ['id_product', '=', $fields['id_product']]])->get();

        if (count($checkExist) == 0) {

            return abort(404, 'Item doesn\'t exist');
        } else {
            $checkExist[0]->delete();
            return response('Delete item from cart successfully', 200);
        }
    }
}
