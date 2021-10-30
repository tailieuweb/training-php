<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
class FactoryPattern {

    public function make($model)
    {
        if ($model == 'user') {
            // Singleton pattern:
            return UserModel::getInstance();

            // Normal:
            // return new UserModel();
        } else if ($model == 'bank') {
            // Singleton pattern:
            return BankModel::getInstance();

            // Normal:
            // return new BankModel();
        }
    }
}
