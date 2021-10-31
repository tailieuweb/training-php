<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $user = $userModel->findUserById($id); //View user

    $_id = $_GET['id'];
    $user = $userModel->findUserById($_id); //Update existing user

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
    <?php include 'views/header.php' ?>
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
                    <label for="name">Fullname</label>
                    <input class="form-control" name="fullname" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="name">Type</label>
                    <select name="type">
                        <option value="">--Select Type--</option>
                        <option value="admin" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'admin') {
                                                        echo "selected";
                                                    }
                                                } ?>>admin</option>
                        <option value="user" <?php if (!empty($user[0]['type'])) {
                                                    if ($user[0]['type'] == 'user') {
                                                        echo "selected";
                                                    }
                                                } ?>>user</option>
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