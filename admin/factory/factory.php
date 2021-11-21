<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}model{$ds}product.php");
require_once("{$base_dir}model{$ds}db.php");

use \SmartWeb\DataBase\DB;
use \SmartWeb\DataBase\Connect;

class Factory
{
    function make($model)
    {
        switch ($model) {
            case 'product':
               // return  Product::getInstance();
            case 'manufacture':
                //return  Manufacture::getInstance();
            case 'category':
                //return  Category::getInstance();
            default:
                return  null;
        }
    }
}
