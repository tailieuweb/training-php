<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) { 
    //Update SQL Injection - convert id -> int -> string
    $_id = isset($_GET['id'])?(string)(int)$_GET['id']:null;
    $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {
    //Use clean()(UserModel) clean all special chars (-@) 
    $_POST = UserModel::clean($_POST);
    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        $userModel->insertUser($_POST);
    }
    header('location: list_users.php');
}
//Print sql
//example keyword: fullname = "phuongnguyen','pn0921997@gmail.com','user');TRUNCATE demo;##"
$sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
    "'" . $_POST['name'] . "',
    '".md5($_POST['password'])."',
    '".$_POST['fullname']."',
    '".$_POST['email']."',
    '".$_POST['type']."')";
echo $sql;
?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
    <?php include 'views/header.php';?>
<body>
    <div class="container">

        <?php if ($user || !isset($_id)) { ?>
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>' required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" value='<?php if (!empty($user[0]['name'])) echo $user[0]['password'] ?>' required>
            </div>
            <div class="form-group mb-3">
                <label for="fullname">Fullname</label>
                <input class="form-control" name="fullname" placeholder="fullname"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?>' required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input name="email" class="form-control" placeholder="email"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?>'>
            </div>
            
            <div class="form-group mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" name="type">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <option value="guest">Guest</option>
                </select>
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