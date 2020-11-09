<?php
$conn = mysqli_connect('localhost', 'root', '', 'userlogin');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$username = "";
$fullname = "";
$email    = "";
$errors   = array();

// validate input value & regular expression for password
if (isset($_POST['register_btn'])) {
	global $conn, $errors, $username, $fullname, $email;
	$username    =  escape($_POST['username']);
	$email       =  escape($_POST['email']);
	$password_1  =  escape($_POST['password_1']);
	//kiểm tra trùng username
	if (mysqli_num_rows(mysqli_query($conn, "SELECT username FROM users WHERE username='$username'")) != 0) {
		array_push($errors, "Username đã tồn tại. Vui lòng nhập Username khác");
	}
	//kiem tra trùng email 
	elseif (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"))) {
		array_push($errors, "Email đã tồn tại. Vui lòng nhập Email khác");
	}
	//kiểm tra định dạng chuổi password 

	//(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}
	elseif (!preg_match("/(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}/", $password_1)) {

		array_push($errors, "Pass phải từ 8 ký tự trở lên và phải có chứ số, chữ in hoa, chữ thường và có ký tự đặc biệt!!");
	} else register();
}

//register user & validate input value
function register()
{
	global $conn, $errors, $username, $fullname, $email;
	$username    =  escape($_POST['username']);
	$fullname    =  escape($_POST['fullname']);
	$email       =  escape($_POST['email']);
	$password_1  =  escape($_POST['password_1']);
	$password_2  =  escape($_POST['password_2']);

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

	if (count($errors) == 0) {
		$user_add = array(
			'id' => 0,
			'username' => escape($_POST['username']),
			'fullname' => escape($_POST['fullname']),
			'password' => md5($_POST['password_1']),
			'email' => escape($_POST['email']),
		);

		if (isset($_POST['user_type'])) {
			$user_add1 = array(
				'id' => 0,
				'username' => escape($_POST['username']),
				'fullname' => escape($_POST['fullname']),
				'user_type' => escape($_POST['user_type']),
				'password' => md5($_POST['password_1']),
				'email' => escape($_POST['email']),
			);
			$user_id = save('users', $user_add1);
			// $user_type = escape($_POST['user_type']);
			// $query = "INSERT INTO users (username,fullname, email, user_type, password) 
			// 		  VALUES('$username', '$fullname', '$email', '$user_type', '$password')";
			// mysqli_query($conn, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: index.php');
		} else {
			// $query = "INSERT INTO users (username, fullname, email, user_type, password) 
			// 		  VALUES('$username', '$fullname', '$email', 'user', '$password')";
			// mysqli_query($conn, $query);
			$user_id = save('users', $user_add);
			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');
		}
	}
	//send mail& config
	include 'lib/config.php';
	require 'vendor/autoload.php';
	include 'lib/setting.php';
	$mail = new PHPMailer(true);
	try {
		$verificationCode_iduser = md5(uniqid("Email của bạn chưa active. Nhấn vào đây để active nhé!", true));
		$verificationCode = PATH_URL . "confirm-user/active.php?code=" . $verificationCode_iduser;
		//lưu chuỗi mã hóa kiểm tra active vào session
		$_SESSION['activeCode'] = $verificationCode_iduser;

		// lưu liên kết active vào session tránh tình trạng liên kết active tồn tại vĩnh viễn
		$_SESSION['verificationLink'] = $verificationCode;
		$htmlStr = "";
		$htmlStr .= "Xin chào " . $username . ' (' . $email . "),<br /><br />";
		$htmlStr .= "Vui lòng nhấp vào nút bên dưới để xác minh đăng ký của bạn và có quyền truy cập vào trang người dùng cá nhân của PHP Training.<br /><br /><br />";
		$htmlStr .= "<a href='{$_SESSION['verificationLink']}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY ACCOUNT</a><br /><br /><br />";
		$htmlStr .= "Cảm ơn bạn đã tham gia thành một thành viên mới trong website<br><br>";
		$htmlStr .= "Trân trọng.<br />";
		//Server settings
		$mail->CharSet = "UTF-8";
		$mail->SMTPDebug = 0; // Enable verbose debug output (0 : ko hiện debug, 1 hiện)
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = SMTP_UNAME; // SMTP username
		$mail->Password = SMTP_PWORD; // SMTP password
		$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
		$mail->Port = SMTP_PORT; // TCP port to connect to
		//Recipients
		$mail->setFrom(SMTP_UNAME, "PHP Training");
		$mail->addAddress($_POST['email'], $email); // Add a recipient | name is option tên người nhận
		$mail->addReplyTo(SMTP_UNAME, 'PHP TRAINING');
		$mail->isHTML(true); // Set email format to HTML
		$mail->Subject = 'Verification Users | PHP Training';
		$mail->Body = $htmlStr;
		$mail->AltBody = $htmlStr; //None HTML
		$result = $mail->send();
		if (!$result) {
			$error = "Có lỗi xảy ra trong quá trình gửi mail";
		}
	} catch (Exception $e) {
		echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
	// lưu verificode lên database xác nhận việc active
	$verificationCode_add = array(
		'id' => $user_id,
		'verificationCode' => $verificationCode_iduser
	);
	//upload to database
	save('users', $verificationCode_add);
}
//end register

//edit user information
function edit($user_id)
{
	global $conn, $errors, $username, $fullname, $email;

	$username = escape($_POST['username']);
	$email = escape($_POST['email']);
	$fullname = escape($_POST['fullnme']);
	//make sure form is filled property
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($fullname)) {
		array_push($errors, "Fullname is required");
	}

	$status_entities = 0;
	$array_entities = array(
		'&', '<', '>', "'", '"', '/'
	);
	foreach ($array_entities as $entitie) {
		if (strlen(strstr(escape($_POST['fullname1']), $entitie)) > 0 || strlen(strstr(escape($_POST['username1']), $entitie)) > 0) {
			$status_entities = 1;
		}
	}
	if ($status_entities == 1) {
		$_SESSION['mess_entities'] = "Chuỗi bạn nhập vào có ký tự bị cấm. Không thể lưu lại thay đổi";
		header('location: index.php');
	} else {
		$username    =  escape($_POST['username1']);
		$fullname    =  escape($_POST['fullname1']);
		$email       =  escape($_POST['email1']);
		$version	 =  intval($_SESSION['version_update'] + 1);
		mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email', `version`='$version' WHERE `id` = '$user_id'");

		$_SESSION['success']  = "Change successfully";
		if (isset($_COOKIE["user"]) and isset($_COOKIE["pass"])) {
			setcookie("user", '', time() - 3600);
			setcookie("pass", '', time() - 3600);
		}

		unset($_SESSION['version_update']); // update version edit 
		$_SESSION['success'] = "This User has successfully changed";
		header('location: list.php');
	}
}
//end edit

