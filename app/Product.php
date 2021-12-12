<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $_instance;
    //
    public static function getInstance() {
        if (!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    //
    protected $table = "products";
    //count product by type id
    public function countProductByProtypeId($protype_id) {
        $quantity_product = DB::table('products')->where('protype_id','=',$protype_id)->count();
        return $quantity_product;
    }
    //get product by id
    public function getProductById($id) {
        $flag = is_integer($id);
        if($flag == false || $id < 1) {
            return false;
        }
        $product = DB::table('products')->where('id','=',$id)->first();
        return $product;
    }
}
