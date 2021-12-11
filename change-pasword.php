<?php
    session_start();
    require 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');
    $error = "";
    //$id = $_SESSION['lgUserID'];
    $row = $HomeModel->getUserById($_SESSION['lgUserID']);
    
    if(isset($_POST['submit']) == true) {
        $maukhaucu = $_POST['password'];
        $matkhaumoi = $_POST['newpassword'];
        $matkhaulai = $_POST['comrfimpassword'];
        
        $check = $HomeModel->checkOldPassword($row[0]['username'] , $maukhaucu);
        //print_r(count($check));
        if(count($check) == 0) { $error .= "Mật khẩu cũ sai!";}

        if(strlen($matkhaumoi) < 6) {$error .= "Mật khẩu quá ngắn!";}

        if($matkhaumoi != $matkhaulai) {$error .= "Sai mật khẩu mới";}

        if(empty($error)) {
            $HomeModel->changePassword($row[0]['username'] , $matkhaumoi);
            
            
            header("location:login.php");
            exit();
        }
       
    }
    
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Thay Đổi Mật Khẩu</title>

    <!-- Fontfaces CSS-->
    <link href="public/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="public/backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="public/backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="public/backend/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="public/backend/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">

                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="public/img/logo-2.png" alt="CoolAdmin">
                            </a>
                        </div>

                        <div class="login-form">
                            <p id="error" class="error"></p>
                            <form method="post">
                                <?php  if($error != "") { ?>
                                    <div class="alert alert-danger"><?= $error ?></div>
                                <?php } ?>
                                <!-- email -->
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input class="au-input au-input--full" type="text" name="username" value="<?= $_SESSION['lgUserName'] ?>" id="password"
                                        placeholder="Mật khẩu cũ" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu cũ</label>
                                    <input class="au-input au-input--full" type="password" name="password" value="<?php if(isset($maukhaucu)== true) echo $maukhaucu?>" id="password"
                                        placeholder="Mật khẩu cũ">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới</label>
                                    <input class="au-input au-input--full" type="password" name="newpassword"
                                        id="new_password" value="<?php if(isset($matkhaumoi)== true) echo $matkhaumoi?>" placeholder="Mật khẩu mới">
                                </div>
                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="comrfimpassword"
                                        id="comrfim_password" value="<?php if(isset($matkhaulai)== true) echo $matkhaulai?>" placeholder="Xác nhận mật khẩu">
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit"
                                    name="submit" value="submit">Lưu thay đổi</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="public/backend/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="public/backend/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="public/backend/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="public/backend/vendor/slick/slick.min.js">
    </script>
    <script src="public/backend/vendor/wow/wow.min.js"></script>
    <script src="public/backend/vendor/animsition/animsition.min.js"></script>
    <script src="public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="public/backend/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="public/backend/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="public/backend/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="public/backend/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="public/backend/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="public/backend/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="public/backend/js/main.js"></script>
    <script>
    function IsChangePass() {
        if (IsNull("password")) {
            $("error").innerHTML = "Vui lòng nhập mật khẩu cũ";
            return false;
        }
        if (IsNull("newpassword")) {
            $("error").innerHTML = "Vui lòng nhập mật khẩu mới";
            return false;
        }
        if (IsNull("comrfimpassword")) {
            $("error").innerHTML = "Vui lòng xác nhận mật khẩu";
            return false;
        }
        if ($("newpassword").value != $("comrfimpassword").value) {
            $("error").innerHTML = "Mật khẩu xác nhận không đúng";
            return false;
        }
        return true;
    }
    </script>
</body>

</html>
<!-- end document-->