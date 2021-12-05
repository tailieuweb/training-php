<?php

require_once "./models/FactoryPattern.php";
require_once "./models/BankModel.php";

$factory = new FactoryPattern();
$userModel = $factory->make("user");
$userList = $userModel->auth("test2", "123");

var_dump($userList);