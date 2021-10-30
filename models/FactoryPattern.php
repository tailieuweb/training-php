<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
class FactoryPattern {

    public function make($model) {
        switch($model) {
            case "user":
                return UserModel::getInstance();
                break;
            case "bank":
                return BankModel::getInstance();
                break;
            default:
                return NULL;
                break;
        }
    }
}