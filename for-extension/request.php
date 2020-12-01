<?php
session_start();
include('../functions.php');
if (isset($_GET['mssv'])) {
    $users_option = array(
        'order_by' => 'id asc'
    );
    $users = get_by_options('users', $users_option);
    foreach ($users as $user) {
        if ($user['id'] == $_GET['mssv']) {
            $id = $_GET['mssv'];
        }
    }
    if (isset($id)) {
        $presence = array(
            'id' => $id,
            'presence' => 1,
            'presence_time' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
        );
        save('users', $presence);
    }
}
