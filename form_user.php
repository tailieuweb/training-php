<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$name = NULL;

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $user = $userModel->findUserByName($name); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($name)) {
        $oldName = $name;
        $userModel->updateUser($_POST, $oldName);
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

        <?php if ($user || empty($name)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="name" value="<?php echo $name ?>">
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
</body>

</html>