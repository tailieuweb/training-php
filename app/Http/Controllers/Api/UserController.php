<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;

class UserController  extends Controller
{
    public function index()
    {
        return users::all();
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = users::create($request->all());
        return response()->json([
            'message' => 'user created',
            'user' => $user
        ]);
       // return products::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(users $user)
    {
        return $user;
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
        $user = users::find($id);
        if ($user) {
            $user->update($request->all());
            return response()->json([
                'message' => 'user updated!',
                'user' => $user
            ]);
        } 
        return response()->json([
            'message' => 'user not found !!!'
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
        $user = users::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'deleted user'
            ]);
        } 
        return response()->json([
            'message' => 'user not found !!!'
        ]);
     //  return $product->delete();
    }
}
