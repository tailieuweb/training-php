<?php
session_start();
include('functions.php');
if (isLoggedIn()) header('location: home.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<style>
		/* Hide page by default */
		html {
			display: none;
		}
	</style>
</head>

<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input autofocus required type="text" value="<?php if (isset($_COOKIE["user"])) {
																echo $_COOKIE["user"];
															} ?>" name="username" placeholder="Username or Email...">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input required type="password" value="<?php if (isset($_COOKIE["pass"])) {
														echo $_COOKIE["pass"];
													} ?>" name="password">
		</div>
		<div class="row align-items-center">
			<input type="checkbox" name="remember">Remember Me
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			<a href="forgot-password">Forgot password?</a>
		</p>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<script>
		if (self == top) {
			// Everything checks out, show the page.
			document.documentElement.style.display = 'block';
		} else {
			// Break out of the frame.
			top.location = self.location;
		}
	</script>
</body>


</html>