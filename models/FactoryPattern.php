<?php
<<<<<<< HEAD
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
=======
require_once './repository/RepositoryUser.php';
require_once './repository/RepositoryBank.php';
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
class FactoryPattern {

    public function make($model) {
        if ($model == 'user') {
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
        }
    }
}