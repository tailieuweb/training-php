<?php
require_once 'models/UserModel.php';
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
<<<<<<< HEAD
            return new UserModel();
        } else if ($model == 'bank') {
            //
=======
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            //return new BankModel();
>>>>>>> 1-php-202109/2-groups/11-K/master
        }
    }

}