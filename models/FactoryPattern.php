<?php
<<<<<<< HEAD
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
=======
require 'models/UserModel.php';
require 'models/BankModel.php';
>>>>>>> 1-php-202109/2-groups/9-I/1-25-Le
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return new BankModel();
        }
    }

}