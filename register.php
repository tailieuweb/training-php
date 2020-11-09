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
$less->compileFile('less/register.less', 'public/css/register.css');
?>
<?php 
session_start();

    include('functions.php') ;
    
 
    // Check isLogin
    if(isset($_SESSION['user_type'])){
        $title_heading = "Add User";
        if($_SESSION['user_type'] == "user"){
            header("location: home.php");
        }
    }else{
        $title_heading = "Register";
    }

    // chức năng add user
    if (isset($_POST['register'])) {
        $username = strip_tags($_POST['username']);
        $fullname = strip_tags($_POST['fullname']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $re_password = strip_tags($_POST['re_password']);
        if (isset($_POST['user_type'])) {
            $user_type = strip_tags($_POST['user_type']);
        }else{
            $user_type = "user";
        }
                    $userLogin = $userModel->getUserByUsername($username);
                    if (count($userLogin) == 0) {
                        $user = $userModel->addUser($username,$fullname,$email,$password,$user_type,$name_img_user);
                        $id_user = $user[0]['id'];
                        $userModel->update($id_user);
                        if ($user == true) 
                        {
                            if ($_SESSION['user_type'] == "admin") {
                                array_push($success, "Tạo Thành Công!!!");
                            }else{
                                header('location: login.php?register_user='.$username.'&register_pass='.$password);
                            }
                        }
                    }else{
                        array_push($errors, "Username Đã tồn tại!!!");
                    }
                }else{
                    array_push($errors, "Kich Thuoc Anh qua Lon!!!");
                }
                break;  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $url_path ?>/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url_path ?>/public/css/register.css" rel="stylesheet" type="text/css" />
        
        <?php
        if (!class_exists('lessc')) {
            include ('./libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('less/register.less', 'public/css/register.css');
        ?>
    </head>
    <body >
        <?php include '../php-traning-less/register-content.php'; ?>
    </body>
</html>
