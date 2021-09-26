<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL;
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <?php 
        if(isset($_GET['id'])){
            $id  = $_GET['id'];
            $user = $userModel->getUserID($id);    
    ?>
    <div class="container">
    <div class="alert alert-warning" role="alert">
                View of user!
            </div>
        Name : <?=$user['name']?>
        <br>
        Fullname: <?=$user['fullname']?>
        <br>
        Email: <?=$user['email']?>
        <br>
        Type: <?=$user['type']?>
    </div>
    <?php }?>
</body>
</html>