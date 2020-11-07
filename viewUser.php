<?php 
session_start();
// Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: viewUser.php");
//     EXIT;
// }

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

// if (isset($_GET['edit'])) {
//     if(isLoggedIn()){
//         $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
//         $results = mysqli_query($conn, $query);
        
//     }
// }
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/common.css">
</head>
<body>
<div class="header">
	<h2>User Detail</h2>
</div>
</form>

<form method="post" action="">
        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Username: &emsp; <?php echo $data['username']; ?></label>
            
        </div>

        <div class="input-group">
            <label>Full Name: &emsp; <?php echo $data['fullname']; ?></label>
            <!-- <input type="text" name="fullname1" value="<?php echo $data['fullname']; ?>" placeholder="<?php echo $data['fullname']; ?>"> -->
        </div>
        <div class="input-group">
            <label>Email: &emsp; <?php echo $data['email']; ?></label>
            <!-- <input type="email" name="email1" value="<?php echo $data['email']; ?>" placeholder="<?php echo $data['email']; ?>"> -->
        </div>

        <div class="input-group btnSubmit">
            <button type="button" class="btn" onClick="javascript:history.go(-1)">Back</button>
        </div>

    </form>
	


</body>
</html>