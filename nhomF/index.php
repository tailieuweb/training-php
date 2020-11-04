<?php
    if(isset($_POST['change-pass'])){
        $title = "Đổi Mật Khẩu";
    }else{
        $title = "Home";
    }
    
    require_once("./autoload.php");
    // Check isLogin
    if(!isset($_SESSION['custom_id'])){
        header("location: login.php");
    }

    // echo $_SESSION['custom_id'];

    // Check Logout
    if (isset($_POST['user-logout'])) {
        unset($_SESSION['custom_id']);
        unset($_SESSION['user_type']);
        header("location: login.php");
    }
    
    
    // include header
    require_once("./header.php");
    $userModel = new UserModel();
    $user = $userModel->getUserByCustomId($_SESSION['custom_id']);
    $user_type = $_SESSION['user_type'];

    //Kiểm tra xem sửa thành công hay không
    if (isset($_GET['edit'])) {
        if ($_GET['edit'] == "success") {
            array_push($success, "Sửa Thành Công!!!");
        }else{
            array_push($errors, "Sua Khong Thanh Cong");
        }
    }
    // Check edit user
    if (isset($_POST['edit_user'])) {
        if ($_FILES['img_user']['name']) {
            $name_img_user = $_FILES['img_user']['name'];
            $path_img = "./public/images/";
            $name_img_user = str_shuffle("zxcvbnmasdfghjk789").random_int(0,999999999).$name_img_user;
            $tmp_name_img = $_FILES['img_user']['tmp_name'];
            $size_img = $_FILES['img_user']['size'];
            $type_img = $_FILES['img_user']['type'];
            switch ($type_img) {
                case 'image/jpg':
                case 'image/png':
                case 'image/gif':
                case 'image/jpeg':
                case 'text/plain': //file .txt
                case 'application/pdf': //file pdf
                case 'application/vnd.openxmlformats-officedocument.presentationml.presentation': //file excel
                case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': //file word
                    if($size_img < 2000000){
                        move_uploaded_file($tmp_name_img,$path_img.$name_img_user);
                        $img_user = $name_img_user;
                        $fullname = $_POST['fullname'];
                        $email = $_POST['email'];
                        $user = $userModel->setUser($user['custom_id'],$fullname,$email,$img_user);
                        header("location: index.php?edit=success");
                    }else{
                        header("location: index.php?edit=false_success");
                        
                    }
                break;
            
            default:
                break;
        }

        }else{
            $fullname = strip_tags($_POST['fullname']);
            $email = strip_tags($_POST['email']);
            $user = $userModel->setUser($user['custom_id'],$fullname,$email);
            header("location: index.php?edit=success");
        }
        
    }
    //sửa mật khẩu  
    if(isset($_POST['change-pass'])){
        $errors = [];
        $success = [];
        if (isset($_POST['password']) && isset($_POST['re_password'])) {
            $pass = $_POST['password'];
            $re_pass = $_POST['re_password'];
            if ($pass == $re_pass) {
                $result = $userModel->changPass($pass,$_SESSION['custom_id']);
                if ($result == true) {
                    array_push($success, "Sửa Thành Công!!!");
                    
                }
            }else{
                array_push($errors, "Mật khẩu không trùng nhau!!!");
            }
        }
    }
    
?>

<!-- Content -->
<link rel="stylesheet" href="./public/css/index.css">
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-md-12">
            <form method="POST" class=" rounded  shadow" enctype="multipart/form-data">
                <div class="title-login text-center text-white pt-2 pb-2 rounded-top "><h1>Xin Chào <?php echo strip_tags($user_type)." - ".strip_tags($user['fullname']) ?></h1></div>
                <?php 
                //hiển thị lỗi và thành công
                get_eroors($errors); get_success($success);
                //kiểm tra xem người dùng có chọn đổi pass hay không
                if (isset($_POST['change-pass'])) {
                ?>
                <br>
                    <div class="row main">
                        <div class="col-md-6">
                            <div class="form-group pl-3 pr-3">
                                <label><b>Mật Khẩu Mới</b></label>
                                <input name="password" type="text" required class="form-control" placeholder="Nhập Mật Khẩu Mới...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pl-3 pr-3">
                                <label><b>Nhập Lại Mật Khẩu Mới</b></label>
                                <input name="re_password" type="text" required name="fullname" class="form-control" placeholder="Nhập Lại Mật Khẩu Mới...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <input type="submit" name="change-pass" class="btn btn-warning  mt-3" value="Cập Nhật Mật Khẩu">
                            <a type="button" class="btn btn-info mt-3" href="index.php">Trở Về</a>
                        </div>
                    </div>
                <?php
                }
                else{
                ?>
                <br>
                <div class="row main">
                    <div class="col-md-9">
                        <div class="form-group pl-3 pr-3">
                            <label><b>Username</b></label>
                            <input disabled value="<?php echo strip_tags($user['username']) ?>" class="form-control">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Full Name</b></label>
                            <input  value="<?php echo strip_tags($user['fullname']) ?>" type="text" required name="fullname" class="form-control" placeholder="Nhập Fullname...">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>User Type</b></label>
                            <input disabled value="<?php echo strip_tags($user['user_type']) ?>" class="form-control">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Email</b></label>
                            <input  value="<?php echo strip_tags($user['email']) ?>" type="text" required name="email" class="form-control" placeholder="Nhập Email...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group pl-3 pr-3">
                            <label><b>Avatar</b></label><br>
                            <img class="w-100" src="./public/images/<?php echo strip_tags($user['image_profile']) ?>" alt="">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Chọn Ảnh Khác</b></label>
                            <input type="file" name="img_user" class="form-control">
                        </div>
                    </div>
                       
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <input type="submit" class="btn  mt-3" name="edit_user" value="Cập Nhật Thông Tin">
                        <input type="submit" name="user-logout" class="btn  mt-3" value="Logout Tài Khoản">
                        <input type="submit" name="change-pass" class="btn  mt-3" value="Đổi mật khẩu">
                        <?php 
                        if($user_type == "admin"){
                        ?>
                        <a href="register.php" class="btn  mt-3">Thêm User</a>
                        <a href="listUser.php" class="btn  mt-3">Danh Sách User</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content -->

<!-- include footer --> 

<?php } require_once("./footer.php"); ?>

