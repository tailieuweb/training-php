<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
class FactoryPattern {
    protected static $_instance;

    public function make($model) {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();
        }
    }

    /* singleton */
    public static function getInstance(){
        if (self::$_instance != null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}