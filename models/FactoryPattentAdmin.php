<?php
// require_once 'HomeModel.php';
// require_once 'ManufactureModel.php';
// require_once 'ProductModel.php';
// require_once 'ProtypeModel.php';
require_once 'UserModel.php';

class FactoryPattentAdmin{
    public function make ($model){
         if($model == 'user'){
            return UserModel::getInstance();
        }
        // else if($model == 'user'){
        //     return UserModel::getInstance();
        // }
        return null;
    }
}
?>