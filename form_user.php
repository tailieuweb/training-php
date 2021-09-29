<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();


$user = NULL; //Add new user
$id = NULL;
$Name_store = "";
$password_store = "";


if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById($id);//Update existing user
}

if (!empty($_POST['submit'])) {

    if (!empty($id)) {
       if(CheckuserdataBeforeUpdate($userModel,$id,$Name_store,$_POST['old_password'])){
           $userModel->updateUser($_POST);
       }
    } else {
        $userModel->insertUser($_POST);
    }
    header('location: list_users.php');
}

function CheckuserdataBeforeUpdate($userModel,$id,$Name_store,$old_password){
   $data_check = $userModel->findUserById($id);
   $check = true;
    if ($Name_store != $data_check[0]['name']){
    $check = false;
    }
    if($password_store == $old_password ){
        $check = false;
    }
    return $check;


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
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
                     <?php if(!empty($_GET['id'])){?> 
            <div class="form-group">
                <label for="password">Old Password</label>
                <input type="password" name="old_password" class="form-control" placeholder="Password">
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="fullname" name="fullname" class="form-control" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                    </div>

                    <div class="form-group">
                        Type:
                        <br>
                        <label for="admin">Admin</label>
                        <input type="radio" id="admin" name="t1" value="admin" checked="t1" >
                        <label for="user">User</label>
                         <input type="radio" id="user" name="t1" value="user" > 
                         <label for="guest">Guest</label>
                         <input type="radio" id="guest" name="t1" value="guest">

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