<?php

namespace App\Http\Controllers;

use App\Models\order_details;
use App\Models\review;
use App\Models\user_cart;
use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\DB;
use App\Models\categories;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all()->toArray();
        $return = [];
        foreach($products as $item){
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_name'=>'required|unique:products,product_name',
        ]);

            if ($validator->fails()){
                return response(['errors'=>$validator->errors()->all()], 422);
            }

        $product = new products([
            'product_name' => $request->get('product_name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'quantity' => $request->get('quantity'),
          //  'product_image' => basename($request->file('product_image')->store('public/images')),
            'category_id' => $request->get('category_id'),
            'product_image' => $request->product_image
        ]);

        $product->save();
        return response()->json([
            'message' => 'product created',
            'products' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) //get item by id
    {
        $pro_id = $this->DichId($id);
        $product = products::find($pro_id);
        if ($product) {

            return response()->json([
                'message' => 'product found!',
                'product' => $product,
            ]);
        }
        return response()->json([
            'message' => 'product not found!',
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //update
    {
        $list = products::all()->toArray();
        $return = [];
        foreach($list as $item){
            $item['id'] = $this->Xulyid($item['id']);
            $return[] = $item;
        }

      $pro_id = $this->DichId($id);
      $product = products::find($pro_id);


      if($product){


      $validator = Validator::make($request->all(),[
        'product_name'=>'required',

    ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $pro_name;
          //Kiem tra product_name da co hay chua, co bi trung khong
          if($request->product_name == $list[0]['product_name']){
            return response()->json([
                'message' => 'The product_name has been exits!!!',
            ]);
        }else{
            $pro_name = $request->product_name;
        }


        $product->update([
        $product->product_name = $pro_name,
        $product->price = $request->get('price'),
        $product->description = $request->get('description'),
        $product->quantity = $request->get('quantity'),
        // $product->pro_image = $request->get('pro_image');
        ]);


        $product->save();
        return response()->json([
            'message' => 'product updated!',
            'product' => $product
        ]);

      }

        return response()->json([
            'message' => 'product not found !!!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //remove
    {
        $id = $this->DichId($id);
        $pattern_id = '/^\d{1,}$/';
        if (!preg_match($pattern_id,$id)){
            return  response()->json(['message'=>'Please type id is a number']);
        }
        $flag = true;
        $product = products::find($id);
        if ($product) {
            if (!$product) {
                return response()->json([
                    'message' => 'product not found !!!'
                ]);
            }

            $userCartListTemp = user_cart::where("product_id", "=", $id)->get();
            $ordersDetailListTemp = order_details::where("product_id", "=", $id)->get();

            if (count($userCartListTemp) !== 0) {
                $flag = false;
            }
            if (count($ordersDetailListTemp) !== 0) {
                $flag = false;
            }

            if ($flag) {
                $reviewsListRemove = review::where("product_id", "=", $id)->delete();
                $product->delete();
                return response()->json([
                'message' => 'product and reviews depended deleted'
            ]);
        }
        }
        return response()->json([
            'message' => "can't delete product because have related ingredients."
        ]);
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


    public function getSearch(Request $request){
        $product = products::where('product_name','like','%'.$request->key.'%')
                            ->orwhere('price','like','%'.$request->key.'%')
                            ->get();
                         //   return view('admin.product.search', compact('product'));
                           if($product){
                            if(empty(count($product))){
                                return response()->json([
                                    'message' => 'product not found!',
                                ]);
                            }
                            else{
                                return response()->json([
                                    'message' => count($product). ' product found!!!',
                                    'item' => $product
                                ]);
                            }
                        }
                    }
                    public function GetProductById(Request $request){
                        if (!$request->has('id')){return  response()->json(['error'=>'Please Type id product ']);};
                        $id = $request->query('id');
                        // Todo fix id không phải là số , số âm , số thực , là chuỗi , null , empty

                        $pattern_product_id = '/^\d{1,}$/';
                        if (!preg_match($pattern_product_id,$id)){
                            return  response()->json(['status'=>"Please Type Id is Correct is a Number"]);
                        }
                        try { // Tìm kiếm product id nếu không ra thì vô cái cục catch thôi
                         $product = products::findOrFail($id);
                        $catename = categories::find($product->category_id);
                         $category_SameType = $product->category_id;
                         $sosp1trang = 4 ;
                         $productSameType = DB::select("    SELECT * FROM `products` WHERE products.category_id = $category_SameType  ORDER BY RAND() LIMIT $sosp1trang;");
                        }catch (\Exception $exception){
                            return  response()->json(['status'=>"Not Found Product "]);
                        }
                        return  response()->json(['product'=>$product,'category'=>$catename,'SanphamcungLoai'=>$productSameType]);


                    }

}
