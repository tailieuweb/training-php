<?php
session_start();

include('functions.php');
//lấy giá trị id khi người dùng nhấn biểu tượng xem chi tiết từ file list. 
empty($_GET['user_id']) ? header('location: list.php') : $encode_user_id = $_SESSION['info_user_id'][$_GET['user_id']];

$user_id = intval($encode_user_id);

if (isset($_GET['user_id'])) {
    if (isLoggedIn()) {
        $query = "SELECT * FROM users WHERE id=" . $user_id;
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User Info</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <style>
        /* .header {
            background: #003366;
        }

        button[name=register_btn] {
            background: #003366;
        } */
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>USER INFO</h2>
        </div>
        <div class="content">

            <!-- logged in user information -->
            <div class="profile_info" style="font-size: 1.4em;">
                <img src="public/images/admin_profile.png">

                <div>
                    <strong><?php echo $data['username']; ?></strong>
                    <small>
                        <i style="color: #888;">(<?php echo ucfirst($data['user_type']); ?>)</i>
                        <br>
                        UserName: <?php echo $data['username']; ?><br>
                        FullName: <?php echo $data['fullname']; ?><br>
                        Email : <?php echo $data['email']; ?><br>
                    </small>
                </div>
            </div>

            <div class="back" style="text-align: center; padding-top: 10px;">
                <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
            </div>
        </div>
    </div>

</body>

</html>