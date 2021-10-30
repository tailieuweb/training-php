<?php
require_once './models/UserModel.php';
require_once './models/BankModel.php';
require_once './models/FactoryPattern.php';
$factory = new FactoryPattern();
$usermodel = $factory->make('user');
$param = [];
var_dump($usermodel->getUsers($param));
$bankmodel = $factory->make('banks');
var_dump($bankmodel->getAll());
?>