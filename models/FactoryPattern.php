<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
require_once 'models/Repository.php';

class FactoryPattern extends BaseModel{

    public function make($model) {
        if ($model == 'user') {
            return new UserModel();
        } else if ($model == 'bank') {
            return new BankModel();
        }else if($model == 'repository'){
            return new Repository();
        }
    }

}