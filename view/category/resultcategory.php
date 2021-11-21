<?php

use SmartWeb\DBMYSQL;
use SmartWeb\Phone;
use SmartWeb\Category;

$cate = Category::getInstance();
$pro = Phone::getInstance();
$id = $_GET['id'];

$result1 = $pro->getProductsByCateID($id);
$cateName = $cate->getCateName($id);
?>
<center>
    <h2 style=" background-color: #5a88ca;color:#fff;padding: 10px; font-size: 40px;">
        <?php foreach ($cateName as $ctname) {
            echo $ctname['CategoryName'];
        } ?></h2>
</center>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (count($result1) < 1) {
                    echo "<center><h2>Không có sản phẩm nào</h2></center>";
                }
                foreach ($result1 as $key => $value)
                    echo "<div class='col-md-4'>
                    <div class='single-shop-product'>
                        <div class='product-upper'>
                            <img src='pictures/upload/" . $result1[$key]['ImageUrl'] . "' style='width:220px;height:220px;'>
                        </div>
                        <h2><a href='single-product.php?id=" . $result1[$key]['ProductID'] . "'>" . ($result1[$key]['ProductName']) . "</a></h2>
                        <div class='product-carousel-price'>
                        <h2>" . number_format($result1[$key]['Price']) . " VND</h2>
                        </div>  
                        
                        <div class='product-option-shop'>
                            <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' href='updateOrder.php?id=" . $result1[$key]['ProductID'] . "&action=3'>Add to cart</a>
                        </div>   
                        </div>              
                    </div>";
                ?>
            </div>
        </div>
    </div>
</div>