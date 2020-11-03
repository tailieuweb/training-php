<?php
session_start();
include('functions.php');

empty($_GET['user_id']) ? header('location: list.php') : $encode_user_id = $_SESSION['info_user_id'][$_GET['user_id']];

$user_id = intval($encode_user_id);
if ($_SESSION['user']['user_type'] == "admin") {
    if ($_SESSION['user']['id'] != $user_id) {
        user_delete($user_id);
    }
}

header('location:list.php');
