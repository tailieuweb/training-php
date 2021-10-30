<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'users') {
            //singleton
            return UserModel::getInstance();

            // Normal return:
            // return new UserModel();
        } else if ($model == 'bank') {
            return BankModel::getInstance();

            //Normal return:
            // return new BankModel();
        }
    }

}