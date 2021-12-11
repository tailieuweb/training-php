<?php
session_start();
require_once '../models/UserModel.php';
// $userModel = new UserModel();

// --------------Factory----------
require '../models/FactoryPattentAdmin.php';
$factory = new FactoryPattentAdmin();
$userModel = $factory->make('user');
// --------------Factory----------

$id = NULL;

// if (!empty($_GET['id'])) {
//     $id = $_GET['id'];

//     $userModel->deleteUserById($id);//Delete existing user
  
// }
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!empty($_GET['token'])) {
        if (hash_equals($_SESSION['token'], $_GET['token'])) {
            $userModel->deleteUserById($id);
        }
    }
}
header('location: admin.php');
?>
