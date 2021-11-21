<?php
if (!isset($_POST['selectPrice'])) {
    $getData=$product->getAllProducts($page,$perPage);
} else {
    $type=$_POST['selectPrice'];
    if ($type=='all') {
        $getData=$product->getAllProducts($page,$perPage);
    } else {
        $getData=$product->getProductsByPrice($type);
    }
}
?>
<center>
    <br>
    <form method="post" action="shop.php?mod=product&act=allproduct">
        <span>Chọn hình thức hiển thị</span>
        <select name="selectPrice" id="cbbGia">
            <option value="all" selected="selected">--Tất cả sản phẩm--</option>
            <option value="asc">Giá tăng dần</option>
            <option value="des">Giá giảm dần</option>
        </select>
        <button type="submit" name="btnOK" style="font-size: 12px; border-radius: 10px; margin-left: 5px">Ok</button>
    </form>
</center>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php   
                        foreach ($getData as $key => $value) 
                    echo"<div class='col-md-4'>
                    <div class='single-shop-product'>
                        <div class='product-upper'>
                            <img src='pictures/upload/".$getData[$key]['ImageUrl']."'style='width:220px;height:220px;'>
                        </div>
                        <h2><a href='single-product.php?id=".$getData[$key]['ProductID']."'>".($getData[$key]['ProductName'])."</a></h2>
                        <div class='product-carousel-price'>
                        <h2>".number_format($getData[$key]['Price'])." VND</h2>
                        </div>  
                        
                        <div class='product-option-shop'>
                            <a class='add_to_cart_button' data-quantity='1' data-product_sku='' data-product_id='70' rel='nofollow' href='updateOrder.php?id=".$getData[$key]['ProductID']."&action=3'>Add to cart</a>
                        </div>   
                        </div>              
                    </div>";
                    echo $pageLinks;
                    ?>
            </div>
        </div>
    </div>
</div>