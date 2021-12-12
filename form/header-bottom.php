<div class="header-bottom head-bottom">
    <!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="" style="width: 100px; height: 50px" />
                            <a href="" class="logo_name">Electronic Store</a>
                        </a>
                    </div>
                </div>
                <div class="mainmenu pull-right">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="index.php" class="active"><i class="fas fa-home"></i> Trang chủ</a></li>
                        <li class="dropdown"><a href="index.php"><i class="fas fa-tv"></i> Sản phẩm<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <?php foreach ($protype->getAllProtype() as $value) { ?>
                                <li>
                                    <a href="cate.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li ><a href="#"><i class="fas fa-phone-volume"></i> Liên hệ</a></li>
                        <li><a href="#"><i class="fab fa-blogger-b"></i> Blog</a>
                        <li><a href="cart.php"><i class="fas fa-cart-arrow-down"></i> Giỏ hàng</a></li>
                        <li>
                            <!-- <a href="./Login/logout.php">Đăng nhập</a> -->
                            <?php if(empty($_SESSION['customer_name'])):?>
                            <a href="./Login/index.php" style="font-size:12px; margin-bottom:-20px"><i
                                    class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                            <?php else:?>
                            <section style="margin-top: 1px; font-size: 16px;font-weight: bold;">
                            <i class="fas fa-user-tie"></i> : <span style="padding-right: 12px; color:yellow"><?=$_SESSION['customer_name']?></span>
                                <?php unset($_SESSION['customer_name'])?>
                                <a style="font-size:12px; margin-bottom:-20px" href='../index.php'>
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>
                            </section>
                            <?php endif;?>
                        </li>
                    </ul>
                    <div class="search_box pull-right">
                        <form action="result.php" method="get">
                            <input type="text" placeholder="Search" name="key" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/header-bottom-->
</header>
<!--/header-->