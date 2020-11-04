<?php 
session_start();
	include('functions.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 flex bw al"><form method="post" action="login.php">
		<div class="header">
			<h2>Login</h2>
		</div>
		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password">
		</div>
		<div class="input-group">
			<input id="remember" type="checkbox" name="remember"><span for="remember">Remember Me</span>
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-block" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form></div>
		</div>
	</div>
	
</body>
</html>