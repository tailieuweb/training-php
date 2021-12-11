<?php
    require_once "../models/ChartOrderModel.php";
    $Chart = new ChartOrderModel();

?>
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number"><?= count($Chart->countProducts()) ?></h2>
                    <span class="desc">Products</span>
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number"><?=  count($Chart->countManufactures()) ?></h2>
                    <span class="desc">Manufactures</span>
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number"><?=  count($Chart->countOrders()) ?></h2>
                    <span class="desc">Orders</span>
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <?php
                        $sum = 0;
                        $total = $Chart->sumTotal();
                        foreach ($total as $key) {
                            $sum += $key['sum'];
                        }
                      
                    ?>
                    <h2 class="number">$<?= $sum ?></h2>
                    <span class="desc">Total revenue</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>