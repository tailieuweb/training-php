<?php
session_start();
require_once("model/config.php");
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
        $fullname = $_POST["fullname"];
		$password = $_POST["password"];
		$md5Password = md5($password);
		$email = $_POST["email"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $md5Password == "" || $fullname == "" || $email == "") {
			echo '<script language="javascript">alert("Nhập đủ các trường để đăng kí!"); window.location="dangki.php";</script>';
		}else{
			// Kiểm tra username hoặc email có bị trùng hay không
				$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
				$result = mysqli_query($conn, $sql);

				// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
				if (mysqli_num_rows($result) > 0)
				{
				echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="dangki.php";</script>';
				// Dừng chương trình
				die ();
				}
				else {
				$sql = "INSERT INTO users (username,fullname, password, email) VALUES ('$username','$fullname','$md5Password','$email')";
				echo '<script language="javascript">alert("Đăng kí thành công!"); window.location="dangnhap.php";</script>';

				if (mysqli_query($conn, $sql)){
				echo "Tên đăng nhập: ".$_POST['username']."<br/>";
				echo "Họ và tên: ".$_POST['fullname']."<br/>";
				echo "Mật khẩu: " .$_POST['password']."<br/>";
				echo "Email đăng nhập: ".$_POST['email']."<br/>";
				}
				else {
				echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="dangki.php";</script>';
				}
			}	
		}
	}
?>
<html>

<head>
    <title>Login Smart Phone</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body bgcolor="#FFFFFF">
<style>
    .wrap-login100 {
        background-image: url('pictures/upload/ROGTHEME.jpg');
        background-size: contain;

    }
    </style>
    <div class="container-login100" style="background-image: url('pictures/upload/ROGTHEME.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form method="post" class="login100-form validate-form">
                <span class="login100-form-title p-b-37">
                    Sign Up
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
                    <input class="input100" type="text" id="username" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter fullname">
                    <input class="input100" type="text" id="fullname" name="fullname" placeholder="Fullname">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter email">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button name="btn_submit" class="login100-form-btn">
                        Sign Up
                    </button>
                </div>

                <div class="text-center p-t-57 p-b-20">
                    <span class="txt1">
                        Or login with
                    </span>
                </div>

                <div class="flex-c p-b-112">
                    <a href="#" class="login100-social-item">
                        <i class="fa fa-facebook-f"></i>
                    </a>

                    <a href="#" class="login100-social-item">
                        <img src="pictures/icons/icon-google.png" alt="GOOGLE">
                    </a>
                </div>

                <div class="text-center">
                    <a href="dangnhap.php" class="txt2 hov1">
                        Do you have an account ? Log in !
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>