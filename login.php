<?php 
session_start();

	include('functions.php');
	//Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: login.php");
//     EXIT;
// } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password">
		</div>
		<div class="row align-items-center">
			<input type="checkbox" name="remember">Remember Me
		</div>
		<div class="input-group btnSubmit">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>