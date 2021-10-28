<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

<<<<<<< HEAD
if (!empty($_GET['id'])) { 
    
    $id = base64_decode($_GET['id']);
    $newid = substr($id,13);
    //var_dump($newid);
    $user = $userModel->findUserById($newid);//Update existing user
=======
if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id);//Update existing user
>>>>>>> 2-php-202109/2-groups/9-I/master-phpunit
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
    }
    header('location: list_users.php');
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

<<<<<<< HEAD
            <?php if ($user || empty(substr($id,13))) { ?>
=======
            <?php if ($user || !isset($_id)) { ?>
>>>>>>> 2-php-202109/2-groups/9-I/master-phpunit
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
<<<<<<< HEAD
                    <input type="hidden" name="id" value="<?php echo substr($id,13)?>">
=======
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
>>>>>>> 2-php-202109/2-groups/9-I/master-phpunit
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="name">Fullname</label>
                        <input class="form-control" name="fullname" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="type">    
                            <option value="">--Select Type--</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input class="form-control" name="fullname" placeholder="fullName" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" placeholder="email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Type</label>
                        <select name="type">    
                            <option value="">--Select Type--</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>