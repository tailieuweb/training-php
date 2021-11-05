<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
<<<<<<< HEAD
$userModel = $factory->make('user');
$banksModel = $factory->make('user');
=======
$repository = $factory->make('Repository');
>>>>>>> 2-php-202109/2-groups/4-D/master

$user = NULL; //Add new user
$_id = NULL;
$users = $userModel->getUsers();
$bank = NULL; //Add new user

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
<<<<<<< HEAD
    $user = $userModel->findUserById($_id); //Update existing user
    $bank = $banksModel->findBankById($_id);
=======
    $user = $repository->getUserID($_id); //Update existing user
>>>>>>> 2-php-202109/2-groups/4-D/master
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
<<<<<<< HEAD
        $userModel->updateUser($_POST);
        $banksModel->updateBank($_POST);
    } else {
        $userModel->insertUser($_POST);
        $banksModel->insertBank($_POST);
=======
        $repository->update_User($_POST);
    } else {
        $repository->create_User($_POST);
>>>>>>> 2-php-202109/2-groups/4-D/master
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
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="User_id">User id</label>
                    <select name="user_id" value="<?php if (!empty($user[0]['user_id'])) echo $user[0]['user_id'] ?>">
                        <option value="">-</option>
                        <?php foreach ($users as $user) { ?>
                            <option <?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] == $user['id'] ? 'selected' : '' ?> value="<?php echo $user['id'] ?>"><?php echo $user['id'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Cost">Cost</label>
                    <input type="number" name="cost" class="form-control" placeholder="Cost" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
                </div>
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" value="<?php if (!empty($user[0]['type'])) echo $user[0]['type'] ?>">
                        <option value="">-</option>
                        <option <?php if (!empty($user[0]['type']))  echo $user[0]['type'] == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
                        <option <?php if (!empty($user[0]['type']))  echo $user[0]['type'] == 'user' ? 'selected' : '' ?> value="user">User</option>
                        <option <?php if (!empty($user[0]['type']))  echo $user[0]['type'] == 'guest' ? 'selected' : '' ?> value="guest">Guest</option>
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