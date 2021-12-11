<?php

require 'vendor/autoload.php';
// --------------Factory----------
require 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$HomeModel = $factory->make('home');
// --------------Factory----------

if (!empty($_POST['submit'])) {
    $insert = $HomeModel->getOtp($_POST);
    
    if ($insert[0]['otp'] == $_POST['otp']) {
        // var_dump($insert[0]['otp']);die();
        $updateOtp = $HomeModel->getOtpAsAction();
        header("location: login.php");
    } else {
        echo "<div class=\"alert alert-dark\" role=\"alert\">
                OTP error!</div>";
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
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="public/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="public/backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="public/backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
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
                            <form method="post">
                                <div class="form-group">
                                    <label>OTP</label>
                                    <input class="au-input au-input--full" type="text" name="otp" placeholder="OTP">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit" value="submit">Check</button>
                            </form>

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