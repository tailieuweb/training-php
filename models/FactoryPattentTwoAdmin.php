<?php
require_once 'ManufactureModel.php';
require_once 'ProductModel.php';
require_once 'ProtypeModel.php';
require_once 'OrderModel.php';

class FactoryPattentTwoAdmin{
    public function make ($model){
        if($model == 'manu'){
            return ManufactureModel::getInstance();
        }
        else if($model == 'product'){
            return ProductModel::getInstance();
        }
         if($model == 'protype'){
            return ProtypeModel::getInstance();
        }
        else if($model == 'order'){
            return OrderModel::getInstance();
        }
        return null;
    }
}
?>