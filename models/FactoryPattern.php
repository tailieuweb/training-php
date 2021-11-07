<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
class FactoryPattern {

    public function make($model) {
        // Singleton pattern:
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();
        }
        else{
            return null;
        }
    }

}