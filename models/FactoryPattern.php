<?php
require_once 'models/UserModel.php';
class FactoryPattern {

    public function make($model){
        if($model == 'user'){
            return $model::getInstance();
        }else if ($model == 'bank'){
            return new BankModel();
        }
    }
}