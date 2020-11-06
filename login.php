<?php 
session_start();

	include('functions.php'); 
	if(isLoggedIn() == true && isAdmin() == true) 
	{
		header("Location: home.php");
		header("!Location:index.php");

	}
	if(isLoggedIn() == true && isAdmin() == false)
	{
		header("Location: index.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet/less" type="text/css" href="public/css/style.less" />
    <script  type="text/javascript" src="public/js/less.min.js"></script>
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">

</head>

<body>
<div class="container">

<div class="header">
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">
	<div class="lg-np">
	<div class="container">

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
<div class="input-group">
	<button type="submit" class="btn login" name="login_btn">Login</button>
</div>
</div>
<p>
	Not yet a member? <a class="btn_register" href="register.php">Sign up</a>
</p>
	</div>
	</form>
</div>
</body>
</html>