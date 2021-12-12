<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table = 'customers';
    //
    private static $_instance;
    //
    public static function getInstance() {
        if (!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function getCustomerByPersonId($id) {
        $flag = is_integer($id);
        if($flag == false || $id < 1) {
            return false;
        }
        $customer = DB::table('customers')->where('person_id','=',$id)->first();
        return $customer;
    }
}