function getUserById($id)
{
	global $conn;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function escape($val)
{
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}

function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<div class="error">';
		foreach ($errors as $error) {
			echo $error . '<br>';
		}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	} else {
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);

	if (isset($_COOKIE["user"]) and isset($_COOKIE["pass"])) {
		setcookie("user", '', time() - 3600);
		setcookie("pass", '', time() - 3600);
	}

	header("location: login.php");
}
if (isset($_POST['login_btn'])) {
	login();
}
// //Demo SQLInjection Bug
// function login1()
// {
// 	global $conn; // chuỗi kết nối lên Server đã được định nghĩa
// 	$usernameLogin = $_POST['username'];
// 	$userpasswordLogin = $_POST['password'];
// 	// username và password được lấy trực tiếp từ input người dùng
// 	// không được xử lý trước khi đưa vào câu truy vấn
// 	if (isset($_POST['login_btn'])) {
// 		$sql = "SELECT * FROM users WHERE username='$usernameLogin' AND password='$userpasswordLogin' ";
// 		$resultsSQL = mysqli_query($conn, $sql);
// 		// kiểm tra kết quả truy vấn không rỗng
// 		if (!empty($resultsSQL)) {
// 			$logged_in_user = mysqli_fetch_assoc($resultsSQL);
// 			$_SESSION['user'] = $logged_in_user;
// 			$_SESSION['success']  = "You are now logged in";
// 			header('location: home.php');
// 		}
// 	}
// }

// //Demo XSS Bug
// function edit1($user_id)
// {
// 	global $conn, $errors, $username, $fullname, $email;
// 	$username    =  escape($_POST['username1']);
// 	$fullname    =  escape($_POST['fullname1']);
// 	$email       =  escape($_POST['email1']);
// 	$version	 =  intval($_SESSION['version_update'] + 1);
// 	mysqli_query($conn, "UPDATE `users` SET `username` = '$username', `fullname` = '$fullname', `email`='$email', `version`='$version' WHERE `id` = '$user_id'");

// 	$_SESSION['success']  = "Change successfully";
// 	if (isset($_COOKIE["user"]) and isset($_COOKIE["pass"])) {
// 		setcookie("user", '', time() - 3600);
// 		setcookie("pass", '', time() - 3600);
// 	}

