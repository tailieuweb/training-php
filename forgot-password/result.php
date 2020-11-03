<?php
session_start();

if (!isset($_GET['code']) || empty($_GET['code'])) header('location: index.php');

if (isset($_SESSION['forgot_pass_Code'] ) && $_SESSION['forgot_pass_Code'] == $_GET['code']) {
    header('location:../change-password/index.php?code=' . $_SESSION['forgot_pass_Code']);
} else {
    $mess = "<strong>Oh No!</strong> Link xác nhận tài khoản để đổi mật khẩu của bạn không đúng. Vui lòng kiểm tra lại.";
}
?>

<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <!-- notification message -->
        <?php if (isset($mess)) : ?>
            <div class="error danger" style="text-align: center;">
                <h3>
                    <?php
                    echo $mess;
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>
</body>
</html>