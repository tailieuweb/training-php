<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    //Update SQL Injection - convert id -> int -> string
    $id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $factory->getType('bank')->deleteBalanceById($id);//Delete existing user
}
header('location: list_users.php');
?>