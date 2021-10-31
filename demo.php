<?php

require_once './models/FactoryPattern.php';

$factory = new FactoryPattern();

$userModel = $factory->make("user");
$bankModel = $factory->make("bank");
$param = [];
var_dump($userModel->getUsers($param));
var_dump($bankModel->getAll());