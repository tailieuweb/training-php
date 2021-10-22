<?php
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');

$user = NULL; //Add new user
$_id = NULL;
$params = [];

if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    
}

$users = $userModel->getUsers($params);
if (!empty($_GET['id'])) {
    foreach ($users as $user1) {
        if($_GET['id'] == md5($user1['id'])){                      
            $_id = $user1['id'];    
        }
    }  
    $user = $userModel->findUserById($_id);//Update existing user
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($user || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
        <div class="form-group">
                <label for="name">ID: </label>
                <span><?php if (!empty($user[0]['id'])) echo $user[0]['id'] ?></span>
            </div>            
            <div class="form-group">
                <label for="name">Name: </label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Fullname: </label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Email: </label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>
</html>