// 	unset($_SESSION['version_update']); // update version edit 
// 	header('location: list.php');
// }

// LOGIN USER fix bug SQLInjection
function login()
{
	global $conn, $username, $errors;
	// gọi hàm escape đã được định nghĩa
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
		//ứng dụng hàm md5() mã hóa password
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
				$_SESSION['success']  = "You are now logged in by Admin";
				if (isset($_POST['remember'])) {
					//thiết lập cookie username và password
					setcookie("user", $row['username'], time() + (86400 * 30));
					setcookie("pass", $row['password'], time() + (86400 * 30));
				}
				header('location: home.php');
			} else {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				if (isset($_POST['remember'])) {
					//thiết lập cookie username và password
					setcookie("user", $row['username'], time() + (86400 * 30));
					setcookie("pass", $row['password'], time() + (86400 * 30));
				}
				header('location: index.php');
			}
		} else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
		return true;
	} else {
		return false;
	}
}

//delete user
function user_delete($id)
{
	global $conn;
	$id = intval($id);
	$sql = "DELETE FROM users WHERE id=$id";
	mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//get value by options
function get_by_options($table, $options = array())
{
	$select = isset($options['select']) ? $options['select'] : '*';
	$where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
	$order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
	$limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';
	global $conn;
	$sql = "SELECT $select FROM `$table` $where $order_by $limit";
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$data = array();
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		mysqli_free_result($query);
	}
	return $data;
}

function get_total($table, $options = array())
{
	global $conn;
	$where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
	$sql = "SELECT COUNT(*) as total FROM `$table` $where";
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($query);
	return $row['total'];
}
//pagination admin
function pagination_admin($url, $page, $total)
{
	$adjacents = 2;
	$out = '<ul class="pagination">';
	//first
	if ($page == 1) {
		$out .= '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Đầu</a></li>';
	} else {
		$out .= '<li class="page-item"><a class="page-link" href="' . $url . '">Đầu</a></li>';
	}
	// previous
	if ($page == 1) {
		$out .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&laquo;</span></li>';
	} elseif ($page == 2) {
		$out .= '<li class="page-item"><a class="page-link" href="' . $url . '"><span aria-hidden="true">&laquo;</span></a></li>';
	} else {
		$out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
	}
	$pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
	$pmax = ($page < ($total - $adjacents)) ? ($page + $adjacents) : $total;
	for ($i = $pmin; $i <= $pmax; $i++) {
		if ($i == $page) {
			$out .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
		} elseif ($i == 1) {
			$out .= '<li class="page-item"><a class="page-link" href="' . $url . '">' . $i . '</a></li>';
		} else {
			$out .= '<li class="page-item"><a class="page-link" href="' . $url . "&amp;page=" . $i . '">' . $i . '</a></li>';
		}
	}
	// next
	if ($page < $total) {
		$out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . ($page + 1) . '"> <span aria-hidden="true">&raquo;</span></a></li>';
	} else {
		$out .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&raquo;</span></span></li>';
	}
	//last
	if ($page < $total) {
		$out .= '<li class="page-item"><a class="page-link" href="' . $url . '&amp;page=' . $total . '">Cuối</a></li>';
	} else {
		$out .= '<li class="page-item disabled"><span class="page-link">Cuối</span></li>';
	}
	$out .= '</ul>';
	return $out;
}

//encode id
function getLink($id)
{
	//mã hóa md5 chuổi id 
	$random = md5(uniqid($id));
	$_SESSION['links_edit'][$random] = $_SESSION['info_user_id'][$random] = $id;
	//dùng mảng 2 chiều $_SESSION
	return "$random";
}

//lay du lieu tư db theo id
function get_a_record($table, $id, $select = '*')
{
	$id = intval($id);
	global $conn;
	$sql = "SELECT $select FROM `$table` WHERE id=$id";
	$query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$data = NULL;
	if (mysqli_num_rows($query) > 0) {
		$data = mysqli_fetch_assoc($query);
		mysqli_free_result($query);
	}
	return $data;
}

function save($table, $data = array())
{
	$values = array();
	global $conn;
	foreach ($data as $key => $value) {
		$value = mysqli_real_escape_string($conn, $value);
		$values[] = "`$key`='$value'";
	}
	$id = intval($data['id']);
	if ($id > 0) {
		$sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE id=$id";
	} else {
		$sql = "INSERT INTO `$table` SET " . implode(',', $values);
	}
	mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$id = ($id > 0) ? $id : mysqli_insert_id($conn);
	return $id;
}
