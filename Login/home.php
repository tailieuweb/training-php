<?php
session_start();

include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
$password;

$id =  $_SESSION['user']['id'];

if(isset($_POST['password_1']) && isset($_POST['password_2']))
	{
			$password_1  =  $_POST['password_1'];
			$password_2  =  $_POST['password_2'];
			if (empty($password_1)) { 
				array_push($errors, "Password is required"); 
			}
			if ($password_1 != $password_2) {
				array_push($errors, "The two passwords do not match");
			}
			$password = md5($password_1);
			// $password = $password_1;
			mysqli_query($conn, "UPDATE `users` SET `password` = '$password ' WHERE `id` = '$id'");

			$_SESSION['success']  = "Change successfully";
// // header("Refresh:2; url=page2.php");
			if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
				setcookie("user", '', time() - 3600);
				setcookie("pass", '', time() - 3600);
			}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="public/css/style_sass.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
<div class="top_modal" id="top_modal">
		
	<div class="div_form">
			<form method="post" class="form-edit_pass" class="needs-validation" novalidate>
						<div class="item_edit">
							<h2> ĐỔI MẬT KHẨU</h2>
							<h1 onclick="modal_close()">X</h1>
						</div>
						<div class="input-group">
							<label>Password mới</label>
							<input class="input_edit" type="password" placeholder="Nhập password mới..." name="password_1" id="password-1"  required>
							<small class="invalid-feedback">Enter new password</small>
						</div>
						<div class="input-group">
							<label>Confirm password</label>
							<input class="input_edit" type="password" placeholder="Nhập lại password..." name="password_2" id="password-2" required>
							<small class="invalid-feedback">Confirm password</small>
						</div>

						<div class="input-group">
							<button type="submit" class="btn btn-save" name="save_pass">Save</button>
						
						</div>

					</form>
	</div>
				
		</div>
<?php include "./haeder.php" ?>
<div class="body_home">
		<div class="top-container">

	
		<div class="header">
			<h2>Admin - Home Page</h2>
		
		</div>
		<div class="container">
			<div class="row">
				<?php  if (isset($_SESSION['user'])) : ?>
				<div class="col-md-6">
					<img src="./public/images/<?php echo $_SESSION['user']['images'];?>" alt="">
				</div>
				<div class="col-md-6">
					<h6 class="name">Tên Tài Khoản:	<?php echo $_SESSION['user']['username']; ?></h6>
					<p>Họ Và Tên Người Dùng:	<?php echo $_SESSION['user']['fullname']; ?></p>
					<p>Email:	<?php echo $_SESSION['user']['email']; ?></p>
					<p>id:<?php echo $_SESSION['user']['id'];?></p>
				</div>
				
				<?php endif ?>
			</div>
			<div id="chuc_nang">
					<a id="add_user"  class="click_chucnang" href="admin.php">Add User</a>
					 
					 <a class="click_chucnang" id="list_user" href="list.php?list='1'">List User</a>
					  
				
					 <a class="click_chucnang" onclick="mo_edit()" id="edit" href="#">Edit password</a>
					 <a class="click_chucnang" id="edit" href="edit.php?edit='1">Edit Information</a><br>
				</div>
		</div>
		</div>
	</div>
		
</div>

	<?php include "foooter.php" ?>
	<script src="./public/js/modal_edit.js"></script>

	<script>
		
	</script>
</body>
</html>