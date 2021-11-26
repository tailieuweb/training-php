<?php

require_once './models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make("user");
$bankModel = $factory->make("bank");
var_dump($bankModel->read());
