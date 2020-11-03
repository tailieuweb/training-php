<?php
session_start();

include('../functions.php');

!isLoggedIn() || !isAdmin() || empty($_GET['code']) ? header('location: index.php') : '';

$id = 0;
if (!empty($_GET['code'])) {
    if ($_SESSION['admin_change'] == $_GET['code']) {
        $id = $_SESSION['admin_change_id'][$_GET['code']];
    } else header('location: ../index.php');
} else header('location: ../index.php');
$_SESSION['change_pass_admin'] = getLink($id);
$_SESSION['id_change_pass_admin'][$_SESSION['change_pass_admin']] = $id;
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
        <form action="request-admin.php" method="post" style="text-align: center;">
            <input type="hidden" name="change" value="<?= $_SESSION['change_pass_admin'] ?>">
            <div class="input-group">
                <label>Enter your new password!</label><br>
                <input required type="password" name="newPassword" placeholder="Enter Password" autofocus />
            </div><br>
            <div class="input-group">
                <label>Please confirm your new password!</label><br>
                <input required type="password" name="confirmNewPassword" placeholder="Enter Password Again" autofocus />
            </div>
            <br>
            <button type="submit" class="btn btn-info">Send Request</button>
            <br>
        </form>

    </div>
</body>

</html>