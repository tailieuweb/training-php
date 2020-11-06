<?php
// include library
session_start();
require_once("./config/database.php");
require_once("./models/Db.php");
require_once("./models/User.php");
require_once("./function.php");

// error is null
$errors = [];
$success = [];
