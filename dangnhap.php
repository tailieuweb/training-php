<?php
session_start();

require_once 'Controller/FactoryPattern.php';
$factory = new FactoryPattern();
$Auth = $factory->make('auth');

$error = " ";
if (!empty($_POST['submit'])) {
    $username = $_POST["username"];
     //Sử dùng htmlentities để chuyển đổi tất cả các ký tự áp dụng thành các thực thể HTML trước khi login
    $users = [
        'username' => htmlentities($_POST['username']),
        'password' => htmlentities($_POST['password'])
    ];
    $user = NULL;
    if ($user = $Auth->auth($users['username'], $users['password'])) {
        //Login successful
        $_SESSION['id'] = $user[0]['UserID'];
        $_SESSION['username'] =$username;
        $_SESSION['groupID'] = $user[0]['GroupID'];
        $_SESSION['message'] = 'Login successful';
        header('location: index.php');
        
    }else {
        //Login failed
        echo '<script language="javascript">alert("Sai tên đăng nhập hoặc mật khẩu!"); window.location="dangnhap.php";</script>';
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Smart Phone</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <style>
    .wrap-login100 {
        background-image: url('pictures/upload/ROGTHEME.jpg');
        background-size:contain;
        
    }
    </style>


    <div class="container-login100" style="background-image: url('pictures/upload/ROGTHEME.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form method="POST" class="login100-form validate-form">
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                    <input class="input100" type="text" name="username" placeholder="Username or email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" name="submit" value="submit"
                        class="login100-form-btn">
                        Sign In
                    </button>
                </div>
                                
                <div class="text-center p-t-57 p-b-20">
                    <span class="txt1">
                        Or login with
                    </span>
                </div>

                <div class="flex-c p-b-112">
                    <a href="#" class="login100-social-item">
                        <i class="fa fa-facebook-f"></i>
                    </a>

                    <a href="#" class="login100-social-item">
                        <img src="pictures/icons/icon-google.png" alt="GOOGLE">
                    </a>
                </div>

                <div class="text-center">
                    <a href="dangki.php" class="txt2 hov1">
                        Sign Up !
                    </a>
                </div>
            </form>


        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>