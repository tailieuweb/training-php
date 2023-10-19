<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();
if (!empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    header('location: list_users.php?keyword=' . $_GET['keyword']);
}
$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $encrypted_id = $_GET['id']; // Lấy giá trị id đã được mã hóa từ URL và tự decode

   
    // Sử dụng khóa bí mật cùng với AES-ECB để giải mã ID
    $id = $userModel->giaiMaID($encrypted_id);
    $user = $userModel->findUserById($id); //Update existing user
}


if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        if ($userModel->updateUser($_POST)) {
            header('location: list_users.php');
        } else {
            echo "<script>alert('bản ghi đã cũ, hoặc dữ liệu không đúng vui lòng cập nhật bản ghi mới!')</script>";
        }
    } else {
        $userModel->insertUser($_POST);
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
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $encrypted_id ?>">
                <input type="hidden" name="lock_version" value="<?php echo $user[0]['lock_version'] ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
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