<?php
session_start();
require_once("../../models/ZipCodeModel.php");
$noti = 0;
if($_SESSION['role'] == 'Admin') { 
    
    $zipcode = new ZipCodeModel();
    $allUser = $zipcode->getUser();
    if (!empty($_GET['id'])) {
        $zipcodeById = $zipcode->getZipCodeById($_GET['id']);
    }
    if (!empty($_POST['submit'])) {
        if(empty($_GET['id'])){
            $result = $zipcode->insertZipcode($_POST);
            if($result){
                header('location: index.php');
            }else{
                $noti = 2;
            }
        }else{
             $result1 = $zipcode->updateZipcode($_POST);
            if($result1){
                header('location: index.php');
            }else{
                $noti = 3;
            }
        }
    }
} else {
    header('location: ../index.php');
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
</head>
<style>
.select2-hidden-accessible {
    border: 0 !important;
    clip: rect(0 0 0 0) !important;
    height: 1 px !important;
    margin: -1 px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1 px !important;
}
</style>

<body class="">

    <div class="page-wrapper">
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
                                                <a href="../profile.php"><?= $_SESSION['lgUserName'] ?></a>
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
        <?php include('../../views/admin/layouts/header-mobile.php')?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- DATA TABLE-->
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <strong>Add Product</strong>
                        </div>
                        <?php if(isset($noti) && $noti == 2) {?>
                        <div class="alert alert-danger" role="alert">
                            ADD ZIPCODE UNSUCCESSFUL
                        </div>
                        <?php }else if($noti == 3){?>
                        <div class="alert alert-danger" role="alert">
                            UPDATE ZIPCODE UNSUCCESSFUL
                        </div>
                        <?php } ?>
                        <div class="card-body card-block">
                            <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <input value="<?php if(isset($zipcodeById)) echo $zipcodeById[0]['id']?>" type="hidden"
                                    id="text-input" name="id">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">User</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="user_id" id="select" class="form-control">
                                            <option value="0">Please select user</option>
                                            <?php if(isset($allUser)){
                                                foreach ($allUser as $value) { ?>
                                            <option value="<?= $value['id'] ?>"
                                                <?php if(isset($zipcodeById) && $zipcodeById[0]['user_id'] == $value['id']){echo 'selected';}?>>

                                                <?= $value['username']?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Discount</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="<?php if(isset($zipcodeById)) echo $zipcodeById[0]['discount']?>"
                                            type="number" id="text-input" name="discount" placeholder="Discount"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">
                                            <?php if(isset($zipcodeById)) {
                                                if($zipcodeById[0]['status'] == "0"){?>
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="inline-radio1" name="status" value="0"
                                                    class="form-check-input" checked>Pending
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ml-2">
                                                <input type="radio" id="inline-radio2" name="status" value="1"
                                                    class="form-check-input">Active
                                            </label>
                                            <?php }else{?>
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="inline-radio1" name="status" value="0"
                                                    class="form-check-input">Pending
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ml-2">
                                                <input type="radio" id="inline-radio2" name="status" value="1"
                                                    class="form-check-input" checked>Active
                                            </label>
                                            <?php } }else{?>
                                            <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="inline-radio1" name="status" value="0"
                                                    class="form-check-input" checked>Pending
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ml-2">
                                                <input type="radio" id="inline-radio2" name="status" value="1"
                                                    class="form-check-input">Active
                                            </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <!-- END DATA TABLE-->
            <!-- COPYRIGHT-->
            <?php include('../../views/admin/partials/copyright.php')?>
            <!-- END COPYRIGHT-->
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