<?php
require_once 'models/UserModel.php';
<<<<<<< HEAD
// require_once 'models/BankModel.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') 
        {
            return new UserModel();
        } else if ($model == 'bank') {
            // return new BankModel();
=======
require_once 'models/BankModel.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {

            return new UserModel();
        } else if ($model == 'bank') {
            return new BankModel();

>>>>>>> 1-php-202109/2-groups/11-K/master
        }
    }

}