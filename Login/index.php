<?php 
session_start();

include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
$id =  $_SESSION['user']['id'];
$password;
if(isset($_POST['password_1']) && isset($_POST['password_2']))
{
$password_0  =  escape($_POST['password_0']);
$password_1  =  escape($_POST['password_1']);
$password_2  =  escape($_POST['password_2']);
if (empty($password_1)) { 
	array_push($errors, "Password is required"); 
}
if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
}
$password = md5($password_1);

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
	<link rel="stylesheet" type="text/css" href="public/css/styles.css">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="public/images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<?php echo $_SESSION['user']['fullname']; ?><br>
						<?php echo $_SESSION['user']['email']; ?><br>
						<a href="edit.php?edit=<?php echo $_SESSION['user']['id'] ?>">Edit Information</a><br>
						<a href="index.php?logout='1'" style="color: red;">Logout</a>
						<button class="btn btn-primary" id="new-pass">Đổi mật khẩu</button>
					</small>

				<?php endif ?>
			</div>
		</div>
		<form method="post" class="form-edit" style="display: none;" class="needs-validation" novalidate>
		
		<div class="input-	">
			<label>Password mới</label>
			<input type="password" name="password_1" id="password-1" required>
			<small class="invalid-feedback">Enter new password</small>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" id="password-2" required>
			<small class="invalid-feedback">Confirm password</small>
		</div>

		<div class="input-group">
			<button type="submit" class="btn btn-save" name="save_pass">Save</button>
			<button type="submit" class="btn btn-back" style="margin-left: 90px;">Back</button>
		</div>

	</form>
	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Thông tin nhóm A</h2>
				<ul>
				 <li>Nguyễn Đình Thi</li>
				 <li>Phan Thanh Nho</li>
				 <li>Trần Nguyễn Nguyên Kỳ</li>
				 <li>Phạm Hương Ni</li>
			 </ul>
				</div>
			</div>
		</div>
	</div>
	<script>
		const new_pass = document.querySelector('#new-pass');
		const form_edit = document.querySelector('.form-edit');
		const btn_back = document.querySelector('.btn-back');
		const password_1 = document.querySelector('#password-1');
		const password_2 = document.querySelector('#password-2');
		const btn_save = document.querySelector('.btn-save');
		const form = document.querySelector('form');

		new_pass.onclick = () => {
			form_edit.style.display = 'inline-block';
		}
		btn_back.onclick = () => {
			form_edit.style.display = 'none';
		}

		password_1.pattern = '[a-zA-Z0-9]{6,}';

		btn_save.onclick = () => {
			if (password_1.value != password_2.value) {
				return false;
			}
		}
		form.onsubmit = (e) => {


			if (form.checkValidity() === false) {
				e.preventDefault();
			}
			form.classList.add('was-validated');
		};
	</script>
</body>
</html>