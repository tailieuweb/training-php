<?php
session_start();
include('../functions.php');
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../lib/config.php';

if (!empty($_POST['change'])) {
    $id = $_SESSION['id_change_pass'][$_POST['change']];
    $newpassword = md5($_POST['newPassword']);
    $confirmNewPassword = md5($_POST['confirmNewPassword']);

    $user = get_a_record('users', $id);
    $email = $user['email'];
    global $conn;

    if ($newpassword == $user['password']) {
        $mess = "<strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Mật khẩu mới của bạn vừa nhập là mật khẩu của bạn hiện tại đó.";
    } elseif (strlen($_POST['newPassword']) < 8) {
        $mess = "<strong>NO!</strong> Việc thay đổi mật khẩu thất bại. Mật khẩu bạn nhập phải dài từ 8 ký tự trở lên !!";
    } elseif ($newpassword == $confirmNewPassword) {
        $options = array(
            'id' => $id,
            'password' => $newpassword
        );
        save('users', $options);

        //send mail
        require '../vendor/autoload.php';
        include '../lib/setting.php';
        $mail = new PHPMailer(true);
        try {
            //content
            $htmlStr = "";
            $htmlStr .= "Xin chào <strong>" . $user['username'] . '</strong> (' . $email . "),<br /><br />";
            $htmlStr .= "Mật khẩu của bạn hiện đã được thay đổi cách đây không lâu...<br /><br />";
            $htmlStr .= "Vui lòng kiểm tra và <a href='" . PATH_URL . "login.php'>Đăng nhập</a></div> lại với mật khẩu mới của bạn.<br><br>";
            $htmlStr .= "Trân trọng,<br />";
            $htmlStr .= "By TEAM D<br />";
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
            $mail->Subject = 'You have Change your Password | PHP TRAINING | By Tân TEAM D';
            $mail->Body = $htmlStr;
            $mail->AltBody = $htmlStr; //None HTML
            $result = $mail->send();
            if (!$result) {
                $error = "Có lỗi xảy ra trong quá trình gửi mail";
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        $mess_success = '<strong>Tốt!</strong> Bạn đã thay đổi mật khẩu thành công. Và một tin nhắn thông báo đã được gửi đến Email của người dùng này. Hãy đến trang <a href="../login.php">Đăng nhập</a> và đăng nhập lại.!!';
    } else $mess = '<strong>NO!</strong> Việc thay đổi mật khẩu có vấn đề. Ô nhập xác thực mật khẩu không đúng với mật khẩu mới mà bạn nhập vào !!';
} else header('location: index.php');
require('result.php');
