<?php
session_start();

include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

$user = get_a_record('users', $_SESSION['user']['id']);
if ($user['status'] == 0) {
	$mess = "You must active your account!! Please check your mail! OR <a href='confirm-user/resend.php'>Resend Request</a>";
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
	<div class="header">
		<h2>Home Page</h2>
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
		<?php if (isset($_SESSION['mess_entities'])) : ?>
			<div class="error danger">
				<h3>
					<?php
					echo $_SESSION['mess_entities'];
					unset($_SESSION['mess_entities']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<?php if (isset($mess)) : ?>
			<div class="error danger">
				<h3>
					<?php
					echo $mess;
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="public/images/user_profile.png">

			<div>
				<?php if (isset($_SESSION['user'])) { ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br>
						<?php echo $_SESSION['user']['fullname']; ?><br>
						<?php echo $_SESSION['user']['email']; ?><br>
						<a href="edit.php?edit=<?= getLink($_SESSION['user']['id']) ?>">Edit Information</a>
						<?php if (isAdmin()) { ?>
							<a href="home.php">Home</a>
						<?php } ?>
						<br>
						<a href="index.php?logout=<?= $_SESSION['user']['id'] ?>" style="color: red;">Logout</a>
					</small>

				<?php } else header('location: login.php'); ?>
			</div>
		</div>
	</div>
</body>

</html>