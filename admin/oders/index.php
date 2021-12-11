<?php
session_start();
require "../../models/FactoryPattentTwoAdmin.php";
if($_SESSION['role'] == 'Admin') { 
    $factory = new FactoryPattentTwoAdmin();
    $OrderModel = $factory->make('order');

    // -----------Factory------------------
    $orders = $OrderModel->getOrders();
    
} else {
    header('location: ../index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">

    <!-- Title Page-->
    <title>Dashboard</title>
    <?php include('../../views/admin/layouts/head.php') ?>

    <!-- Fontfaces CSS-->
    <link href="../../public/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="../../public/backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../public/backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="../../public/backend/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../public/backend/css/theme.css" rel="stylesheet" media="all">
    <link href="../../public/backend/css/protype.css" rel="stylesheet" media="all">

</head>
<style>
.table-data__tool {
    justify-content: flex-end;
}
</style>

<body class="animsition">

    <div class="page-wrapper-1">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../../public/backend/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="../admin.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>

                            </li>

                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-copy"></i>
                                    <span class="bot-line"></span>Pages</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="../products/index.php">Products</a>
                                    </li>
                                    <li>
                                        <a href="../Manufacture/">Manufactures</a>
                                    </li>
                                    <li>
                                        <a href="../protype/index.php">Protype</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="../oders/index.php">
                                    <i class="fas fa-desktop"></i>
                                    <span class="bot-line"></span>Orders</a>

                            </li>
                            <li class="has-sub">
                                <a href="../zipcode/index.php">
                                    <i class="fas fa-desktop"></i>
                                    <span class="bot-line"></span>ZipCode</a>

                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">

                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../../public/backend/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <?php 
            if (isset($_SESSION['lgUserID'])) {
                ?>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?= $_SESSION['lgUserName'] ?></a>
                                </div>
                                <?php
            } ?>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../../public/backend/images/icon/avatar-01.jpg"
                                                    alt="John Doe" />
                                            </a>
                                        </div>
                                        <?php 
                    if(isset($_SESSION['lgUserID'])) { 
                    
                ?>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="../../profile.php"><?= $_SESSION['lgUserName'] ?></a>
                                            </h5>
                                            <span class="email">ngoctam2303001@gmail.com</span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <?php
            if (!empty($_SESSION["lgUserID"])) {
                $chuoi1 = <<<EOD
                <div class="account-dropdown__item">
                    <a href="../../profile.php">
                        <i class="zmdi zmdi-account"></i>Account</a>
                </div>
                <div class="account-dropdown__footer">
                    <a href="../../logout.php">
                    <i class="zmdi zmdi-power"></i>Logout</a>
                 </div>
                EOD;
                echo $chuoi1;
            } 

            ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include('../../views/admin/layouts/header-mobile.php') ?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Orders table</h3>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Product name</th>
                                            <th>Address</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Notes</th>
                                            <th>Order date</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($orders)) { foreach ($orders as $order) { ?>
                                        <!-- products -->
                                        <?php 
                                            $item = $OrderModel->getOrderItemById($order['id']);
                                            //print_r($item);
                                            $sum = 0;
                                            $soluong = 0;
                                            $gia = 0;
                                            foreach ($item as $key) {
                                                $soluong += $key['quantity'];
                                                $gia += $key['price'];
                                                //print_r($gia);
                                                $sum = $item[0]['quantity'] * $gia;
                                                
                                            }
                                            
                                        ?>
                                        <tr class="tr-shadow">
                                            <td class="stt"></td>
                                            <td>
                                                <?= htmlspecialchars($order['firstname'])  ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($order['lastname'])  ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($item[0]['name'])  ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($order['address'])  ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($soluong)  ?>
                                            </td>
                                            <td>
                                                $<?= htmlspecialchars($gia)  ?>
                                            </td>
                                            <td>
                                                $<?= htmlspecialchars($order['sum'])  ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars($order['notes'])  ?>
                                            </td>
                                            <td>
                                                <?= htmlspecialchars(date( "d-m-Y", strtotime($order['addedDate'])))?>
                                            </td>
                                            <?php if($order['status'] == 0) {?>
                                            <td>
                                                <span class="status--process">Inactive</span>
                                            </td>
                                            <?php } else { ?>
                                            <td>
                                                <span class="status--process">Active</span>
                                            </td>
                                            <?php } ?>
                                            <td class="edit-delete">
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Edit"
                                                        onclick="window.location.href='./update.php?id=<?php echo md5($order['id'] . 'chuyen-de-web-2') ?>'">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete"
                                                        onclick="window.location.href='./delete.php?id=<?php echo md5($order['id'] . 'chuyen-de-web-2')  ?>'">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../../public/backend/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../public/backend/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../public/backend/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../public/backend/vendor/slick/slick.min.js">
    </script>
    <script src="../../public/backend/vendor/wow/wow.min.js"></script>
    <script src="../../public/backend/vendor/animsition/animsition.min.js"></script>
    <script src="../../public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../public/backend/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../public/backend/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../public/backend/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../public/backend/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../public/backend/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../public/backend/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../public/backend/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="../../public/js/xss.js"></script>

</body>

</html>
<!-- end document-->