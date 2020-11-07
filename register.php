<?php
session_start();

include('functions.php');
// // Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: register.php");
//     EXIT;
// }
?>

<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/register.css">
	<script type="text/javascript" src="public/js/jquery-3.4.1.min.js"></script>
</head>

<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post" action="register.php">
		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" id="user" required>
		</div>
		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="fullname" value="<?php echo $fullname; ?>" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" id="pass1" required>
		</div>
		<div id="pass-strength-result">Strength indicator</div>
		<p class="hint">
			Hint: The password should be at least seven characters long and not same username. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &).
		</p>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" id="pass2" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn" id="reg_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
<script type="text/javascript" src="public/js/authenticationPass.js"></script>

</html>