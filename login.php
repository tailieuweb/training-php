<?php 
session_start();
	include('functions.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/style_sass.css">
</head>
<body>
	<div class="top_body">

	
<div class="top_container">
	<div class="header">
		<h2>Login</h2>
	</div>
	<form class="form_login" method="post" action="login.php">

		<?php echo display_error(); ?>
			
			<input class="btn_login" id="input_user" type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username" placeholder="Nhập username...">
	
		
			
			<input class="btn_login" id="input_password" type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password" placeholder="Nhập password...">
		
			<button id="bnt_summit" class="btn_login" type="submit" class="btn" name="login_btn">Login</button>
		
		<div class="row align-items-center">
			<input type="checkbox" name="remember">Remember Me
		</div>
		
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</div>
</div>
</body>
</html>