<?php 
// Start the session
session_start();
//var_dump($_SESSION['role']);

// --------------Factory----------
require '../models/FactoryPattentAdmin.php';
$factory = new FactoryPattentAdmin();
$userModel = $factory->make('user');
// --------------Factory----------

if($_SESSION['role'] == 'Admin') { 
    $params = [];

    if (!empty($_GET['keyword'])) {
        $params['keyword'] = $_GET['keyword'];
        
    }
    $users = $userModel->getUsers($params);
    
} else {
    header('location: index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <?php include('../views/admin/layouts/head.php')?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include('../views/admin/layouts/header-desktop.php')?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include('../views/admin/layouts/header-mobile.php')?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <?php include('../views/admin/partials/breadcrumb.php')?>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <?php include('../views/admin/partials/welcome.php')?>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <?php include('../views/admin/partials/statistic.php')?>
            <!-- END STATISTIC-->

            <!-- STATISTIC CHART-->
            <?php include('../views/admin/partials/chart.php')?>
            <!-- END STATISTIC CHART-->

            <!-- DATA TABLE-->
            <?php include('../views/admin/partials/data.php')?>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <?php include('../views/admin/partials/copyright.php')?>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <?php include('../views/admin/layouts/footer.php')?>

</body>

</html>
<!-- end document-->