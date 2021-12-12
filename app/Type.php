<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "types";
    //
    public function getTypeNameById($type_id) {
        $type = DB::table('types')->where('type_id','=',$type_id)->first();
        return $type;
    }
}
