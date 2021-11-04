<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Decode id param

    //Get first number
    $start = substr($id, 0, 5);

    //Get last number
    $end = substr($id, -5);

    //Replace first number with null
    $id = str_replace($start, "", $id);

    //Replace last number with null
    $id = str_replace($end, "", $id);
    $bankModel->deleteBalanceByUserId($id);
}
header('location: index.php');
