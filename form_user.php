<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById(base64_decode($id));//Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        // Nếu thời gian cập nhật hiện tại của user trên db chưa thay đổi thì cho sửa:
        $user = $userModel->findUserById(base64_decode($_POST['id']));
        if (count($user) > 0) {
            // var_dump($user[0]['updated_at']);
            // var_dump($_GET['updated_at']);
            if ($user[0]['updated_at'] == $_GET['updated_at']) {
                $userModel->updateUser($_POST);
                header('location: list_users.php');
            }
            else {
                echo '<h5>THÔNG TIN ĐÃ BỊ THAY ĐỔI TRƯỚC ĐÓ!
                <br>Bạn hãy quay lại trang "list_users.php" để xem cập nhật mới nhất!</h5>';
            }
        }        
    } else {
        $userModel->insertUser($_POST);
        header('location: list_users.php');
    }
    // header('location: list_users.php');
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
                        <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <!-- Nguyễn Phúc Linh: Thêm các field dữ liệu (full name, email, type) vào form - (25/09/2021) -->
                    <!-- start -->
                    <div class="form-group">
                        <label for="full-name">Full name</label>
                        <input type="text" name="full-name" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="guest">Guest</option>
                        </select>
                    </div>
                    <!-- end. -->

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