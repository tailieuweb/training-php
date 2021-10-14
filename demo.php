<?php

require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bank = $factory->getType('bank')->getAll();
$user = $factory->getType('user')->getAll();
var_dump($bank);
var_dump($user);


