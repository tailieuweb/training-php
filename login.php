<?php

session_start();
require 'models/FactoryPattent.php';
$factory = new FactoryPattent();
// --------------Factory----------

$HomeModel = $factory->make('home');
// --------------Factory----------
$error = "";
if (!empty($_POST['submit'])) {
    $userName = trim($_POST["username"]);
    $passWord = trim($_POST["password"]);
    if ($userName != "" && $passWord != "") {
        $rows = $HomeModel->login($userName, $passWord);

        //print_r($rows[0]['permission']);die();
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $_SESSION["lgUserName"] = $userName;
                $_SESSION["role"] = $row['permission'];
                $_SESSION["lgUserID"] = $row['id'];
               
            }
            if(isset($rows[0]['action'])) {
                if($rows[0]['action'] == 1){
                    header("location:index.php");
                }
                else{
                    
                    $error .= "Tài khoản chưa được xác thực";
                }
            }
          
        } else {
            $error .= "Tên đăng nhập hoặc mật khẩu không đúng";
        }
        // Phân quyền admin:
        if(!empty($_SESSION['role'])) {
            if($_SESSION['role'] == "Admin") {
                header("location: admin/admin.php");
            } elseif($_SESSION['role'] == "User") {
                header("location: index.php");
            }
        }
      
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

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
                            <?php 
                                if($error != "") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                            <?php } ?>
                            <form method="post">
                                <div class="form-group">
                                    <label>Enter Name</label>
                                    <input class="au-input au-input--full" type="text" name="username"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="forgot-password.php">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit"
                                    value="submit">sign in</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register.php">Sign Up Here</a>
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

</body>

</html>
<!-- end document-->