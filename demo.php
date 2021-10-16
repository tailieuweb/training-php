<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bank = $factory::create('bank')->getAll();
$user = $factory::create('user')->getAll();
echo "Bank: ";
var_dump($bank);
echo "User: ";
var_dump($user);


