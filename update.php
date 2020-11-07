<?php
session_start();

include('functions.php');

// trả về trang chủ nếu không giá trị $link_edit từ file edit truyền vào
empty($_GET['update']) ? header('location: home.php') : '';

// chống IDOR
if ($_SESSION['result_link'] != $_GET['update']) header('location: home.php');

// gọi ra ID là giá trị của session result_link thông qua hàm getLink
$encode_link = $_SESSION['links_edit'][$_GET['update']];

if (isset($_POST['save_btn'])) {

	$user_local = get_a_record('users', $encode_link);
	if (isset($_SESSION['version_update'])) {
		if ($user_local['version'] == $_SESSION['version_update']) {

			// //demo bug XSS
			// edit1($encode_link);
			
			edit($encode_link);
			
		} else $_SESSION['mess_version'] = "Phiên chỉnh sửa đã hết hạn. Vui lòng thao tác lại!";
	} else {
		$_SESSION['mess_version'] = "Phiên chỉnh sửa đã hết hạn. Vui lòng thao tác lại!";
		header('location: home.php');
	}
}

require('list.php');
