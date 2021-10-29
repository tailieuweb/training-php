<?php
require_once './models/UserModel.php';
require_once './models/BankModel.php';
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');
$bankModel = $factory->make('bank');
$user = $userModel->findUserNew();
class RepsositoryPattern{
    public function createUser($input){       
        UserModel::insertUser($input);
        // $_input['cost'] = 500;        
        // $_input['id'] = $user['id'];
        // $bankModel->insertBank($_input);
    }
}