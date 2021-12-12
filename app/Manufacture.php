<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    //
    protected $table = "manufactures";
    //
    public function getManuNameById($manu_id) {
        $manufacture = DB::table('manufactures')->where('id','=',$manu_id)->first();
        return $manufacture;
    }
}
