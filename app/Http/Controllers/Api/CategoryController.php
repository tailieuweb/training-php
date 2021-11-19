<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return categories::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = categories::create($request->all());
        return response()->json([
            'message' => 'category created',
            'category' => $category
        ]);
       // return products::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {
        return $category;
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
        $category = categories::find($id);
        if ($category) {
            $category->update($request->all());
            return response()->json([
                'message' => 'category updated!',
                'category' => $category
            ]);
        } 
        return response()->json([
            'message' => ' category not found !!!'
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
        $category = categories::find($id);
        if ($category) {
            $category->delete();
            return response()->json([
                'message' => 'category deleted'
            ]);
        } 
        return response()->json([
            'message' => 'category not found !!!'
        ]);
     
    }
}
