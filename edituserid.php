<?php 
session_start();

include('functions.php');

// if (isset($_GET['edit'])) {
//     if(isLoggedIn()){
//         $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
//         $results = mysqli_query($conn, $query);
        
//     }
// }



$id=$_GET['id'];
$query=mysqli_query($conn,"select * from `users` where id_encode='$id'");
$row=mysqli_fetch_assoc($query);
$results = [];


if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

if(isAdmin() == true && isloggedIn() == true)
{
?>

<html>
<head>
    <title>Edit Account</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet/less" type="text/css" href="public/css/style.less" />
    <script  type="text/javascript" src="public/js/less.min.js"></script>
</head>
<body>
<div class="header">
	<h2>Edit User</h2>
</div>
</form>

<form method="post" action="">
	<?php echo display_error(); ?>	
        <div class="input-group">
            <label>ID</label>
            <input type="text" value="<?php echo $row['id']; ?>" name="id1" readonly>
        </div>
        <div class="input-group">
            <label>Username</label>
            <input type="text" value="<?php echo $row['username']; ?>" name="username1">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" value="<?php echo $row['fullname']; ?>" name="fullname1">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" value="<?php echo $row['email']; ?>" name="email1">
        </div>
        <div class="input-group">
            <label>images</label>
            <input type="file"  name="image_profile1" class="form-control">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="saveuserid_btn">Save</button>
        </div>

<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-2)" />
</div>
	


</body>
</html>
<?php
}
?>