<?php 
    $title = "Sửa User";
    require_once("./autoload.php");
    // Check Logout
    if (isset($_POST['user-logout'])) {
        unset($_SESSION['custom_id']);
        unset($_SESSION['user_type']);
        header("location: login.php");
    }
    if(isset($_SESSION['user_type'])){
        if ($_SESSION['user_type'] != "admin") {
            header("location: index.php");
        }
    }else{
        header("location: index.php");
    }

    if (isset($_GET['edit'])) {
        $custom_id = $_GET['edit'];
        $userModel = new UserModel();
        $user = $userModel->getUserByCustomId($custom_id);
        if (count($user) == 0) {
            header("location: listUser.php");
        }
    }else{
        header("location: listUser.php");
    }

    if (isset($_GET['success'])) {
        if ($_GET['success'] == "success") {
            array_push($success, "Sửa Thành Công!!!");
        }else{
            array_push($errors, "Du lieu khong hop le!!!");
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
                        $custom_id = $user['custom_id'];
                        $user = $userModel->setUser($custom_id,$fullname,$email,$img_user);
                        header("location: edit.php?edit=".$custom_id."&success=success");
                    }else{
                        header("location: edit.php?edit=".$custom_id."&success=false_success");
                        
                    }
                break;
            
            default:
                header("location: edit.php?edit=".$custom_id."&success=false_success");
                break;
        }

        }else{
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $id_user = $user['custom_id'];
            $user = $userModel->setUser($custom_id,$fullname,$email);
            header("location: edit.php?edit=".$custom_id."&success=success");
        }
        
    }
    // include header
    require_once("./header.php");
?>
<!-- Content -->
<link rel="stylesheet" href="./public/css/register.css">
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-md-12">
            <form method="POST" class=" rounded  shadow" enctype="multipart/form-data">
                <div class="title-login text-center text-white pt-2 pb-2 rounded-top "><h1><?php echo $title ?></h1></div>
                <?php 
                //hiển thị lỗi và thành công
                get_eroors($errors); get_success($success);
                ?>
                <div class="row main">

                    <div class="col-md-9">
                        <div class="form-group pl-3 pr-3">
                            <label><b>Username</b></label>
                            <input type="text" disabled value="<?php echo $user['username'] ?>" class="form-control bg-dark">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Full Name</b></label>
                            <input  value="<?php echo $user['fullname'] ?>" type="text" required name="fullname" class="" placeholder="Nhập Fullname...">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>User Type</b></label>
                            <input type="text" disabled value="<?php echo $user['user_type'] ?>" class="form-control bg-dark">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Email</b></label>
                            <input  value="<?php echo $user['email'] ?>" type="text" required name="email" class="" placeholder="Nhập Email...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group pl-3 pr-3">
                            <label><b>Hình Ảnh</b></label><br>
                            <img class="w-100" src="./public/images/<?php echo $user['image_profile'] ?>">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Chọn Ảnh Khác</b></label>
                            <input type="file" name="img_user" class="form-control">
                        </div>
                    </div>
                        
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <input type="submit" name="user-logout" class="btn btn-danger mt-3" value="Logout Tài Khoản">
                        <input type="submit" name="edit_user" class="btn btn-success mt-3" value="Cập Nhật Tài Khoản">
                        <a href="index.php" class="btn btn-warning mt-3">Trang Chủ</a>
                        <a href="listUser.php" class="btn btn-info mt-3">Back</a>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Content -->

<!-- include footer -->
<?php require_once("./footer.php"); ?>