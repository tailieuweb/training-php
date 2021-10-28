<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Decode id param

    //Get first number
    $start = substr($id, 0, 5);

    //Get last number
    $end = substr($id, -5);

    //Replace first number with null
    $id = str_replace($start, "", $id);

    //Replace last number with null
    $id = str_replace($end, "", $id);
    $user = $userModel->findUserById($id); //Update existing user
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
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                User profile
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <span><?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?></span>
                </div>

                <!-- start -->
                <div class="form-group">
                    <label for="type">Type</label>
                    <span><?php if (!empty($user[0]['type'])) echo $user[0]['type'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <span><?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?></span>
                </div>
                <!-- end. -->

            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>

</html>