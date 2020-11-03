<?php
session_start();

include('functions.php')
?>

<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post">
		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Username</label>
			<input required type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input required type="text" name="fullname" value="<?php echo $fullname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input required type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input required type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input required type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>

</html>