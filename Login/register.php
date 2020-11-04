<?php 
session_start();

include('functions.php') 
?>

<html>
<head>
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="register.php" class="needs-validation" novalidate>
	<?php echo display_error(); ?>	
	<div class="input-group" style="display: inline;">
		<label>Username</label><br>
		<input type="text" id="username" name="username" value="<?php echo $username; ?>" required> <br>
		<small class="invalid-feedback">Không nhập ký tự đặc biệt</small>
    </div>
    <div class="input-group" style="display: inline;">
		<label>Full Name</label>
		<input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required> <br>
		<small class="invalid-feedback">Vui lòng nhập đầy đủ họ tên</small>
	</div>
	<div class="input-group" style="display: inline;">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>" required>
		<small class="invalid-feedback">Vui lòng không bỏ trống</small>
	</div>
	<div class="input-group" style="display: inline;">
		<label>Password</label>
		<input type="password" id="password-2" name="password_1" required>
		<small class="invalid-feedback">Vui lòng nhập password</small>
	</div>
	<div class="input-group" style="display: inline;">
		<label>Confirm password</label>
		<input type="password" id="password-2" name="password_2" required>
		<small class="invalid-feedback">Vui lòng nhập password</small>
	</div>
	<div class="input-group" >
		<button type="submit" class="btn" name="register_btn" id="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
<script>
		const password_1 = document.querySelector('#password-1');
		const password_2 = document.querySelector('#password-2');
		const register_btn = document.querySelector('#register_btn');
		const username = document.querySelector('#username');
		const fullname = document.querySelector('#fullname');
		const form = document.querySelector('form');
		username.pattern = '[a-zA-Z0-9]{3,}';
		fullname.pattern = '[a-zA-Z]{3,}(\\s[a-zA-Z]+)+';
	
		register_btn.onclick = () => {
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