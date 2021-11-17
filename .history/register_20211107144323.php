<?php ob_start();
include 'inc/header.php';
?>
<?php
$check = Session::get('customer_login');
if ($check == true) {
    header('Location:index.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $insert_Customer = $user->insert_Customer($_POST);
}
?>
<!-- <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                
            </div>
            <div class="col-lg-9">
            
            </div>
        </div>
    </div>
</section> -->
<!-- Hero Section End -->
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đăng ký</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Trang chủ</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">

        <div class="checkout__form">
            <h4>Đăng ký tài khoản</h4>
            <center>
                <h3><?php if (isset($insert_Customer)) {
                        echo $insert_Customer;
                    } ?></h3>
            </center>
            <form action="register.php" method="post">
                <div class="row">
                    <div class="modal-body">
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div> -->
                        <div class="checkout__input">
                            <p>Tài khoản<span>*</span></p>
                            <input type="text" name="username" placeholder="Enter Username">

                        </div>
                        <div class="checkout__input">
                            <p> họ và tên<span>*</span></p>
                            <input type="text" name="name" placeholder="Enter Name">
                        </div>
                        <div class="checkout__input">
                            <p> Mật khẩu<span>*</span></p>
                            <input type="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="checkout__input">
                            <p>Nhật lại mật khẩu<span>*</span></p>
                            <input type="password" name="repeatpassword" placeholder="Repeat Password">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" placeholder="Enter Email">
                                </div>
                            </div>

                        </div>

                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="address" placeholder="Enter Address">
                        </div>

                        <td>

                            <center><button style="width: 100%;" type="submit" class="site-btn" name="register">Đăng ký</button></center>
                        </td>
                    </div>

            </form>
        </div>
    </div>

</section>


<?php
include 'inc/footer.php';

ob_end_flush(); ?>