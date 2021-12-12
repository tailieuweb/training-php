<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    //Get all comment of user for the hotel
    public function getAllComment(){
        $comment = DB::table("user_comment")
            ->join('hotel', 'hotel.hotel_id', '=', 'user_comment.hotel_id')
            ->join('users_web', 'users_web.id', '=', 'user_comment.user_id')
            // ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
            ->select('user_comment.*','hotel.*', 'users_web.*');
        $comment = $comment->orderBy("user_comment.id", "Desc");

        $comment = $comment->paginate(20);
        return view('backend.layouts.Comments.allComment')->with('comment', $comment);
    }
}