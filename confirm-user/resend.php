<?php
session_start();

include('../functions.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (!isLoggedIn() || $_SESSION['user']['status'] != 0) {
    header('location: index.php');
}

//send mail & config
include '../lib/config.php';
require '../vendor/autoload.php';
include '../lib/setting.php';
$mail = new PHPMailer(true);
try {
    $option = array(
        'order_by' => 'id'
    );
    $get_user_notActive = get_by_options('users', $option);
    foreach ($get_user_notActive as $user) {
        if ($user['id'] == $_SESSION['user']['id']) {
            $email = $user['email'];
            $username = $user['username'];
            $verification_Code = $user['verificationCode'];
        }
    }
    // dùng session lưu lại giá trị verifi code resend
    $_SESSION['resend_confirm_user'] = $verification_Code;
    //content
    $htmlStr = "";
    $htmlStr .= "Xin chào " . $username . ' (' . $email . "),<br /><br />";
    $htmlStr .= "Vui lòng nhấp vào nút bên dưới để xác minh đăng ký của bạn và có quyền truy cập vào trang người dùng cá nhân của PHP Training.<br /><br /><br />";
    $htmlStr .= "<a href='" . PATH_URL . "confirm-user/reactive.php?code=" . $verification_Code . "' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY ACCOUNT</a><br /><br /><br />";
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
    $mail->addAddress($email, $email);     // Add a recipient | name is option tên người nhận
    $mail->addReplyTo(SMTP_UNAME, 'Team D');
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Verification Users | PHP Training';
    $mail->Body = $htmlStr;
    $mail->AltBody = $htmlStr; //None HTML
    $result = $mail->send();
    if (!$result) {
        $error = "Có lỗi xảy ra trong quá trình gửi mail";
    }
    $mess =  "<strong>Done! Mã kích hoạt</strong> đã được gửi lại đến email: <strong>" . $email . "</strong>. <br><br>Vui lòng mở hộp thư đến email của bạn và nhấp vào liên kết đã cho để bạn có thể đăng nhập.";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>
<html>

<head>
    <title>Resend Request Active Account</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container">
        <!-- notification message -->
        <?php if (isset($mess)) : ?>
            <div class="error success" style="text-align: center;">
                <h3>
                    <?php
                    echo $mess;
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>
</body>

</html>