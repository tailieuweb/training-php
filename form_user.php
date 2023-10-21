<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$keyCode = "aomU87239dadasdasd";

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $newid = substr($id,23);
    $user = $userModel->findUserById($newid);//Update existing user
}
$_id = $id;

if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        $id = base64_decode($_GET['id']);
        $newid = substr($id,23);
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

    <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php if(!empty($newid)){echo $_GET['id'];}else{echo $id;}?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
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
    </div>
</body>
</html>