<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();


//23-4

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
<<<<<<< HEAD
    $newid = substr($id,23);
=======
    $newid = substr($id,3,-2);
>>>>>>> 1-php-202109/2-groups/4-D/master
    $userModel->deleteUserById($newid);//Delete existing user
}
header('location: list_users.php');
?>