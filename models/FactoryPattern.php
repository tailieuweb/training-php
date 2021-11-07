<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';

class FactoryPattern {
    public function make($model) {
        if ($model == 'user') {
            //sua lai dong nay
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();
        }
    }
}