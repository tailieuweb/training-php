<?php

session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id);//Update existing user
}

//Kiem tra nếu token bằng nhau thì thực hiện submit form theo yêu cầu:
if (!empty($_POST['submit'])&& $_SESSION['token']===$_POST['token']) {

    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else if($_POST['name']&& $_POST['fullname']&&$_POST['password']&&$_POST['type']) {
        $userModel->insertUser($_POST);

    }
    header('location: list_users.php');

}
//Tao token va ma hoa token:
$tokenvalue = md5(uniqid());
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

<!--                   Ẩn token-->
                    <input type="hidden" name="token" value="<?php echo $tokenvalue ?>">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
<!--                    add fullnname-->
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                    </div>
<!--                    add email-->
                    <div class="form-group">
                        <label for="email">Email</label>

                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
                    </div>
<!--                    select type-->
                    <select class="form-control" name="type">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                        <option value="Guest">Guest</option>
                    </select>


                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
<!--                    Lưu sesiontoken từ biến token dã được tạo vào sesíon-->
               <?php $_SESSION['token']=$tokenvalue;
               ?>
                </form>

            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>