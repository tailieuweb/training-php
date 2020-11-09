
<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}

$less = new lessc;
$less->compileFile('less/index.less', 'public/css/index.css');
?>
<?php
session_start();
include('functions.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}

//sửa mật khẩu  
if (isset($_POST['change-pass'])) {
    $errors = [];
    $success = [];
    if (isset($_POST['password']) && isset($_POST['re_password'])) {
        $pass = $_POST['password'];
        $re_pass = $_POST['re_password'];
        if ($pass == $re_pass) {
            $result = $userModel->changPass($pass, $_SESSION['custom_id']);
            if ($result == true) {
                array_push($success, "Sửa Thành Công!!!");
            }
        } else {
            array_push($errors, "Mật khẩu không trùng nhau!!!");
        }
    }
}


$id_edit = $_SESSION['user']['id'];


$detail = " SELECT * FROM users WHERE `id` = $id_edit";
$details = mysqli_query($conn, $detail);
$row = mysqli_fetch_array($details);


$password;

$id =  $_SESSION['user']['id'];

if (isset($_POST['password_1']) && isset($_POST['password_2'])) {
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
    if (isset($_COOKIE["user"]) and isset($_COOKIE["pass"])) {
        setcookie("user", '', time() - 3600);
        setcookie("pass", '', time() - 3600);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $url_path ?>/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url_path ?>/public/css/index.css" rel="stylesheet" type="text/css" />
        
        <?php
        if (!class_exists('lessc')) {
            include ('./libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('less/index.less', 'public/css/index.css');
        ?>
    </head>
    <body >
        <?php include '../php-traning-less/index-content.php'; ?>
    </body>
</html>