<?php

require_once "./models/FactoryPattern.php";
require_once "./models/BankModel.php";

$factory = new FactoryPattern();
$userModel = $factory->make("user");
$userList = $userModel->read();

var_dump($userList[count($userList)  - 1]["id"]);