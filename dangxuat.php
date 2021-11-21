<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["username"]);
unset($_SESSION["groupID"]);
unset($_SESSION["message"]);
header("Location: index.php");
?>