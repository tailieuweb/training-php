<?php 
    $title = "Register";
    require_once("./autoload.php");

    // Check isLogin
    if(isset($_SESSION['user_type'])){
        $title_heading = "Add User";
        if($_SESSION['user_type'] == "user"){
            header("location: index.php");
        }
    }else{
        $title_heading = "Register";
    }

    // chức năng add user
    if (isset($_POST['register'])) {
        $username = strip_tags($_POST['username']);
        $fullname = strip_tags($_POST['fullname']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $re_password = strip_tags($_POST['re_password']);
        if (isset($_POST['user_type'])) {
            $user_type = strip_tags($_POST['user_type']);
        }else{
            $user_type = "user";
        }
        
        $name_img_user = $_FILES['img_user']['name'];
        $path_img = "./public/images/";
        $name_img_user = str_shuffle("zxcvbnmasdfghjk789").random_int(0,999999999).$name_img_user;
        $tmp_name_img = $_FILES['img_user']['tmp_name'];
        $size_img = $_FILES['img_user']['size'];
        $type_img = $_FILES['img_user']['type'];
        global $size_img,$type_img;
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
                    $userModel = new UserModel();
                    $userLogin = $userModel->getUserByUsername($username);
                    if (count($userLogin) == 0) {
                        $user = $userModel->addUser($username,$fullname,$email,$password,$user_type,$name_img_user);
                        $id_user = $user[0]['id'];
                        $userModel->update($id_user);
                        if ($user == true) 
                        {
                            if ($_SESSION['user_type'] == "admin") {
                                array_push($success, "Tạo Thành Công!!!");
                            }else{
                                header('location: login.php?register_user='.$username.'&register_pass='.$password);
                            }
                        }
                    }else{
                        array_push($errors, "Username Đã tồn tại!!!");
                    }
                }else{
                    array_push($errors, "Kich Thuoc Anh qua Lon!!!");
                }
                break;   
            default:
            break;
        }
    }  // include header
    require_once("./header.php");
?>
   
<!-- Content -->
<link rel="stylesheet" href="./public/css/register.css">
<div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="" method="post" class=" rounded  shadow"  enctype="multipart/form-data">
                    <div class="title-login  text-center text-white pt-2 pb-2 rounded-top "><h1><?php echo $title_heading ?></h1></div>
                    <br>
                    <?php get_eroors($errors);get_success($success); ?>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Chọn Ảnh Khác</b></label>
                        <input type="file" name="img_user" class="form-control"required>
                    </div>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Username</b></label>
                        <input pattern="[a-zA-Z0-9]{6,}" value="<?php if (isset($_POST["username"])){echo $_POST["username"];}?>" type="text" required name="username" class="" placeholder="Nhập Username...">
                    </div>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Full Name</b></label>
                        <input value="<?php if (isset($_POST["fullname"])){echo $_POST["fullname"];}?>" type="text" required name="fullname" class="" placeholder="Nhập FullName...">
                    </div>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Email</b></label>
                        <input value="<?php if (isset($_POST["email"])){echo $_POST["email"];}?>" type="email" required name="email" class="" placeholder="Nhập Email...">
                    </div>
                    <?php 
                    if ($title_heading != "Register") {
                    ?>
                    <div class="form-group pl-3 pr-3">
                        <label><b>User Type</b></label>
                        <select class="form-control" id="cars" name="user_type">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Password</b></label>
                        <input type="password" required name="password" class="" placeholder="Nhập Password...">
                    </div>
                    <div class="form-group pl-3 pr-3">
                        <label><b>Confirm Password</b></label>
                        <input type="password" required name="re_password" class="" placeholder="Nhập Lại Password...">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-block" name="register" value="<?php echo $title_heading ?>">
                        <?php 
                        if ($title_heading == "Register") {
                        ?>
                        <div class="pl-3 pr-3 mb-3 mt-3">
                            Have a account?<a href="login.php"> Sign In Now!</a>
                        </div>
                        <?php 
                        }else{
                        ?>
                        <a href="index.php" class="btn btn-danger ">Back</a>
                        <?php
                        }
                        ?>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
<!-- Content -->

<!-- include footer -->
<?php require_once("./footer.php"); ?>


</body>
</html>
   