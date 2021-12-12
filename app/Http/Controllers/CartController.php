<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\products;
use App\Models\user_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


// Tuấn Cart Controller
class CartController extends Controller
{

    public  function Show(Request  $request){
        // display data of that user when user go to cart page
        $user_id = Auth::id();
        $address = "";
        $address_value_macdinh = " ";
        // Lấy đơn cuối add giá trị vào !
        if (order::where('user_id','=',$user_id)->first() != null){
            $address = order::where('user_id','=',$user_id)->orderBy('id','DESC')->first()->address;
        }
        // Nếu người dùng chưa mua  nhưng đã cập nhật address rồi thì gọi address vào
        elseif(order::where('user_id','=',$user_id)->first() == null && Auth::user()->address!=$address_value_macdinh){
            $address = Auth::user()->address;
        }
        // Nếu cả chưa mua và  address = gtri mặc định thì  thôi cho nó  là giá trị mặc định
        elseif(order::where('user_id','=',$user_id)->first() == null && Auth::user()->address==$address_value_macdinh){
            $address = " ";
        }
        $data_product_follow_user_id = User::find($user_id)->product_cart()->join('products',
            'products.id','=','user_cart.product_id')->get();
        $data_product_follow_user_id = $data_product_follow_user_id->makeHidden(['user_id']);
        $array_product_id = [];
        foreach($data_product_follow_user_id as $id_product){
            $array_product_id[] = $id_product->id;
        }
        $data_quantity = DB::table('user_cart')->select('product_id','quantity')->where('user_id','=',$user_id)->get();
        for ($i = 0 ; $i<count($data_quantity);$i++){
            $data_quantity[$i]->product_id = $array_product_id[$i];
        }
        return response()->json(['address'=>$address,'product'=>$data_product_follow_user_id , 'quantity'=>$data_quantity]);
    }

    public  function  Delete(Request  $request){
        if ($this->private_delete($request->product_id,Auth::id())){
            return response()->json(['status'=>'ok'],200);
        }
        else{
            return response()->json(['status'=>"Can't Delete "],404);
        }
    }

    public function Edit(Request  $request){
        // Edit - productid + quantity

        $datacheck  = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ];
        $validator = Validator::make($datacheck,[
            'product_id' => 'required',
            'quantity' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json("Not invalid input data");
        }
        // Regex handle data for just number in quantity have negative
        //  Regex handle data for just number in product id don't have negative
        $pattern_quantity = '/(^\-\d{1,}$|^\d{1,}$)/';
        $pattern_product_id = '/^\d{1,}$/';
        if (!preg_match($pattern_product_id,$request->product_id) || !preg_match($pattern_quantity,$request->quantity)  ){
            return  response()->json(['status'=>"Have a problem with data can't update your data"]);
        }
        $user_id = Auth::id();
        try {
            $cart =  user_cart::where('user_id','=',$user_id)->where('product_id','=',$request->product_id)->firstOrFail();

        }catch (\Exception $exception){
            return  response()->json(['status'=>"Have a problem with data can't update your data"]);
        }
        $UpdateValue = $cart['quantity'] + intval($request->quantity);
        if ($UpdateValue<0){
            return response()->json(['status'=> "Can't update "]);
        }
        else if ($UpdateValue == 0)
        {
            if ($this->private_delete($request->product_id,Auth::id())){
                return  response()->json(['status'=>'Update Success'],200);
            }
            else{
                return response()->json(['status'=>"Can't Delete "],404);

            }
        }
        user_cart::where('user_id','=',$user_id)->where('product_id','=',$request->product_id)->update(['quantity' => $UpdateValue]);
        return  response()->json(['status'=>'Update Success'],200);
    }

    public  function  Create(Request $request){
        // Create function use when user click on product and click add to cart in screen
        // If don't have in database will create and quantity of that is 1
        // If have we will  +1 for that and update to database


        $pattern_id = '/^\d{1,}$/';
        if (!preg_match($pattern_id,$request->product_id)){
            return  response()->json(['status'=>'So bi loi ? ']);
        }
        // End check data
        $id_user = Auth::id();
        $product_id = $request->product_id;

        try { // Not found will appear 404
            products::findOrFail($product_id);
        }catch (\Exception $exception){

            return  response()->json(['status'=>"Have a problem with data can't update your data"]);
        }

        $cart =  user_cart::where('user_id','=',$id_user)->where('product_id','=',$product_id)->first();
        if ($cart == null){
            DB::table('user_cart')->insert(['user_id'=>$id_user,'product_id'=>$product_id,'quantity'=>1]);
        }
        else{
            try {
                $cart =  user_cart::where('user_id','=',$id_user)->where('product_id','=',$request->product_id)->firstOrFail();
                $UpdateValue = $cart['quantity'] + 1;
                user_cart::where('user_id','=',$id_user)->where('product_id','=',$request->product_id)->update(['quantity' => $UpdateValue]);
            }catch (\Exception $exception){
                return  response()->json(['status'=>"Have a problem with data can't update your data"]);
            }
        }
        return response()->json(['status'=>"ok"],200);
        // Chưa return vì chưa biết return ra đâu  ? Có lẽ ra trang giỏ hàng
    }


    private  function  private_delete($product_idx,$user_id){
        if (!ctype_digit($product_idx)){
            return  false;
        }
        // End check data
        $id_user = $user_id;
        $product_id = $product_idx;

        try { // Not found will appear 404
            products::findOrFail($product_id);
        }catch (\Exception $exception){
            return  false;
        }
        $cart =  user_cart::where('user_id','=',$id_user)->where('product_id','=',$product_id)->first();
        if ($cart == null){
            DB::table('user_cart')->delete(['user_id'=>$id_user,'product_id'=>$product_id,'quantity'=>1]);
        }
        return  true;
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

    private function Xulyid($id){
        $dodaichuoi = strlen($id);
        $chuoitruoc = $this->getName(10);
        $chuoisau = $this->getName(22);
        $handle_id = base64_encode($chuoitruoc.$id. $chuoisau);
        return $handle_id;
    }

    private function DichId($id){
        $id = base64_decode($id);
        $handleFirst = substr($id,10);
        $idx = "";
        for ($i=0; $i <strlen($handleFirst)-22 ; $i++) {
            $idx.=$handleFirst[$i];
        }
        return  $idx;
    }




}
