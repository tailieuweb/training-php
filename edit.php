<?php
session_start();

if (isset($_GET['edit'])) {
    $link_edit = $_GET['edit'];
    $encode_link = $_SESSION['links_edit'][$link_edit]; //lay gia tri value tu key là $link_edit
    $_SESSION['result_link'] = $link_edit;
} else header('location: home.php');

$user_id = intval($encode_link);


if ($_SESSION['user']['id'] != $user_id && $_SESSION['user']['user_type'] != 'admin') {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

include('functions.php');

$result = [];
$userName = "";
$fullName = "";
$userEmail = "";
if (isset($_GET['edit'])) {
    if (isLoggedIn()) {
        $query = "SELECT * FROM users WHERE id=" . $user_id;
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }
}

//đặt sesion cho đổi mật khẩu với ngườI dùng là user
$_SESSION['user_change'] = getLink($data['id']);
$_SESSION['user_change_id'][$_SESSION['user_change']] = $data['id'];

//đặt sesion cho đổi mật khẩu với ngườI dùng là admin
$_SESSION['admin_change'] = getLink($data['id']);
$_SESSION['admin_change_id'][$_SESSION['admin_change']] = $data['id'];

//đặt session kiểm tra version cho chức năng chỉnh sửa thông tin
$_SESSION['version_update'] = $data['version'];
?>

<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="header">
        <h2>Edit User</h2>
    </div>
    </form>

    <form method="post" action="update.php?update=<?= $link_edit ?>">
        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Username</label>
            <input required type="text" name="username1" value="<?php echo $data['username']; ?>" placeholder="Enter username">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input required type="text" name="fullname1" value="<?php echo $data['fullname']; ?>" placeholder="Enter fullname">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input required type="email" name="email1" value="<?php echo $data['email']; ?>" placeholder="<?php echo $data['email']; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="save_btn">Save</button>
        </div>
    </form>
    <div class="back" style="text-align: center; padding-top: 10px;">
        <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
        <?php if (isAdmin()) : ?>
            <a type="button" class="btn btn-info" href="change-password/admin-change.php?code=<?= $_SESSION['admin_change'] ?>">Change Password</a>
        <?php else : ?>
            <a type="button" class="btn btn-info" href="change-password/user-change.php?code=<?= $_SESSION['user_change'] ?>">Change Password</a>
        <?php endif; ?>
    </div>

</body>

</html>