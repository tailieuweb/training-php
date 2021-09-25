<?php
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
        $user = $userModel->findUserById(base64_decode($_POST['id']));
        if (count($user) > 0) {
            // var_dump($user[0]['updated_at']);
            // var_dump($_GET['updated_at']);
            if ($user[0]['updated_at'] == $_GET['updated_at']) {
			/ 1-php-202109/2-groups/1-A/3-26-Liem
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



                <!-- Le Tuan Liem 25/09/2021 15:00 -->
                <!-- update form select type -->
              <div class="form-group">
              <label for="">Type</label>
                <select name="type" class="form-select" aria-label="Default select example">
                    <option>user</option>
                    <option>admin</option>
                 </select>
              </div>


                <!-- Le Tuan Liem 25/09/2021 15:00 -->
                <!-- update form select type -->
                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option>user</option>
                        <option>admin</option>
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