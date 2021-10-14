<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id_get = NULL;
$_id = NULL;
if (!empty($_GET['id'])) {
    $id_get = $_GET['id'];
    $id_manage = $userModel->substrID($id_get);
    $user = $userModel->findUserById($id_manage);
}
$msg = 'Your name or username is not allowed. Please enter again';
if (!empty($_POST['submit'])) {
    if (!empty($id_get)) {
        $isUserUpdate = $userModel->updateUser($_POST);
        if ($isUserUpdate == true) {
            header('location: list_users.php');
        } else {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    } else {
        $isUserInsert = $userModel->insertUser($_POST);
        if ($isUserInsert == true) {
            header('location: list_users.php');
        } else {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php if (!empty($user[0]['id'])) echo $user[0]['id'] ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="full-name">Full name</label>
                    <input class="form-control" name="full-name" placeholder="Full name" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type">
                        <option value="0" <?php if (!empty($user[0]['type']) == '0') {
                                                echo "selected";
                                            } ?>>---</option>
                        <option value="admin" <?php if (!empty($user[0]['type']) == 'admin') {
                                                    echo "selected";
                                                } ?>>Admin</option>
                        <option value="user" <?php if (!empty($user[0]['type']) == 'user') {
                                                    echo "selected";
                                                } ?>>User</option>
                        <option value="guest" <?php if (!empty($user[0]['type']) == 'guest') {
                                                    echo "selected";
                                                } ?>>Guest
                        <option>
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