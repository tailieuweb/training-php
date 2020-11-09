<?php 
session_start();

// Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: admin.php");
//     EXIT;
// }

include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/common.css">
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
	<div class="header">
		<h2>Admin - Create User</h2>
	</div>
	
	<form method="post" action="admin.php" enctype="multipart/form-data">
        <!-- nếu có lỗi thì sẽ hiển thị lên -->
		<?php echo display_error(); ?>
		<!-- Chọn file để upload: -->

		<label>Chọn hình ảnh:</label> <br>
        <div id="imagePreview"></div>
		<input type="file" name="fileupload" id="fileupload" onchange="return fileValidation()">
        <br>
		<div class="input-group">
        <!-- Image preview -->
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">

			<label>Full Name</label>
			<input type="text" name="fullname" value="<?php echo $fullname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> Create User</button>
		</div>

		<p>
		<a href="home.php">HOME</a></p>
	</form>
<script src="public/js/checkTypefile.js"></script>
</body>
</html>