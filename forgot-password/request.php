<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../functions.php');
include '../lib/config.php';

if (!isset($_POST['email'])) header('location: index.php');

if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    global $conn;
    if (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        $_SESSION['forgot_pass'] = " Email này không hợp lệ. Vui lòng <a href='javascript: history.go(-1)'>Trở lại</a> và nhập email khác. Hoặc <a href='../login.php'>Đến Trang Login</a>";
        require('index.php');
        exit;
    } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'")) < 1) {
        $_SESSION['forgot_pass'] = "Email này không có người dùng và không tồn tại trong máy chủ. <br> Vui lòng <a href='javascript: history.go(-1)'>Trở lại</a> và nhập lại Email khác. Hoặc <a href='../login.php'>Đến Trang Login</a>";
        require('index.php');
        exit;
    } else {

        $option = array(
            'order' => 'id'
        );
        $user_name = "";
        $user_id = 0;
        $users = get_by_options('users', $option);
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                $user_name = $user['username'];
                $user_id = $user['id'];
            }
        }

        require '../vendor/autoload.php';
        include '../lib/setting.php';
        $mail = new PHPMailer(true);
        try {
            $verificationCode = md5(uniqid($user_id, true));
            $_SESSION['forgot_pass_Code'] = $verificationCode;
            $_SESSION['forgot_pass_id'][$verificationCode] = $user_id;
            $verificationLink = PATH_URL . "forgot-password/result.php?code=" . $verificationCode;
            //content
            $htmlStr = "";
            $htmlStr .= "Xin chào <strong>" . $user_name . '</strong> (' . $email . "),<br /><br />";
            $htmlStr .= "Chào mừng bạn đến với PHP TRAINING.<br /><br /><br />";
            $htmlStr .= "Vui lòng truy cập tại link sau để xác thực tài khoản và bắt đầu đổi mật khẩu mới.<br><br>";
            $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Change New Password</a><br /><br /><br />";
            $htmlStr .= "Lưu ý: Tuyệt đối không nhấp vào button link trên nếu bạn không thực hiện hành động này!.<br><br>";
            $htmlStr .= "Cảm ơn bạn đã tham gia và đồng hành cùng PHP TRAINING.<br><br>";
            $htmlStr .= "Trân trọng,<br />";
            $htmlStr .= "By TEAM D";
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
            $mail->setFrom(SMTP_UNAME, "PHP TRAINING");
            $mail->addAddress($email, $email);     // Add a recipient | name is option tên người nhận
            $mail->addReplyTo(SMTP_UNAME, 'PHP TRAINING');
            //$mail->addCC('CCemail@gmail.com');
            //$mail->addBCC('BCCemail@gmail.com');
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Forgot Password | PHP TRAINING | Reset your Password | By TEAM D';
            $mail->Body = $htmlStr;
            $mail->AltBody = $htmlStr; //None HTML
            $result = $mail->send();
            if (!$result) {
                $error = "Có lỗi xảy ra trong quá trình gửi mail";
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        $_SESSION['forgot_pass_suc'] =  "<strong>Done!</strong> Bạn sẽ nhận được tin nhắn Email xác nhận đổi mật khẩu với email mà bạn vừa nhập.<br><br> Vui lòng đến hộp thư và kiểm tra tin nhắn và xác nhận liên kết đổi mật khẩu ở đó!!";
        require('index.php');
    }
} else header('location: index.php');
