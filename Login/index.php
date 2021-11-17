<?php 
session_start();
require "../admin/config.php";
require "../admin/models/db.php";
require "../admin/models/user.php";
$user = new User;

?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Space Login Form</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- css files -->

<!-- Online-fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
<!-- //Online-fonts -->

</head>
<body 
style="background-color: #fff;">
	<!-- main -->
	<div class="main">
		<div class="main-w3l">
			<h1 class="logo-w3" style="font-weight: bold; font-size: 40px;margin: 4% 0;color: #c3187f;">Welcom!</h1>
			<div class="w3layouts-main">
				<!-- Form Login -->
				<h2><span style="color: #fff;">Login now</span></h2>
					<form action="" method="post">
						<input placeholder="Username" name="UserName" type="text" required="">
						<input placeholder="Password" name="Password" type="password" required="">
						<input type="submit" value="Get Started" name="login">
					</form>
					<p style:color="while">You don't have a account ?<br>
					Get an account here</p>
					<a href="../register/index.php">Register</a>
			</div>
			<!-- //main -->
			
			<!--footer-->
			<div class="footer-w3l">
				<p style="color:while">Design by Team G</a></p>
			</div>
			<!--//footer-->
		</div>
	</div>

</body>
</html>
<!-- Xu ly login user và admin -->
<?php
if (isset($_POST['login'])){
	$user_name = $_POST['UserName'];
	$user_password = $_POST['Password'];
	//kiem tra user
	if($user->login($user_name, $user_password)==1){
		$_SESSION['admin_name']=$user_name;
		echo "<script> alert('Xin chào $user_name');window.location.href='../admin/index.php'</script>";
	}
	//kiem tra admin
	else if($user->login($user_name, $user_password)==0){
		$_SESSION['customer_name']=$user_name;
		echo "<script> alert('Xin chào khách hàng $user_name');window.location.href='../index.php'</script>";
	}
	else{
		echo "<script> alert('Tài khoản không đúng !! Vui lòng thử lại');window.location.href='index.php'</script>";
	}
} 
?>
