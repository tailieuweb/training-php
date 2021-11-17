<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response($products, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tempString = explode('-', $slug);
        $id = $tempString[count($tempString) - 1];

        $result = Product::where('id', $id)->get();

        if (count($result) == 0) {
            abort(404, 'Products not found');
        }

        return response($result, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Search product by key
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function searchByName($key)
    {
        $result = Product::where('name', 'like', '%' . $key . '%')->get();

        if (count($result) == 0) {
            abort(404, 'Products not found');
        }

        return response($result, 200);
    }

    /**
     * Get product by categories
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getByCategory($id)
    {
        $result = Product::where('category', '=', $id)->get();

        if (count($result) == 0) {
            abort(404, 'Products not found');
        }

        return response($result, 200);
    }
}
