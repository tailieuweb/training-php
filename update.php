<?php
session_start();

include('functions.php');

empty($_GET['update']) ? header('location: home.php') : '';

if ($_SESSION['result_link'] != $_GET['update']) header('location: home.php');

$encode_link = $_SESSION['links_edit'][$_GET['update']];

if (isset($_POST['save_btn'])) {

	$user_local = get_a_record('users', $encode_link);
	if (isset($_SESSION['version_update'])) {
		if ($user_local['version'] == $_SESSION['version_update']) {
			edit($encode_link);
			$_SESSION['success'] = "This User has successfully changed";
		} else $_SESSION['mess_version'] = "Phiên chỉnh sửa đã hết hạn. Vui lòng thao tác lại!";
	} else {
		$_SESSION['mess_version'] = "Phiên chỉnh sửa đã hết hạn. Vui lòng thao tác lại!";
		header('location: home.php');
	}
}

require('list.php');
