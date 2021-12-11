<?php
	session_start();
	require_once 'models/FactoryPattent.php';
	$factory = new FactoryPattent();
	$HomeModel = $factory->make('home');
    $coupon = null;
	
    //var_dump($coupon[0]['discount']).die();
?>
<!DOCTYPE html>
<html lang="vi">


    <?php include('views/head.php') ?>


<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>

    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Mã khuyến mãi của tôi</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="coupon.php">Mã khuyễn mãi</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Blog Main Area =================-->
    <section class="our_cakes_area p_100">
        <div class="container">
            <?php 
                if(!empty($_SESSION['lgUserID'])) {
                    $coupon = $HomeModel->getCouponByID($_SESSION['lgUserID']);
               
                    if(isset($coupon)) { 
                        if($coupon[0]['status'] == 1) {
                
            ?>
            <div class="coupondiv">
                <div class="promotiontype">
                    <div class="promotag">
                        <div class="promotagcont">
                            <div class="saveamount">
                                <?= $coupon[0]['discount'] ?> %
                            </div>
                            <div class="saleorcoupon">
                                COUPON
                            </div>
                        </div>
                    </div>
                    <div class="promotiondetails">
                        <a href="" class="coupontitle">Mã giảm giá  <?= $coupon[0]['discount'] ?>% cho đơn hàng đầu hàng đầu tiên của bạn</a>
                        <div class="cpinfo">
                            <i class="fa fa-history"></i> Hạn dùng: <?= date( "d-m-Y", strtotime($coupon[0]['created_at']));?> <br>
                            <i class="fa fa-check"></i> Áp dụng

                        </div>
                    </div>
                    <div class="cpbutton">
                        <a href="" class="copyma">
                            <input type="text" value="<?= $coupon[0]['zipcode'] ?>" class="coupon-code" id="copy">
                            <div onclick="myFunction()" class="text">LẤY MÃ</div>
                        </a>
                    </div>
                </div>
            </div>
            <?php }  } } ?>
        </div>
    </section>
    <!--================End Blog Main Area =================-->

    <!--================Special Recipe Area =================-->
    <?php include_once("views/layouts/special.php");?>
    <!--================End Special Recipe Area =================-->

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
    <script>
    function myFunction() {

        var copyText = document.getElementById("copy");


        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        navigator.clipboard.writeText(copyText.value);

        alert("Copied the text: " + copyText.value);
    }
    </script>
</body>

</html>