<section class="discover_menu_area">
    <div class="discover_menu_inner">
        <div class="container">
            <div class="main_title">
                <h2>Menu Khám phá</h2>
                <h5>Nỗi đau sẽ lên án niềm vui</h5>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discover_item_inner">
                        <?php $products = $HomeModel->getDiscoverDescProducts(); if(!empty($products)) {
                            foreach ($products as $product) {?>
                        <div class="discover_item">
                            <h4><?= $product['name'] ?></h4>
                            <p><?= substr($product['description'], 5 , 77) ?>... <span>$<?= $product['price'] ?></span></p>
                        </div>
                        <?php }
                        }?>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="discover_item_inner">
                    <?php $products = $HomeModel->getDiscoverAscProducts(); if(!empty($products)) {
                            foreach ($products as $product) {?>
                        <div class="discover_item">
                            <h4><?= $product['name'] ?></h4>
                            <p><?= substr($product['description'], 0 , 60) ?>... <span>$<?= $product['price'] ?></span></p>
                        </div>
                        <?php }
                        }?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>