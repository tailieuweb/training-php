<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Protype extends Model
{
    protected $table = "protypes";
    //
    public function getProtypeByTypeId($type_id) {
        $flag = is_integer($type_id);
        if($flag == false || $type_id < 1) {
            return false;
        }
        $protype = DB::table('protypes')->where('type_id','=',$type_id)->get();
        return $protype;
    }
    //
    public function getProtypeNameById($protype_id) {
        $flag = is_integer($protype_id);
        if($flag == false || $protype_id < 1) {
            return false;
        }
        $protype = DB::table('protypes')->where('id','=',$protype_id)->first();
        return $protype;
    }
}
