<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';
    $userModel = new UserModel();
    $banModel = new BankModel();
class UserRepository1{

    public function createUser($user,$bank){
        $userModel->insertUser($user);
        
    }
}