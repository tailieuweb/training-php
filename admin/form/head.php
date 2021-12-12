<?php 
session_start();
if (!isset($_SESSION['admin_name'])){
    echo "<script> alert('Vui l òng đăng nhập trước !!');window.location.href='../Login/index.php';</script>";
}

require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "./models/user.php";
$db = new Db;
$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$user = new User;
if (isset($_GET['page'])) {
    $page = $_GET['page'];     // Lấy số trang trên thanh địa chỉ 
} else {
    $page = 1;
}
$url = $_SERVER['PHP_SELF']; // lấy đường dẫn đến file hiện hành 
?>

<head>
    <title>Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">
        ul.pagination {
            list-style: none;
            float: right;
        }

        ul.pagination li.active {
            font-weight: bold;
        }

        ul.pagination li {
            display: flex;
            padding: 10px
        }
    </style>
</head>