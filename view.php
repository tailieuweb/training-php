<?php 
    $title = "Xem Chi Tiết User";
    require_once("./autoload.php");
    // Check Logout
    if (isset($_POST['user-logout'])) {
        unset($_SESSION['custom_id']);
        unset($_SESSION['user_type']);
        header("location: login.php");
    }   
    if (isset($_GET['view'])) {
        $custom_id = $_GET['view'];
        $userModel = new UserModel();
        $user = $userModel->getUserByCustomId($custom_id);
        if (count($user) == 0) {
            header("location: listUser.php");
        }
    }else{
        header("location: listUser.php");
    }

    // include header
    require_once("./header.php");
?>
<!-- Content -->
<link rel="stylesheet" href="./public/css/register.css">
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-md-12">
            <form method="POST" class=" rounded  shadow">
                <div class="title-login  text-center text-white pt-2 pb-2 rounded-top "><h1><?php echo $title ?></h1></div>
                
                <br>
                <div class="row">

                    <div class="col-md-9">
                        <div class="form-group pl-3 pr-3">
                            <label><b>Username</b></label>
                            <input type="text" disabled value="<?php echo $user['username'] ?>" class="">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Full Name</b></label>
                            <input disabled value="<?php echo $user['fullname'] ?>" type="text" required name="fullname" class="" placeholder="Nhập Fullname...">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>User Type</b></label>
                            <input type="text" disabled value="<?php echo $user['user_type'] ?>" class="">
                        </div>
                        <div class="form-group pl-3 pr-3">
                            <label><b>Email</b></label>
                            <input disabled value="<?php echo $user['email'] ?>" type="text" required name="email" class="" placeholder="Nhập Email...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group pl-3 pr-3">
                            <label><b>Hình Ảnh</b></label><br>
                            <img class="w-100" src="./public/images/<?php echo $user['image_profile'] ?>" alt="">
                        </div>
                    </div>
                        
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <input type="submit" name="user-logout" class="btn btn-danger mt-3" value="Logout Tài Khoản">
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