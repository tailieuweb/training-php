<?php
// Start the session
session_start();
require_once 'models/FactoryPattent.php';
require_once 'models/Repository.php';
// $factory = new FactoryPattent();
// $userModel = $factory->make('user');

$reponsitory = new Repository();



$user = NULL; //Add new user
$_id = NULL;
$id_end = NULL;
if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $id_start = substr($_id,3);
    $id_end=substr($id_start,0,-3);
    $user = $userModel->findUserById($id_end); //Update existing user
}
if (!empty($_POST['submit'])) {
    $version = $_POST['version'];
    var_dump($version);
    if (!empty($id_end)) {
        $a = $userModel->updateUser($_POST, $version);
        if ($a == false) {
            $a = "Updating Error! Pleade Try Again";
        } else {
            header('location: list_users.php');
        }
    } else {
        $isUserInsert = $userModel->insertUser($_POST);
        header('location: list_users.php');
    }
    // header('location: list_users.php');
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

        <?php if ($user || empty($id_end)) { ?>
            <div class="alert alert-warning" role="alert">
                User form

            </div>
            <?php if (isset($a)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $a; ?>
                </div>
            <?php } ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id_end ?>">
                <input type="hidden" name="version" value="<?php if (!empty($user[0]['version'])) echo md5($user[0]['version']."chuyen-de-web-1") ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="fullname">FullName</label>
                    <input type="text" name="fullname" class="form-control" placeholder="FullName" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type">
                        <option value="0" <?php if (isset($user[0]['type'])) {
                                                if ($user[0]['type'] == '0') {
                                                    echo "selected";
                <input class="form-control" name="name" placeholder="Name"
                    value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
            </div>
            <div class="form-group">
                <label for="full-name">Full name</label>
                <input class="form-control" name="full-name" placeholder="Full name"
                    value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"
                    value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="email"
                    value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
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