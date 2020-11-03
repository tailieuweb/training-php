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
		}
	} else header('location: home.php');
}

$_SESSION['success'] = "This User has successfully changed";

require('list.php');
