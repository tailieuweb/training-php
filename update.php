<?php
session_start();

include('functions.php');

empty($_GET['update']) ? header('location: home.php') : '';

if ($_SESSION['result_link'] != $_GET['update']) header('location: home.php');

$encode_link = $_SESSION['links_edit'][$_GET['update']];

if (isset($_POST['save_btn'])) {
	edit($encode_link);
}

$_SESSION['success'] = "This User has successfully changed";

require('list.php');