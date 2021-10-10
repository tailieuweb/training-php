<?php
require_once 'models/UserModel.php';
class FactoryPattent{
    public function make ($model){
        if($model == 'user'){
            return UserModel::getInstance();
        }
        else if($model == 'bank'){
            
        }
    }
}
?>