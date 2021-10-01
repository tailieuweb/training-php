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

        <?php if ($user || !isset($_id)) { ?>
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>' required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password" value='<?php if (!empty($user[0]['name'])) echo $user[0]['password'] ?>' required>
            </div>
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input class="form-control" name="fullname" placeholder="fullname"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?>' required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" class="form-control" placeholder="email"
                    value='<?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?>'>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="p-2">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                    <option value="guest" selected>guest</option>
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