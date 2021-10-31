<?php
require_once 'UserModel.php';
require_once 'BankModel.php';
require_once 'Repository.php';
class FactoryPattern
{
    protected static $_instance;
    // make function
    public function make($model)
    {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();
        } else if ($model == 'repository') {
            return Repository::getInstance();
        }
    }
    // Singleton Design Pattern
    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
