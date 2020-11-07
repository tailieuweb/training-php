<?php
session_start();

include('functions.php');

// Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: register.php");
//     EXIT;
// }

if (!isAdmin()) {	
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/common.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
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
                        <a href="admin.php">Add User</a> &nbsp; <a href="list.php?page=<?php echo $_SESSION['user']['id'];?>">List User</a> &nbsp; <a href="edit.php?edit=<?php echo $_SESSION['user']['id'];?>">Edit Information</a><br>
                        <a href="home.php?logout=<?php echo $_SESSION['user']['id'];?>" style="color: red;">Logout</a>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>