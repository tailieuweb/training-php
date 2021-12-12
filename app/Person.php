<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    //
    protected $table = 'persons';
    //
    private static $_instance;
    //
    public static function getInstance() {
        if (!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    //
    public function getPersonByAccountId($id) {
        $flag = is_integer($id);
        if($flag == false || $id < 1) {
            return false;
        }
        $person = DB::table('persons')->where('account_id','=',$id)->first();
        return $person;
    }
}
