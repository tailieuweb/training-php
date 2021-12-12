<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\products;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // Watch comment Auth bao gồm cả quyền delete comment ở admin
    // đồng thời bao gồm phân quyền user r nhé
    // đã fix : Không có field id lên
    // Id không phải là số nguyên
    // Không tìm thấy id

    public function  WatchComment(Request $request)
    {
        if (!$request->has('product_id')) {
            return  response()->json(['status' => 'Please add product id to find comment'], 404);
        }
        $product_id = $request->query('product_id');
        if (!gettype($product_id) == 'integer') {
            return  response()->json(['status' => "Product id not is number "]);
        }
        try {
            $product = products::findOrFail($product_id);
        } catch (\Exception $e) {
            return  response()->json(['status' => 'error not found product id ']);
        }

        $allComment = comment::where('product_id', '=', $product->id)->get();
        // Khúc này  là check quyền của user
        if (Auth::guard('api')->check()) {
            // If có đăng nhập thì khúc dưới chưa bao gồm trường hợp  admin delete comment
            // Check comment của đúng user đó hiển thị ra danh sách quyền trên comment đó .

            foreach ($allComment as $comment) {
                if (Gate::allows('edit-comment', $comment)) {
                    $comment['quyen'] = 'edit,delete';
                } else {
                    $comment['quyen'] = "";
                }
            }
            // Khúc này là quyền delete  của admin nha
            if (Auth::user()->type == 1) {
                foreach ($allComment as $comment) {
                    if (Gate::allows('delete-comment', $comment)) {
                        if (empty($comment['quyen'])) {
                            $comment['quyen'] = 'delete';
                        }
                    }
                }
            }
        }
        return $allComment;
    }
    public  function WatchCommentNotAuth(Request  $request)
    {
        if (!$request->has('product_id')) {
            return  response()->json(['status' => 'Please add product id to find comment'], 404);
        }
        $product_id = $request->query('product_id');
        if (!gettype($product_id) == 'integer') {
            return  response()->json(['status' => "Product id not is number "]);
        }
        try {
            $product = products::findOrFail($product_id);
        } catch (\Exception $e) {
            return  response()->json(['status' => 'error not found product id ']);
        }
        $allComment = comment::where('product_id', '=', $product->id)->get();
        foreach ($allComment as $comment) {
            $comment['quyen'] = "";
        }
        return $allComment;
    }


    public function postComment(Request $request, $product_id)
    {
        $product = products::where('id', $product_id)->first();
        if ($product) {
            $validator = Validator::make($request->all(), [
                'content' => 'required',
                'rate' => ''
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation errors',
                    'status' => 500,
                    'errors' => $validator->message()
                ], 422);
            }
            
            $rate;
            if ($request->rate == null) {
                $rate = 1;
            } else {
                $rate = $request->rate;
            }
            $comment = comment::create([
                'content' => $request->content,
                'product_id' => $product->id,
                'user_id' => $request->user()->id,
                'rate' => $rate
            ]);

            $comment->load('user');
            return response()->json([
                'message' => 'comment successfully',
                'comment' => $comment
            ], 200);
        } else {
            return response()->json([
                'message' => 'Product not found',
            ], 400);
        }
    }

    public function editComment(Request $request, $id)
    {
        $comment = comment::with(['user'])->where('id', $id)->first();

        if ($comment) {
            if ($comment->user_id == $request->user()->id) {
                $validator = Validator::make($request->all(), [
                    'content' => 'required',
                    'rate' => ''
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => 'Validation errors',
                        'status' => 500,
                        'errors' => $validator->message()
                    ], 422);
                }

                $comment->update([
                    'content' => $request->content,
                    'rate' => $request->rate

                ]);
                return response()->json([
                    'message' => "Comment successfully updated",
                    'comment' => $comment
                ], 200);
            } else {
                return response()->json([
                    'message' => "You can't edit this comment",
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'Comment not found',
            ], 400);
        }
    }

    public function deleteComment(Request $request, $id)
    {
        $comment = comment::with(['user'])->where('id', $id)->first();
        if ($comment) {   
            if (Auth::user()->type == 1) {
                $comment->delete();
                return response()->json([
                    'message' => "Comment successfully deleted",
                ], 200);
            } else {
                if ($comment->user_id == $request->user()->id) {
                    $comment->delete();
                    return response()->json([
                        'message' => "Comment successfully deleted",
                    ], 200);
                } else {
                    return response()->json([
                        'message' => "You can't delete this comment",
                    ], 403);
                }
            }
        } else {
            return response()->json([
                'message' => 'Comment not found',
            ], 400);
        }   
    }
	

    //Resource comment

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $comments = comment::all()->toArray();
        $return = [];
        foreach($comments as $item){
            $item['id'] = $this->Xulyid($item['id']);
            $return[] = $item;
        }
        return response()->json($return);
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
        $product_id = $request->product_id;
        $product = products::where('id',$product_id)->first();
      
        if($product){
            $validator = Validator::make($request->all(),[
                'content' => 'required',
                'rate'=> ''
            ]);
            if($validator->fails()){
                return response()->json([
                    'message' => 'Validation errors',
                    'status' => 500,
                    'errors' => $validator->message()],422);
            }
            
            $rate;
            if($request->rate == null){
                $rate = 1;
            }else{
                $rate = $request->rate;
            }
                    $comment = comment::create([
                        'content' => $request->content,
                        'product_id' => $product->id,
                        'user_id' => $request->user()->id,
                        'rate' => $rate
                        ]);
                      
                    
                $comment->load('user');
                return response()->json([
                    'message'=>'comment successfully',
                    'comment' => $comment
                ],200); 
    
        }else{
            return response()->json([
                'message' => 'Product not found',
            ],400);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      
        $com_id = $this->DichId($id);
        $comment = comment::find($com_id); 
        if ($comment) {
            return response()->json([
                'message' => 'comment found by id!',
                'comment' => $comment,
            ]);
        }
        return response()->json([
            'message' => 'comment not found!',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = comment::find($id);
        return response()->json([
            'message' => 'comment found !',
            'comment' => $comment,
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
        $com_id = $this->DichId($id);
        $comment = comment::with(['user'])->where('id',$com_id)->first();
        if($comment){
            if($comment->user_id == Auth::user()->id){
                $validator = Validator::make($request->all(),[
                    'content' => 'required',
                    'rate'=> ''
                ]);
                if($validator->fails()){
                    return response()->json([
                        'message' => 'Validation errors',
                        'status' => 500,
                        'errors' => $validator->message()],422);
                }
                $comment->update([
                    'content' => $request->content,
                    'rate'=> $request->rate
                    
                ]);
                return response()->json([
                    'message' => "Comment successfully updated",
                    'comment' => $comment
                ],200);
            }else{
                return response()->json([
                    'message' => "You can't edit this comment",
                ],403);
            }
        }else{
            return response()->json([
                'message' => 'Comment not found',
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $com_id = $this->DichId($id);
        $comment = comment::with(['user'])->where('id',$com_id)->first();
   
        if($comment){
            if (Auth::user()->type == 1){
                $comment->delete();
                return response()->json([
                    'message' => "Comment successfully deleted",
                ],200);
            }
            else{
                if($comment->user_id==$request->user()->id){
                    $comment->delete();
                    return response()->json([
                        'message' => "Comment successfully deleted",
                    ],200);
                }
                else{
                    return response()->json([
                        'message' => "You can't delete this comment",
                    ],403);
                }
            }
           
        }else{
            return response()->json([
                'message' => 'Comment not found',
            ],400);
        }
    }

    private function getName($n) {
        $characters = '162379812362378dhajsduqwyeuiasuiqwy460123';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public  function Xulyid($id):String {
        $dodaichuoi = strlen($id);
        $chuoitruoc = $this->getName(10);
        $chuoisau = $this->getName(22);
        $handle_id = base64_encode($chuoitruoc.$id. $chuoisau);
        return $handle_id;
    }

    public function DichId($id){
        $id = base64_decode($id);
        $handleFirst = substr($id,10);
        $idx = "";
        for ($i=0; $i <strlen($handleFirst)-22 ; $i++) {
            $idx.=$handleFirst[$i];
        }
        return  $idx;
    }
}
