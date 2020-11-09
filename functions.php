<?php
// Require https
$conn = mysqli_connect('localhost', 'root', '', 'php_training');

$username = "";
$fullname = "";
$email    = "";
$errors   = array(); 


if (isset($_POST['register_btn'])) {
	register();
}

function register(){

	global $conn, $errors, $username,$fullname, $email, $image;

    $username    =  escape($_POST['username']);
    $fullname    =  escape($_POST['fullname']);
	$email       =  escape($_POST['email']);
	$password_1  =  escape($_POST['password_1']);
	$password_2  =  escape($_POST['password_2']);
	$image = $_FILES['fileupload']['name'];

	if (empty($username)) { 
		array_push($errors, "Username is required"); 
    }
    if (empty($fullname)) { 
		array_push($errors, "Fullname is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	//khai báo sql
	$query = "SELECT * FROM users Where `email` = '$email'";
	$results = mysqli_query($conn, $query);
	//kiểm tra nếu có email rồi thì báo lỗi
	if($results->num_rows > 0){
		array_push($errors, "Email đã có người sử dụng!!");
	}


	if (count($errors) == 0) {
		$password = md5($password_1);
		if (isset($_POST['user_type'])) {
			$user_type = escape($_POST['user_type']);
			//Chặn tấn công từ uploadfile
			//Kiểm tra người dùng có upload file lên không
			if(empty($_FILES["fileupload"]['name'])){
				if($user_type == 'admin'){
					$query = "INSERT INTO users (username,fullname, email, user_type, password, image) 
					VALUES('$username', '$fullname', '$email', '$user_type', '$password','admin_profile.png')";
					  mysqli_query($conn, $query);
				}else{
					$query = "INSERT INTO users (username,fullname, email, user_type, password, image) 
					VALUES('$username', '$fullname', '$email', '$user_type', '$password','user_profile.png')";
					  mysqli_query($conn, $query);
				}
			}
			else{
				// Đã có dữ liệu upload, thực hiện xử lý file upload
				//Thư mục bạn sẽ lưu file upload
				$target_dir    = "public/images/";
				//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
				$target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
				$allowUpload   = true;
				//Lấy phần mở rộng của file (jpg, png, ...)
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				//check bằng hàm getimagesize
				if(isset($_POST["submit"])) {
					//Kiểm tra xem có phải là ảnh bằng hàm getimagesize
					$check = getimagesize($_FILES["fileupload"]["tmp_name"]);
					if($check !== false)
					{
						echo "Đây là file ảnh - " . $check["mime"] . ".";
						$allowUpload = true;
					}
					else
					{
						echo "Không phải file ảnh.";
						$allowUpload = false;
					}
				}
				// Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
				// Bạn có thể phát triển code để lưu thành một tên file khác
				if (file_exists($target_file))
				{
					echo "Tên file đã tồn tại trên server, không được ghi đè";
					$allowUpload = false;
				}
				// Cỡ lớn nhất được upload (bytes)
				//Giới hạn 10 MB để upload ảnh
				$maxfilesize   = 5485760;

				// Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
				if ($_FILES["fileupload"]["size"] > $maxfilesize)
				{
					array_push($errors, "Không được upload ảnh lớn hơn $maxfilesize (bytes)");
					$allowUpload = false;
				}
				//Những loại file được phép upload
				$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
				// Kiểm tra kiểu file
				if (!in_array($imageFileType,$allowtypes ))
				{
					array_push($errors, "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF");
					$allowUpload = false;
				}
				//Kiểm tra xem allowUpload là true/false
				if ($allowUpload)
				{
					// Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
					if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
					{
						echo "File ". basename( $_FILES["fileupload"]["name"]).
						" Đã upload thành công.";
						if($user_type == 'admin'){
							$query = "INSERT INTO users (username,fullname, email, user_type, password, image) 
							VALUES('$username', '$fullname', '$email', '$user_type', '$password','$image')";
							  mysqli_query($conn, $query);
							  $_SESSION['success']  = "New user successfully created!!";
						}else{
							// echo "image: ".$image;
							$query = "INSERT INTO users (username,fullname, email, user_type, password, image) 
							VALUES('$username', '$fullname', '$email', '$user_type', '$password','$image')";
							  mysqli_query($conn, $query);
							//   echo "add user";
							$_SESSION['success']  = "New user successfully created!!";
						}
					}
					else
					{
						array_push($errors, "Có lỗi xảy ra khi upload file.");
					}
				}
				else
				{
					array_push($errors, "Không upload được file, có thể do file lớn, kiểu file không đúng ...");
				}

			}
				$_SESSION['success']  = "New user successfully created!!";
				header('location: home.php');
			// }
		}else{
			$query = "INSERT INTO users (username, fullname, email, user_type, password,image) 
					  VALUES('$username', '$fullname', '$email', 'user', '$password','user_profile.png')";
			mysqli_query($conn, $query);

			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');
		}
	}
}
	// $image = $_FILES['fileupload']['name'];

	// if(empty($_FILES['fileupload']['name'])){
	// 	echo $image;
	// 	echo 'hinh cu';
	// 	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email' WHERE `username` = '$username'");
	// }
	// else{
	// 	echo 'oke chưa';
	// 	$target_dir ='public/images/';
	// 	$target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
	// 	mysqli_query($conn, "UPDATE `users` SET `username` = '$username',`image` = '$image', `fullname` = '$fullname', `email`='$email' WHERE `username` = '$username'");
	// 	echo $image;
	// }

function edit() {
	global $conn, $errors, $username,$fullname, $email;
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);
	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email' 
	WHERE `username` = '$username'");
	$_SESSION['success']  = "Change successfully";
	// // header("Refresh:2; url=page2.php");
	if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
	header('location: home.php');
	
}

if (isset($_POST['save_btn'])) {
	edit();
}

function getUserById($id){
	global $conn;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function escape($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
    unset($_SESSION['user']);

    if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
    }
    
	header("location: login.php");
}
if (isset($_POST['login_btn'])) {
	login();
}


// LOGIN USER
function login(){
	global $conn, $username, $errors;

	// grap form values
	$username = escape($_POST['username']);
	$password = escape($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $query2 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        $results2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_array($results2);
		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                
                if (isset($_POST['remember'])){
                    //thiết lập cookie username và password
                    setcookie("user", $row['username'], time() + (86400 * 30)); 
                    setcookie("pass", $row['password'], time() + (86400 * 30)); 
                }


				header('location: home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                
                if (isset($_POST['remember'])){
                    //thiết lập cookie username và password
                    setcookie("user", $row['username'], time() + (86400 * 30)); 
                    setcookie("pass", $row['password'], time() + (86400 * 30)); 
                }

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
    }
}

function pagination(){
	// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
global $conn, $errors, $username,$fullname, $email;
	$username    =  escape($_POST['username1']);
    $fullname    =  escape($_POST['fullname1']);
	$email       =  escape($_POST['email1']);

 
// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$result = mysqli_query($conn, 'select count(id) as total from user');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
 
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
 
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
 
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}
 
// Tìm Start
$start = ($current_page - 1) * $limit;
 
// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$result = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit");
}
