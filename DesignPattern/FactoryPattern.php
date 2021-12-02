<?php
require_once './models/UserModel.php';
<<<<<<< HEAD
require_once './models/BankModel.php';
=======
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-GetBank
class FactoryPattern {
    public function make($model){
        if($model === 'user'){
            return new UserModel();
        }
<<<<<<< HEAD
        else if($model === 'bank'){
            return new BankModel();    
=======
        else{
            return new BankModel();
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-GetBank
        }
    }
}