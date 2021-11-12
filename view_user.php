<?php
<<<<<<< HEAD
require_once 'models/UserModel.php';
require_once 'models/FactoryPattent.php';
$factory = new FactoryPattent();
=======
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
>>>>>>> 2-php-202109/2-groups/5-E/3-27-Tien
$userModel = $factory->make('user');

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
<<<<<<< HEAD
    //Xử lý chuỗi đầu
    $string_first = substr($id, 0, 10);
    //Xử lý chuỗi sau
    $string_last = substr($id, -5);
    //Thay thể chuỗi đầu = null
    $id = str_replace($string_first, "", $id);
    //Thay thế chuỗi sau = null
    $id = str_replace($string_last, "", $id);
    $user = $userModel->findUserById($id);//Update existing user
=======
    $id_start = substr($id,3);
    $id_end=substr($id_start,0,-3);
    $user = $userModel->findUserById($id_end);//Update existing user
>>>>>>> 2-php-202109/2-groups/5-E/3-27-Tien
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
                <label for="fullname">Fullname</label>
                <span><?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <span><?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?></span>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <span><?php if (!empty($user[0]['type'])) echo $user[0]['type'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <span><?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?></span>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>

</html>