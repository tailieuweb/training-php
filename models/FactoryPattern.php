<?php
require 'models/UserModel.php';
require 'models/BankModel.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return new BankModel();
        }
    }

}