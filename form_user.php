<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $user = $userModel->findUserById($id);//Update existing user
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
    <?php include 'views/header.php'?>
    <div class="container">

        <?php if ($user || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                    value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value='<?php if (!empty($user[0]['name'])) echo $user[0]['password'] ?>' required>
            </div>
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input name="fullname" class="form-control" placeholder="Fullname" value='<?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?>' required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" class="form-control" placeholder="Email" value='<?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?>' required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
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