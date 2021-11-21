<?php

use SmartWeb\DBMYSQL;
use SmartWeb\Manufacture;
use SmartWeb\Phone;

include_once("model/manufacture.php");
include_once("model/phone.php");
$cate = Manufacture::getInstance(new DBMYSQL);
$pro = Phone::getInstance(new DBMYSQL);
$id = $_GET['id'];

$result2 = $pro->getProductsByManuID($id);
$manuName = $cate->getManuName($id);
?>
<center>
    <h2 style=" background-color: #5a88ca;color:#fff;padding: 10px; font-size: 40px;"><?php foreach ($manuName as $mnname) {
                                                                                            echo $mnname['ManufacturerName'];
                                                                                        } ?></h2>
</center>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (count($result2) < 1) {
                    echo "<center><h2>Không có sản phẩm nào</h2></center>";
                } else foreach ($result2 as $key => $value)
                    echo "<div class='col-md-4'>
                    <div class='single-shop-product'>
                        <div class='product-upper'>
                            <img src='pictures/upload/" . $result2[$key]['ImageUrl'] . "' style='width:220px;height:220px;'>
                        </div>
                        <h2><a href='single-product.php?id=" . $result2[$key]['ProductID'] . "'>" . ($result2[$key]['ProductName']) . "</a></h2>
                        <div class='product-carousel-price'>
                        <h2>" . number_format($result2[$key]['Price']) . " VND</h2>
                        </div>  
                        
                        <div class='product-option-shop'>
                            <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' href='updateOrder.php?id=" . $result2[$key]['ProductID'] . "&action=3'>Add to cart</a>
                        </div>   
                        </div>              
                    </div>";
                ?>
            </div>
        </div>
    </div>
</div>