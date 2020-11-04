<?php
require_once("./autoload.php");
if(isset($_SESSION['user_type'])){
    if ($_SESSION['user_type'] == "admin") {
        $custom_id = $_GET['delete'];
        $userModel = new UserModel();
        $user = $userModel->getUserByCustomId($custom_id);
        if (count($user) == 0) {
            header("location: listUser.php");
        }else{
            $page = $_GET['page'];
            $userModel->deleteUserByCustomId($custom_id);
            header("location: listUser.php?page=$page&detete=true");
        }
    }else{
        header("location: index.php");
    }
}else{
    header("location: index.php");
}
