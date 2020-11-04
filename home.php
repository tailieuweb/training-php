<?php
session_start();

include('functions.php');

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in by admin account";
	header('location: index.php');
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css">
</head>

<body>
	<div class="container">
		<div class="header">
			<h2>Admin - Home Page</h2>
		</div>
		<div class="content">
			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success">
					<h3>
						<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
			<?php if (isset($_SESSION['mess_version'])) : ?>
				<div class="error danger">
					<h3>
						<?php
						echo $_SESSION['mess_version'];
						unset($_SESSION['mess_version']);
						?>
					</h3>
				</div>
			<?php endif ?>
			<!-- logged in user information -->
			<div class="profile_info">
				<img src="public/images/admin_profile.png">

				<div>
					<?php if (isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['username']; ?></strong>
						<small>
							<i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
							<br>
							<?php echo $_SESSION['user']['fullname']; ?><br>
							<?php echo $_SESSION['user']['email']; ?><br>
							<a href="admin.php">Add User</a> &nbsp; <a href="list.php">List User</a> &nbsp; <a href="edit.php?edit=<?= getLink($_SESSION['user']['id']) ?>">Edit Information</a><br>
							<a href="home.php?logout='1'" style="color: red;">Logout</a>
						</small>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</body>

</html>