<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    //
    private static $_instance;
    //
    public static function getInstance() {
        if (!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
