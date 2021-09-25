<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = base64_decode($_GET['id']); // <!-- Nguyễn Phúc Linh: Decrypt id để truy vấn - (25/09/2021) -->
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
<?php include 'views/header.php'?>
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
            <div class="form-group">
                <label for="password">Fullname</label>
                <span><?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Email</label>
                <span><?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?></span>
            </div>

            <!-- Nguyễn Phúc Linh: Thêm các field dữ liệu (full name, email, type) vào form - (25/09/2021) -->
            <!-- start -->
            <div class="form-group">
                <label for="">Type</label>
                <span><?php if (!empty($user[0]['type'])) echo $user[0]['type'] ?></span>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <span><?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?></span>
            </div>
            <div class="form-group">
                <label for="">Updated at</label>
                <span><?php if (!empty($user[0]['updated_at'])) echo $user[0]['updated_at'] ?></span>
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