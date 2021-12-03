<?php

require_once "./models/FactoryPattern.php";

$factory = new FactoryPattern();

$userModel = $factory->make("user");
$userModel->startTransaction();

$input = [];
$input["name"] = "test3";
$input["fullname"] = "test2";
$input["email"] = "test2@gmail.com";
$input["type"] = "user";
$input["password"] = "password";

$userModel->insert($input);
$userModel->rollback();


$bankModel = $factory->make("bank");
$bankModel->startTransaction();

$input = [];
$input["user_id"] = 10;
$input["cost"] = 10;

$bankModel->insert($input);
$bankModel->rollback();