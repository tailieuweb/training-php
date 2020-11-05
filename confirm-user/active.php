<?php
session_start();
include '../functions.php';

if (!isset($_GET['code']) || empty($_GET['code']) || !isLoggedIn()) {
    header('location: ../index.php');
} elseif (!isset($_SESSION['activeCode'])) {
    $mess_er = "<strong>Error!</strong> Liên kết đã quá hạn!! <a href='/resend.php'>Gửi lại yêu cầu</a>";
}
// kiểm tra session'activeCode' chứa giá trị trong liên kết kích hoạt = với giá trị id mã hóa của user
if (isset($_SESSION['activeCode']) && $_SESSION['activeCode'] == $_GET['code']) {
    $select_user_option = array(
        'order_by' => 'id'
    );
    $user_need_activate = get_by_options('users', $select_user_option);
    foreach ($user_need_activate as $user) {
        //
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
