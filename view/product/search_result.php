<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
    <h2 class="section-title">Kết Quả Tìm Kiếm</h2>
        <div class="row">
            <div class="col-md-12">
                <?php
                foreach ($search_result as $key => $value)
                    echo "<div class='col-md-4'>
                    <div class='single-shop-product'>
                        <div class='product-upper'>
                            <img src='pictures/upload/" . $search_result[$key]['ImageUrl'] . "' style='width:220px;height:220px;'>
                        </div>
                        <h2><a href='single-product.php?id=" . $search_result[$key]['ProductID'] . "'>" . ($search_result[$key]['ProductName']) . "</a></h2>
                        <div class='product-carousel-price'>
                        <h2>" . number_format($search_result[$key]['Price']) . " VND</h2>
                        </div>  
                        
                        <div class='product-option-shop'>
                            <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' href='updateOrder.php?id=" . $search_result[$key]['ProductID'] . "&action=3'>Add to cart</a>
                        </div>   
                        </div>              
                    </div>"
                ?>
            </div>
        </div>
    </div>
</div>
