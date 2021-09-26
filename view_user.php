<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById($id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
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

            <?php if ($user || empty($id)) { ?>
                <div class="alert alert-warning" role="alert">
                    View User
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                  
                        <tr>
                            <!-- <th scope="row"><?php if (!empty($user[0]['id'])) echo $user[0]['id'] ?></th> -->
                            <td>
                            <?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>
                            </td>
                            <td>
                            <?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>
                            </td>
                            <td>
                            <?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>
                            </td>
                            <td>
                            <?php if (!empty($user[0]['type'])) echo $user[0]['type'] ?>
                            </td>
                            <td>
                            <?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>
                             </td>
                        </tr>
                
                </tbody>
            </table>
               
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>