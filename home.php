<?php
include('init.php');
session_regenerate_id(true);

include('functions.php');

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
	<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet/less" type="text/css" href="public/css/style.less" />
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <script  type="text/javascript" src="public/js/less.min.js"></script>

</head>
<body>

	<div class="container">
	<div class="header">
		<h2>Admin - Trang chủ</h2>
	</div>
		<div class="content">
			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success" >
					<h3>
						<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>

			<!-- logged in user information -->
			<div class="profile_info">
				<img src="public/images/admin_profile.png"  >

				<div>
					<?php  if (isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['username']; ?></strong>
						<small>
							<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
							<br>
							<?php echo $_SESSION['user']['fullname']; ?><br>
							<?php echo $_SESSION['user']['email']; ?><br>
							<a class="btn" href="admin.php">Add User</a> &nbsp; <a  class="btn" href="list.php">List User</a> &nbsp; <a  class="btn" href="edit.php?edit=<?= $_SESSION['user']['id'] ?>">Edit Information</a><br>
							<a class="btn login" href="home.php?logout='1'" style=" margin-top: 12px;">Logout</a>
						</small>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
}
?>
