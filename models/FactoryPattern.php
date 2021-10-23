<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
require_once './repository/Repository.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return new BankModel();
        }else if($model == 'repository'){
            return new Repository();
        }
    }

}