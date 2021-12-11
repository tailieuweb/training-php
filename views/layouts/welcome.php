<section class="welcome_bakery_area">
    <div class="container">
        <div class="welcome_bakery_inner p_100">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Chào mừng đến với tiệm bánh của chúng tôi</h2>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur uis autem vel eum.</p>
                    </div>
                    <div class="welcome_left_text">
                        <p>Cũng không có ai yêu hoặc theo đuổi hoặc mong muốn có được nỗi đau của chính mình, bởi vì đó
                            là nỗi đau, nhưng bởi vì đôi khi xảy ra những hoàn cảnh mà sự vất vả và đau đớn có thể mang
                            lại cho anh ta một số niềm vui lớn. Để lấy một ví dụ tầm thường, ai trong chúng ta cũng từng
                            tập thể dục vất vả.</p>
                        <a class="pink_btn" href="contact.php">Biết thêm về chúng tôi</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="welcome_img">
                        <img class="img-fluid" src="public/img/cake-feature/welcome-right.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Bánh đặc trưng của chúng tôi</h2>
                <h5> Đây là những sản phẩm đặt trưng nhất của chúng tôi.</h5>
            </div>
            <div class="cake_feature_slider owl-carousel">
                <?php $products = $HomeModel->getProductFeature();
                    foreach ($products as $product) {?>
                <div class="item">
                    <div class="cake_feature_item">
                        <div class="cake_img" style="max-height: 150px;">
                            <img src="<?= $product['pro_image']?>" alt="<?= $product['name']?>">
                        </div>
                        <div class="cake_text">
                            <h4>$<?= $product['price']?></h4>
                            <h3><?= $product['name']?></h3>
                            <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>" onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>