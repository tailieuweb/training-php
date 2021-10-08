<?php
session_start();
session_destroy();
setcookie('token', null, time() - 24 * 60 * 60);
header('location: login.php');
