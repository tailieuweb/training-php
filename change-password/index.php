<?php
session_start();

include('../functions.php');

$id = 0;
if (!empty($_GET['code'])) {
    if (isset($_SESSION['forgot_pass_Code']) && $_SESSION['forgot_pass_Code'] == $_GET['code']) {
        $id = $_SESSION['forgot_pass_id'][$_GET['code']];
    }else header('location: ../index.php');
}else header('location: ../index.php');
$_SESSION['change_pass'] = getLink($id);
$_SESSION['id_change_pass'][$_SESSION['change_pass']] = $id;
?>
<?php

?>
<html>

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container">

        <div class="header">
            <h2>Change Password</h2>
        </div>
        <form action="request.php" method="post" style="text-align: center;">
            <input type="hidden" name="change" value="<?= $_SESSION['change_pass'] ?>">
            <div class="input-group">
                <label>Enter your password!</label><br>
                <input required type="password" name="newPassword" placeholder="Enter Password" autofocus />
            </div><br>
            <div class="input-group">
                <label>Please confirm your password!</label><br>
                <input required type="password" name="confirmNewPassword" placeholder="Enter Password Again" autofocus />
            </div>
            <br>
            <button type="submit" class="btn btn-info">Send Request</button>
            <br>
            <?php if (!isLoggedIn()) : ?>
                <hr><br>
                <div class="input-group">
                    <a class="btn link" href="../login.php">Bạn đã nhớ lại mật khẩu? Đến "Đăng nhập"!</a>
                </div>
                <br>
                <div class="input-group">
                    <a class="btn link" href="../register.php">Sign Up</a>
                </div>
            <?php endif; ?>
        </form>

    </div>
</body>

</html>