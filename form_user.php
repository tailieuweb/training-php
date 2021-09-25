<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$data = $_GET['id'];
$id = base64_decode($data);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    //Lấy chuỗi nối đầu
    $start = substr($id, 0, 5);
    //Lấy chuỗi nối cuối
    $end = substr($id, -5);
    //Replace chuỗi đầu
    $id = str_replace($start, "", $id);
    //Replace chuỗi cuối
    $id = str_replace($end, "", $id);
    $user = $userModel->findUserById($id); //Update existing user
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