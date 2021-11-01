<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';

class FactoryPattent {
    public function make($model){
        if($model == 'user'){
            return UserModel::getInstance();
        }
        else if($model == 'bank'){
            return BankModel::getInstance();
        }
        return null;
    }
}
?>