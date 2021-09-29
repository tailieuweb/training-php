<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    //Decode id param

    //Get first number
    $start = substr($_id, 0, 5);

    //Get last number
    $end = substr($_id, -5);

    //Replace first number with null
    $_id = str_replace($start, "", $_id);

    //Replace last number with null
    $_id = str_replace($end, "", $_id);
    $user = $userModel->findUserById($_id); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        //Check multiple users edit a text at the same time
        if ($user[0]['updated_at'] == $_GET['updated_at']) {
            $userModel->updateUser($_POST);
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Refresh page and try later!
          </div>';
        }
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

        <?php if ($user || empty($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                </div>
                <!-- Add fullname and email fields -->
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input class="form-control" name="fullname" placeholder="Full Name" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>
                <!-- Add type option field -->
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" aria-label="Default select example" name="type">
                        <option value="admin" selected>ADMIN</option>
                        <option value="user">USER</option>
                        <option value="guess">GUESS</option>
                    </select>
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