<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$uid = NULL;

if (!empty($_GET['uid'])) {
    $uid = $_GET['uid'];
    $user = $userModel->findUserById($uid);//Update existing user
    if (count($user) === 0) {
        // Nếu uid không đúng thì sẽ bị lỗi.
    }
}

if (!empty($_POST['submit'])) {

    if (!empty($uid)) {
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

            <?php if ($user || empty($uid)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $uid ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input class="form-control" name="fullname" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" name="email" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type">
                            <?php foreach (["admin" => "Admin", "user" => "User", "guest" => "Guest"] as $key => $value): ?>
                            <?php 
                            if ($key === $user[0]['type']) { 
                                echo "<option selected value='$key'>$value</option>";
                            } else { 
                                echo "<option value='$key'>$value</option>";
                            }
                            ?>
                            <?php endforeach; ?>
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