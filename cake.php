<?php
	session_start();
	require_once 'models/FactoryPattent.php';
	$factory = new FactoryPattent();
	$HomeModel = $factory->make('home');
	$products = $HomeModel->getProductHosts();
?>
<!DOCTYPE html>
<html lang="vi">
    
<head>
       <?php include('views/head.php') ?>
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<?php include_once("views/header.php");?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Bánh của chúng tôi</h3>
        			<ul>
        				<li><a href="index.php">Nhà</a></li>
        				<li><a href="cakes.html">Dịch vụ</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Bánh của chúng tôi</h2>
        			<h5>Nhưng để bạn có thể hiểu rằng mọi lỗi lầm bẩm sinh đều là niềm vui khi buộc tội và ca ngợi nỗi đau, tôi sẽ mở ra toàn bộ vấn đề, và sẽ giải thích chính những điều đã được nói bởi người phát minh ra sự thật và như nó là kiến ​​trúc sư của cuộc sống may mắn.</h5>
        		</div>
        		<div class="cake_feature_row row">
					<?php 
						if(!empty($products)) { 
						foreach ($products as $product) {
							
					?>
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="<?= $product['pro_image']?>" alt="<?= $product['name']?>">
							</div>
							<div class="cake_text">
								<h4>$<?= $product['price']?></h4>
								<h3><?= $product['name']?></h3>
								<a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>" onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
							</div>
						</div>
					</div>
					<?php } } ?>
				</div>
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
    </body>

</html>