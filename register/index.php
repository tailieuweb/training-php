<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<title>Official Signup Form Flat Responsive widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- fonts -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- /fonts -->
<!-- css -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<style>
.login:hover{
color:orange;
}
.login:visited{
color:yellowgreen;
}
</style>
<!-- /css -->
</head>
<body>
<!-- Form đăng ký -->
<h1 class="w3ls">Official Signup Form</h1>
<div class="content-w3ls">
	<div class="content-agile1">
		<h2 class="agileits1">Official</h2>
		<p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
	<div class="content-agile2" style="overflow:hidden">
		<form action="" method="post">
			<div class="form-control w3layouts"> 
				<input type="text" id="firstname" name="name" placeholder="Name" title="Please enter your First Name" required="">
			</div>
			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="password" placeholder="Password" id="password1" required="">
			</div>	
			<input type="submit" class="register" value="Register" name="register">
			<p style="color:white;text-align:center">You had a accout ?<br>
			Get Login Here<br>
			<a class="login"href="../Login/index.php">Login</a></p>
		</form>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<p class="copyright w3l">© 2017 Official Signup Form. All Rights Reserved | Design by Nhóm 11</a></p>
</body>
</html>
<!-- Đăng ký tài khoản -->
<?php 
 require '../admin/config.php';
 require '../admin/models/db.php';
 require '../admin/models/user.php';
if(isset($_POST['register'])){
	$user =new User;
	$username=$_POST['name'];
	$pass = $_POST['password'];
	$role=0;
	 if($user->register($username,$pass,$role)==false){
	 	echo "<script> alert('Tên tài khoản đã tồn tại!!')</script>";
	 }
	 else {
	 	echo "<script> alert('Đăng ký thành công!!');
	 	window.location.href='../Login/index.php'</script>";
	 }
}
?>