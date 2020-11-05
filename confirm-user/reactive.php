<?php
session_start();
include '../functions.php';

if (!isset($_GET['code']) || empty($_GET['code']) || !isLoggedIn()) {
    header('location: ../index.php');
} elseif (!isset($_SESSION['resend_confirm_user'])) {
    $mess_er = "<strong>Error!</strong> Liên kết đã quá hạn!! <a href='/resend.php'>Gửi lại yêu cầu</a>";
}

// kiểm tra giá trị mã hóa resend user bằng với giá trị mã hóa trong liên kết mã resend trong mail
if (isset($_SESSION['resend_confirm_user']) && $_SESSION['resend_confirm_user'] == $_GET['code']) {
    $select_user_option = array(
        'order_by' => 'id'
    );
    $user_need_activate = get_by_options('users', $select_user_option);

    foreach ($user_need_activate as $user) {
        if ($user['verificationCode'] == $_GET['code']) {
            $verifi_id_user = $user['id'];
        }
    }
    if (!isset($verifi_id_user)) {
        exit;
    }
    $user_edit = array(
        'id' => $verifi_id_user,
        'status' => 1
    );
    save('users', $user_edit);
    $mess = "<strong>Done!</strong> Bạn đã kích hoạt tài khoản thành công, giờ bạn đã có thể đăng nhập vào website Hãy đến trang <a href='../index.php'>Thông tin cá nhân</a>";
}
require('result.php');
