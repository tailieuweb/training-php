<?php
// require_once 'models/UserModel.php';
require_once 'models/FactoryPattern.php';
require_once 'models/UsageModelDecorator.php';
// $bankModel = new BankModel();
$factory = new FactoryPattern();
$userModel = new UsageModelDecorator($factory->make('user'));
// $userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $userModel->deleteData($id);//Delete existing user
}
header('location: list_users.php');
?>