<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;

//Duyen Controller
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = products::create($request->all());
        return response()->json([
            'message' => 'product created',
            'product' => $product
        ]); 
        // return products::create($request->all());
    }

  /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $products = products::find($id);
        if ($products) {
            return $products;
        }
        return response()->json([
            'message' => 'products not found!',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::find($id);
        if ($product) {
            $product->update($request->all());
            return response()->json([
                'message' => 'product updated!',
                'product' => $product
            ]);
        }
        return response()->json([
            'message' => 'product not found !!!'
        ]);

        // $product->update($request->all());
        // return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = products::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'message' => 'product deleted'
            ]);
        }
        return response()->json([
            'message' => 'product not found !!!'
        ]);
        //  return $product->delete();
    }
}