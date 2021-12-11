<?php
    session_start();
    if (isset($_SESSION["lgUserID"])) {
        unset($_SESSION["lgUserName"]);
        unset($_SESSION["lgUserID"]);
        unset($_SESSION["role"]);
        if (isset($_SESSION["mycart"])) {
            unset($_SESSION["mycart"]);
        }
        header('location: index.php');
        
    }
   
    ?>