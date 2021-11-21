<?php
require_once './models/UserModel.php';
require_once './models/BankModel.php';
class FactoryPattern {
    public function make($model){
        if($model === 'user'){
            return new UserModel();
        }
        else if($model === 'bank'){
            return new BankModel();    
        }
    }
}