<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Slide;
use App\Protype;
use App\Product;
use App\Seller;
class PageController extends Controller
{
    //USER LAYOUT
    //return home page
    public function getIndex() {
        //get all slide
        $slide = Slide::all();
        $protype = Protype::all();
        //sản phẩm nổi bật, paginate
        $feature_product = Product::where('feature','=','1')->paginate(4);
        return view('customer.home',compact('slide','protype','feature_product'));
    }
    // return about page
    public function getAbout() {
        return view('customer.about');
    }  
    // return cart page  
    public function getCart() {
        $cart = session()->get('cart');
		if($cart != null) {
			return view('customer.cart',compact('cart'));
		}	
		else {
			return view('customer.cart');
		}	
    } 
    // return wishlist page  
    public function getWishList() {
        return view('customer.wishlist');
    } 
    // return service page  
    public function getService() {
        return view('customer.service');
    }
    //return contact page
    public function getContact() {
        return view ('customer.contact');
    }
    //
    public function getAdminPage() {
        return view('admin.index');
    }
    //
    public function getErrorAdmin() {
        return view('admin.404');
    }
    //
    public function getErrorCustomer() {
        return view('customer.500');
    }
}
