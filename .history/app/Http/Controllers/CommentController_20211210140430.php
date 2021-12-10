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
        $comment = $comment->orderBy("user_comment.comment_id", "Desc");

        $comment = $comment->paginate(20);
        return view('backend.layouts.Comments.allComment')->with('comment', $comment);
    }
    //Create comment
    public function createComment(){
        $hotel = DB::table('hotel')->select('hotel.*')->get();
        $user = DB::table('users_web')->select('users_web.*')->get();
        return view('backend.layouts.Comments.addComment', ['hotel'=> $hotel, 'user'=> $user]);
    }
}