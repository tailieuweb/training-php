<?php
require_once 'models/UserModel.php';
class FactoryPattern{
    public function make($model){
        if($model=='user'){
            return UserModel::getInstance();
        }elseif($model=='bank'){
            return BankModel::getInstance();
        }
    }
}