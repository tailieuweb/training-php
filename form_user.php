<?php
// Start the session
session_start();
// require_once 'models/UserModel.php';
require_once 'models/FactoryPattern.php';
require_once("models/UserModelDecorator.php");
// $userModel = new UserModel();
$factory = new FactoryPattern();
$bankModel = new UserModelDecorator($factory->make('bank'));
$userModel = new UserModelDecorator($factory->make('user'));
$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    // $user = $userModel->findUserById($_id);//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $userModel->updateData($_POST);
        // $bankModel->updateData($_POST);
    } else {
        $userModel->insertData($_POST);
        // $bankModel->insertData($_POST);
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
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="version" value="<?php if (!empty($user[0]['version'])) echo $user[0]['version'] ?>">
                        <label for="fullname">Full Name</label>
                        <input type="fullname" name="fullname" class="form-control" placeholder="Fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" name="type">
                        <option value="admin" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'admin') {
                                                        echo "selected";
                                                    }
                                                } ?>>Admin</option>
                        <option value="user" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'user') {
                                                        echo "selected";
                                                    }
                                                } ?>>User</option>
                        <option value="guest" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'guest') {
                                                        echo "selected";
                                                    }
                                                } ?>>Guest</option>
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