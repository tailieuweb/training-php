<?php
require_once './models/FactoryPattern.php';
require_once './tests/resource-test/User.php';
$factory = new FactoryPattern();
$userModel = $factory->make("user");
$bankModel = $factory->make("bank");
var_dump($userModel->auth(new User("test2", "123"), "123"));

