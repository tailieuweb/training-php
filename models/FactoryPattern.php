<?php
<<<<<<< HEAD
<<<<<<< HEAD
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
=======
require_once './repository/RepositoryUser.php';
require_once './repository/RepositoryBank.php';
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
=======
require_once 'UserModel.php';
require_once 'BankModel.php';
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
<<<<<<< HEAD
<<<<<<< HEAD
            return UserModel::getInstance();
        } else if ($model == 'bank') {
            return BankModel::getInstance();    
=======
            //Singleton
            return new RepositoryUser();
        } else if ($model == 'bank') {
            return new RepositoryBank();
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
=======
            return UserModel::getInstance();
        } else if ($model == 'banks') {
            return BankModel::getInstance();
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
        }
    return null;
    }
}