<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slide;
use App\Protype;
use App\Type;
use App\Product;
use App\Manufacture;
use App\Product_Size;
use App\Size;
use App\Comment;
use App\Account;
use App\Person;
use App\Customer;


class ProductController extends Controller
{
    //
    function __construct() {
		$manu = Manufacture::all();
		$type = Type::all();
        $pr_type = Protype::all();
		$protype = new Protype();
        $product = Product::getInstance();
        $manufacture = new Manufacture();
		view()->share(['protype'=>$protype,'type'=>$type,'manu'=>$manu,'manufacture' => $manufacture,'pr_type' => $pr_type ,'product'=>$product]);
	}
    //return shop page
    public function getListProduct(Request $request) {
        if($request->name != null) {
            $name = $request->name;
            $query = Product::select('*','products.id as pro_id',DB::raw('if(promotion_price > 0,promotion_price,price) as price_sell'))->join('protypes','products.protype_id','=','protypes.id')
            ->join('manufactures','products.manu_id','=','manufactures.id')
            ->where('protypes.protype_name','=',$name)
            ->orWhere('manufactures.manu_name','=',$name);
        }
        else {
            $query = Product::select('*','products.id as pro_id',DB::raw('if(promotion_price>0,promotion_price,price) as price_sell'));
        }        
        //switch case filter
        if($request->has('filter')) {
            $filter = $request->filter;
            switch ($filter){
                case "0":
                    break;
                case "1": //a->z
                    $query->orderBy('name','asc');
                    break;
                case "2": //z->a
                    $query->orderBy('name','desc');
                    break;
                    
                case "3": //giá tăng dần
                    $query->orderBy('price_sell','desc');
                    break;
                case "4": //giảm dần
                    $query->orderBy('price_sell','asc');
                    break;               
            }
        }
        $list_product = $query->paginate(6);
        $count = count($list_product);
        return view('customer.shop',compact('list_product','count'));
    }
    // return detail page  
    public function getDetail($id) {
        $detail_pro = Product::where('id','=',$id)->first();
        if($detail_pro == null) {
            return redirect('/error-system');
        }
        $pro_id = $detail_pro->id;
        $lienquan_pro = Product::where('protype_id','=',$detail_pro->protype_id)->get();
        $list_comment = Comment::where('pro_id','=',$id)->get();
        $account = new Account();
        $sizes = Product_Size::join('sizes','products_sizes.size_id','=','sizes.id')->where('products_sizes.pro_id','=',$pro_id)->get();
        return view('customer.detail',compact('detail_pro','lienquan_pro','list_comment','sizes','account'));
    } 
    //ADMIN MANAGER 
    //get list product page
    public function getList() {
        $list_product = Product::orderBy('feature','desc')->get();
        return view('admin.list-product', compact('list_product'));
    }
    //get add product page
    public function getAdd() {
        $list_size = Size::all();
        return view('admin.product-add', compact('list_size'));
    }
    //post add product
    public function postAdd(Request $request) {
        $this->validate($request,
			[
				'pro_image' => 'required|image|mimes:jpg,png,jpeg|max:100000',
                'name' => 'required|unique:products',
                'manufacture' => 'required',
                'protype' => 'required',
                'origin' => 'required',
                'description' => 'required',
                'price' => 'required|numeric|gte:100000|lte:10000000',
                'promotionPrice' => 'required|numeric|gte:100000|lte:10000000|lt:price',
                'feature' => 'required',
                'size' => 'required'
			],
			[
                'pro_image.required' => 'Please choose your image',
                'pro_image.image' => 'Wrong image format',
                'pro_image.max' => 'This image is too large',
				'name.required'=>'Please enter product name',
                'name.unique'=>'This name already exist',
                'description.required' => 'Please enter your description',
                'origin.required' => 'Please enter origin',
                'size.required' => 'Please choose size'
			]
		);
        $product = new Product;
        //check file exists
        if($request->hasFile('pro_image')) {
            $image = $request->file('pro_image');
            $image_name = $image->getClientOriginalName();
            $target_file = "images/" . $image_name;
            if(file_exists($target_file)) {
                return back()->with(['typeMsg'=>'danger','msg'=>'File already exists !']);
            } else {
                $image->move('images',$image_name);
                $product->pro_image = $image_name;
            }
        }
    	$product->manu_id = $request->manufacture;
    	$product->protype_id = $request->protype;
    	$product->name = $request->name;
    	$product->origin = $request->origin;
    	$product->price = $request->price;
        $product->promotion_price = $request->promotionPrice;
    	$product->description = $request->description;
    	$product->feature = $request->feature;
    	$product->save();
        //
        $pro_id = $product->id;
        $sizes = $request->size;
        foreach($sizes as $key => $item) {
            $product_size = new Product_Size();
            $product_size->pro_id = $pro_id;
            $product_size->size_id = $item;
            $product_size->save();
        }
    	return back()->with(['typeMsg'=>'success','msg'=>'Add product successfully !!!']);
    }
    //get edit product page 
    public function getEdit($id) {
        $product = Product::where('id','=',$id)->first();
        if($product == null) {
            return redirect('admin-page/error');
        }
        $list_size = Size::all();
        return view('admin.product-edit', compact('list_size','product'));
    }
    //post edit product 
    public function postEdit(Request $request) {
        $this->validate($request,
			[
				'pro_image' => 'image|mimes:jpg,png,jpeg|max:100000',
                'name' => 'required',
                'manufacture' => 'required',
                'protype' => 'required',
                'origin' => 'required',
                'description' => 'required',
                'price' => 'required|numeric|gte:100000|lte:10000000',
                'promotionPrice' => 'required|numeric|gte:100000|lte:10000000|lt:price',
                'feature' => 'required',
                'size' => 'required'
			],
			[
                'pro_image.image' => 'Wrong image format',
                'pro_image.max' => 'This image is too large',
				'name.required'=>'Please enter product name',
                'description.required' => 'Please enter your description',
                'origin.required' => 'Please enter origin',
                'size.required' => 'Please choose size'
			]
		);
        $subString = substr($request->pro_id, 36, -36);
        $id = base64_decode($subString);
        $product = Product::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($product == null) {
            return redirect('admin-page/error');
        }
        $tableProduct = Product::where('id','!=',$product->id)->get();
        $flag = true;
        foreach($tableProduct as $key => $item) {
            if($request->name == $item->name) {
                $flag = false;
                break;
            }
        }
        if($flag == false) {
            return back()->with(['typeMsg'=>'danger','msg'=>'This name already exist!!!']);
        }
        else {
            $product->manu_id = $request->manufacture;
            $product->protype_id = $request->protype;
            $product->name = $request->name;
            $product->origin = $request->origin;
            $product->price = $request->price;
            $product->promotion_price = $request->promotionPrice;
            $product->description = $request->description;
            $product->feature = $request->feature;
            //check file exists
            if($request->hasFile('pro_image')) {
                $image = $request->file('pro_image');
                $image_name = $image->getClientOriginalName();
                $target_file = "images/" . $image_name;
                if(file_exists($target_file)) {
                    return back()->with(['typeMsg'=>'danger','msg'=>'File already exists']);
                } else {
                    $image->move('images',$image_name);
                    $product->pro_image = $image_name;
                }
            }
            else {
                $oldProImage = $product->pro_image;
                $product->pro_image = $oldProImage;
            }
            $product->save();
            // xử lý cho bảng products_sizes
            $pro_id = $product->id;
            $sizes = $request->size;
            // xóa toàn bộ size cũ
            DB::table('products_sizes')->where('pro_id','=',$pro_id)->delete();
            foreach($sizes as $key => $item) {
                $product_size = new Product_Size();
                $product_size->pro_id = $pro_id;
                $product_size->size_id = $item;
                $product_size->save();
            }
            return back()->with(['typeMsg'=>'success','msg'=>'Edit product successfully !!!']);
        }
    }
    //getDelete
    public function getDelete($id) {
        $subString = substr($id, 36, -36);
        $id = base64_decode($subString);
        $product = Product::where(DB::raw('md5(id)'),'=',md5($id))->first();
        if($product == null) {
            return redirect('admin-page/error');
        }
        $pro_id = $id;
        //xóa product
        Product::destroy($pro_id);
        DB::table('products_sizes')->where('pro_id','=',$pro_id)->delete();
        //
    	return redirect(url('admin-page/product/list-product'))->with(['typeMsg'=>'success','msg'=>'Delete successfully !']);
    }
    //post comment
    public function postComment(Request $request){
        $subString = substr($request->account_id, 36, -36);
        $account_id = base64_decode($subString);
        $person = Person::where('account_id','=',$account_id)->first();
        //
        $subString1 = substr($request->pro_id, 36, -36);
        $pro_id = base64_decode($subString1);
        $product = Product::where('id','=',$pro_id)->first();
        if($person == null || $product == null) {
            return redirect('error-system');
        }
        //
        $comment = new Comment();
        $comment->pro_id = $product->id;
        $comment->account_id = $account_id;
        $comment->content = $request->content;
        $comment->save();
        //
        return back()->with(['typeMsg'=>'success','msg'=>'Thanks for your comment !!!']);
        
    }
}
