<?php
require_once 'models/BaseModel.php';
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';

class FactoryPattern
{

    private function __construct()
    {
    }

    private function __clone()
    {
    }
    private function __wakeup()
    {
    }

    public static function make($model_string)
    {
        if ($model_string === 'user') {
            return UserModel::getInstance();
        } else if ($model_string === 'bank') {
            return BankModel::getInstance();
        }

        //return null if $model is empty or not match with any keywords model.
        return null;
    }
}