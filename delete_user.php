<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

<<<<<<< HEAD
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
=======
if (!empty(strip_tags($_GET['id']))) {
    $id = strip_tags($_GET['id']);
     $id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
	 $id = $_GET['id'];
    $handleFirst = substr($id,23);
     $idx = "";
    for ($i=0; $i <strlen($handleFirst)-9 ; $i++) { 
        $idx.=$handleFirst[$i];
    }    
>>>>>>> 1-php-202109/2-groups/2-B/master
    $userModel->deleteUserById($id);//Delete existing user
}
header('location: list_users.php');
?>