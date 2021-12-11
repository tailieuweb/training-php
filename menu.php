<?php
    session_start();
    require_once 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');
    $productsDesc = $HomeModel->getDiscoverDescProducts();
    $productsAsc = $HomeModel->getDiscoverAscProducts();
?>
<!DOCTYPE html>
<html lang="vi">



    <?php include_once("views/head.php");?>


<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Thực đơn</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="menu.php">Thực đơn</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Recipe Menu list Area =================-->
    <section class="price_list_area p_100">
        <div class="container">
            <div class="price_list_inner">
                <div class="single_pest_title">
                    <h2>Bảng giá của chúng tôi</h2>
                    <p>Nhưng để bạn có thể hiểu rằng mọi lỗi lầm bẩm sinh đều là niềm vui khi buộc tội và ca ngợi nỗi
                        đau, tôi sẽ mở ra toàn bộ vấn đề, và sẽ giải thích chính những điều đã được nói bởi người phát
                        minh ra sự thật và như nó là kiến ​​trúc sư của cuộc sống may mắn.</p>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="discover_item_inner">

                            <?php if(!empty($productsDesc)) {
                            foreach ($productsDesc as $product) {?>
                            <div class="discover_item">
                                <h4><?= $product['name'] ?></h4>
                                <p><?= substr($product['description'], 0 , 77) ?>...
                                    <span>$<?= $product['price'] ?></span>
                                </p>
                            </div>
                            <?php }
                        }?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="discover_item_inner">

                            <?php if(!empty($productsAsc)) {
                            foreach ($productsAsc as $product) {?>
                            <div class="discover_item">
                                <h4><?= $product['name'] ?></h4>
                                <p><?= substr($product['description'], 0 , 70) ?>...
                                    <span>$<?= $product['price'] ?></span>
                                </p>
                            </div>
                            <?php }
                        }?>
                        </div>
                    </div>
                </div>
                <div class="row our_bakery_image">
                    <div class="col-md-4 col-6">
                        <img class="img-fluid" src="img/our-bakery/bakery-1.jpg" alt="">
                    </div>
                    <div class="col-md-4 col-6">
                        <img class="img-fluid" src="img/our-bakery/bakery-2.jpg" alt="">
                    </div>
                    <div class="col-md-4 col-6">
                        <img class="img-fluid" src="img/our-bakery/bakery-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

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