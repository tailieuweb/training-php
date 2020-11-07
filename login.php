<?php 
session_start();
session_regenerate_id(true);
	include('functions.php') 
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="public/css/sass/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Login</title>

</head>
<body>
	<div class="header">
		<h2 class="content-header">Login</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="input-group">
						<label>Username
						
						<input placeholder="Nhập username"  type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username"></label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="input-group">
						<label>Password
						<input placeholder="Nhập password"  type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password">
						</label>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row align-items-center">
						<input type="checkbox" name="remember"class="checkbox-convert">Remember Me
					</div>
				</div>
				<div class="col-md-12">
					<div class="input-group">
						<button type="submit" class="btn" name="login_btn">Login</button>
					</div>
				</div>
				<div class="col-md-12">
					<div class="input-group">
						<p>Not yet a member? <a href="register.php">Sign up</a></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 left">
					<img src="index.jpg" alt="">
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript" src="./public/js/less.min.js"></script>
</body>
</html>