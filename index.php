<?php
session_start();
ob_start();
    require_once "models/HomeModel.php";

    $HomeModel = new HomeModel();

?>
<!DOCTYPE html>
<html lang="vi">

<?php include_once("views/head.php");?>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
    <!--================End Main Header Area =================-->

    <!--================Slider Area =================-->
    <?php include_once("views/layouts/slider.php");?>
    <!--================End Slider Area =================-->

    <!--================Welcome Area =================-->
    <?php include_once("views/layouts/welcome.php");?>
    <!--================End Welcome Area =================-->

    <!--================Special Recipe Area =================-->
    <?php include_once("views/layouts/special.php");?>
    <!--================End Special Recipe Area =================-->

    <!--================Service Area =================-->
    <?php include_once("views/layouts/service.php");?>
    <!--================End Service Area =================-->

    <!--================Discover Menu Area =================-->
    <?php include_once("views/layouts/discover-menu.php");?>
    <!--================End Discover Menu Area =================-->

    <!--================Client Says Area =================-->

    <!--================End Client Says Area =================-->

    <!--================End Client Says Area =================-->

    <!--================End Client Says Area =================-->

    <!--================Latest News Area =================-->

    <!--================End Latest News Area =================-->

    <!--================Newsletter Area =================-->
    <?php include_once("views/layouts/news.php");?>
    <!--================End Newsletter Area =================-->

    <!--================Footer Area =================-->
    <?php include_once("views/layouts/footer.php");?>
    <!--================End Footer Area =================-->


    <!--================Search Box Area =================-->
    <?php include_once("views/layouts/search.php");?>
    <!--================End Search Box Area =================-->





    <?php include_once("views/footer.php");?>
</body>

</html>