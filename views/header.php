<?php

require_once 'models/HomeModel.php';

$protypeModel = new HomeModel();

$proty = $protypeModel->getProtype();



?>
<header class="main_header_area">

    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <ul class="h_social list_style">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <ul class="h_search list_style">
                    <?php
                    $dem = 0;
                    if (isset($_SESSION['mycart'])) {
                        $sum=0;
                        foreach ($_SESSION["mycart"] as $item) {
                            $sum+=$item;
                        }

                         $dem = count($_SESSION["mycart"]);
                    } else {
                         $dem = 0;
                    }
                ?>
                    <!-- Cart -->
                    <!-- <li id="ssl"><a href="cart.php"><i class="lnr lnr-cart"></i> <?= $dem ?></a></li> -->
                    <li id="ssl"><a href="cart.php"><i class="lnr lnr-cart"></i></a></li>
                    <!-- Search -->
                    <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
                </ul>

            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="http://localhost:8080/PHP-Web2-Ck-V1/public/img/logo.png" alt="">
                    <img src="http://localhost:8080/PHP-Web2-Ck-V1/public/img/logo-2.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li><a href="index.php">Trang chủ</a></li>

                        <!-- <li><a href="cake.php">Bánh của chúng tôi</a></li> -->
                        <li><a href="menu.php">Thực đơn</a></li>
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Thể loại bánh</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($proty as $pro) { ?>
                                <li><a href="Protype.php?type_id=<?=md5($pro['type_id'] . 'chuyen-de-web-2') ?>">-
                                        <?= $pro['type_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">

                        <!-- Shop -->
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Cửa tiệm</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.php">Cửa hàng</a></li>
                                <?php if(!empty($_SESSION['lgUserID'])) {?>
                                <li><a href="whishlist.php">Danh sách yêu thích</a></li>
                                <?php }?>
                            </ul>
                        </li>
                        <li><a href="contact.php">Liên hệ chúng tôi</a></li>
                        <!-- account -->
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                            <ul class="dropdown-menu">
                                <?php
                                    if(!empty($_SESSION['lgUserID'])) {
                                    $check = $protypeModel->getUserById($_SESSION['lgUserID']);
                                    if($check[0]['permission'] == 'Admin') {
                                ?>
                                <li><a href="admin/admin.php">Quản trị viên</a></li>
                                <?php } } ?>
                                <?php
                                    if(!empty($_SESSION['lgUserID'])) {
                                    $coupon = $protypeModel->getUserById($_SESSION['lgUserID']);
                                    if($coupon[0]['permission'] == 'User') {
                                ?>
                                <li><a href="coupon.php">Mã khuyến mãi</a></li>
                                <?php } } ?>


                                <?php
                            if (!empty($_SESSION["lgUserID"])) {
                                $chuoi1 = <<<EOD
                                <li><a href="view-checkout.php">Xem đơn hàng</a></li>
                                <li><a href="profile.php">Tài Khoản</a></li>
                                <li><a href="change-pasword.php">Đổi mật khẩu</a></li>
                                <li><a href="logout.php">Đăng xuất</a></li>
                                
EOD;
                                echo $chuoi1;
                          
                            } else {
                            $chuoi1 = <<<EOD
                            
                            <li><a href="login.php">Đăng Nhập</a></li>
                            <li><a href="register.php">Đăng Ký</a></li>
EOD;
                            echo $chuoi1;
                        }

                        ?>


                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<script>
function insertCart(id) {

    var xmlhttp = new XMLHttpRequest();
    var url = "cart.php?id=" + id + "&cache=" + parseInt(Math.random() * 10000);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sss").innerHTML = this.responseText;
        }
    }

    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    return false;
}

</script>