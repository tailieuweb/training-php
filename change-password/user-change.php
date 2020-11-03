<?php
session_start();

include('../functions.php');

!isLoggedIn() || isAdmin() || empty($_GET['code']) ? header('location: index.php') : '';

$id = 0;
if (!empty($_GET['code'])) {
    if ($_SESSION['user_change'] == $_GET['code']) {
        $id = $_SESSION['user_change_id'][$_GET['code']];
    } else header('location: ../index.php');
} else header('location: ../index.php');
$_SESSION['change_pass_user'] = getLink($id);
$_SESSION['id_change_pass_user'][$_SESSION['change_pass_user']] = $id;
?>
<?php

?>
<html>

<head>
    <title>Change Your Password</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container">

        <div class="header">
            <h2>Change Password</h2>
        </div>
        <form action="request-user.php" method="post" style="text-align: center;">
            <input type="hidden" name="change" value="<?= $_SESSION['change_pass_user'] ?>">
            <div class="input-group">
                <label>Enter your current password!</label><br>
                <input required type="password" name="currentPassword" placeholder="Enter Password" autofocus />
            </div><br>
            <div class="input-group">
                <label>Enter your new password!</label><br>
                <input required type="password" name="newPassword" placeholder="Enter Password" autofocus />
            </div><br>
            <div class="input-group">
                <label>Please confirm your new password!</label><br>
                <input required type="password" name="confirmNewPassword" placeholder="Enter Password Again" autofocus />
            </div>
            <br>
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
            <button type="submit" class="btn btn-info">Send Request</button>
            <br>
        </form>

    </div>
</body>

</html>