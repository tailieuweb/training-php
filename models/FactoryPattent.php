<?php
require_once 'HomeModel.php';

class FactoryPattent{
    public function make($model){
        if($model == 'home'){
            return HomeModel::getInstance();
        }
        // else if($model == 'user'){
        //     return UserModel::getInstance();
        // }
        return null;
    }
}
?>