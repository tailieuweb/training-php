<?php 
session_start();

$user_id = intval($_GET['edit']);

if($_SESSION['user']['id'] != $user_id && $_SESSION['user']['user_type'] != 'admin'){
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
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="header">
        <h2>Edit User</h2>
    </div>
    </form>

    <form method="post" action="">
        <?php echo display_error(); ?>
        <div class="input-group">
            <label>id</label>
            <input type="text" name="id" value="<?php echo $data['id']; ?>" placeholder="<?php echo $data['id']; ?>">
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username1" value="<?php echo $data['username']; ?>" placeholder="<?php echo $data['username']; ?>">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="fullname1" value="<?php echo $data['fullname']; ?>" placeholder="<?php echo $data['fullname']; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email1" value="<?php echo $data['email']; ?>" placeholder="<?php echo $data['email']; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="save_btn">Save</button>
        </div>

    </form>
    <div class="back" style="text-align: center; padding-top: 10px;">
        <button type="button" class="btn btn-info" onClick="javascript:history.go(-2)">Back</button>
    </div>
</body>
</html>