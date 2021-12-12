<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\review;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\user_cart;

//Duyen Controller
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pattern_id = '/^\d{1,}$/';
        // Chỉ được nhập số nhập chữ báo lỗi ngay số âm con khỉ gì đi bụi hết
        if (!preg_match($pattern_id,$id)){
            return  response()->json(['message'=>'Please type id is a number']);
        }
        $flag = true;
        $user = users::find($id);
        if (!$user) {
            return response()->json([
                'message' => 'user not found !!!'
            ]);
        }

        $userCartListTemp = user_cart::where("user_id", "=", $id)->get();
        $ordersListTemp = order::where("user_id", "=", $id)->get();
        $reviewsListTemp = review::where("user_id", "=", $id)->get();

        if (count($userCartListTemp) !== 0) {
            $flag = false;
        }
        if (count($ordersListTemp) !== 0) {
            $flag = false;
        }
        if (count($reviewsListTemp) !== 0) {
            $flag = false;
        }

        if ($flag) {
            $user->delete();
            return response()->json([
                'message' => 'deleted user'
            ]);
        }
        return response()->json([
            'message' => "can't delete user because have related ingredients."
        ]);
    }
}
