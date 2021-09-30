<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById(base64_decode($id)); //Update existing user
}

if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        // Nếu thời gian cập nhật hiện tại của user trên db chưa thay đổi thì cho sửa:
        if (count($user) > 0) {
            if ($user[0]['updated_at'] == $_GET['updated_at']) {

                $userModel->updateUser($_POST);
                header('location: list_users.php');
            } else {
                echo '<h5>THÔNG TIN ĐÃ BỊ THAY ĐỔI TRƯỚC ĐÓ!
                <br>Bạn hãy quay lại trang "list_users.php" để xem cập nhật mới nhất!</h5>';
            }
        }
    } else {
        $userModel->insertUser($_POST);
        header('location: list_users.php');
    }
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
        <?php if ($user || isset($id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo base64_encode($id) ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                </div>
                <!-- Thêm form fullname và email -->
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input class="form-control" name="fullname" placeholder="Full Name" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <!-- Le Tuan Liem 25/09/2021 15:00 -->
                <!-- update form select type -->
                <div class="form-group">
                    <label for="">Type</label>
                    <select class="form-control" name="type" class="form-select" aria-label="Default select example">
                        <option>user</option>
                        <option>admin</option>
                        <option>guess</option>
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