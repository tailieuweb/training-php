<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = isset($_GET['id']) ? base64_decode($_GET['id']) : null;

$allowToSee = false;

// find user
$user = $userModel->getUserByID($id);

// PREPARE DATA FOR CREATE VIEW TOKENS
$payload = new \stdClass();
$payload->name = empty($user) ? null : $user['name'];
$payload->email = empty($user) ? null : $user['email'];

$header = new \stdClass();
$header->alg = "HS256";
$header->typ = "JWT";

$signature = "secret key";

$token = hash_hmac("sha256", base64_encode(json_encode($payload)) . base64_encode(json_encode($header)), $signature);

if (!empty($_GET['id']) && ($_COOKIE['token'] == $token)) {
    $allowToSee = true;
} else {
    $_SESSION['message'] = 'Methods are not allowed!';
}

//REMOVE VIEW TOKENS
unset($token);

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
        <?php
        if ($allowToSee) { ?>
            <?php if ($user || empty($id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User profile
                </div>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <span><?php if (!empty($user['name'])) echo $user['name'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Fullname</label>
                        <span><?php if (!empty($user['fullname'])) echo $user['fullname'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Email</label>
                        <span><?php if (!empty($user['email'])) echo $user['email'] ?></span>
                    </div>

                    <!-- Nguyễn Phúc Linh: Thêm các field dữ liệu (full name, email, type) vào form - (25/09/2021) -->
                    <!-- start -->
                    <div class="form-group">
                        <label for="">Type</label>
                        <span><?php if (!empty($user['type'])) echo $user['type'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <span><?php if (!empty($user['password'])) echo $user['password'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Updated at</label>
                        <span><?php if (!empty($user['updated_at'])) echo $user['updated_at'] ?></span>
                    </div>
                    <!-- end. -->

                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
        <?php }
        } ?>
    </div>
</body>

</html>