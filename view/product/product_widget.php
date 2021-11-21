<div class="product-widget-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Điện Thoại</h2>
                    <a href="index.php?mod=category&act=resultcategory&id=3" class="wid-view-more">View All</a>
                    <?php 
                    $DienThoai = $product->getDienThoai();
                    foreach($DienThoai as $key => $value)
                    {
                    ?>
                    <div class="single-wid-product">
                        <a href="single-product.php?id=<?php echo $DienThoai[$key]['ProductID'] ?>"><img src="pictures/upload/<?php echo $DienThoai[$key]['ImageUrl'] ?>" alt=""
                                                           class="product-thumb"></a>
                        <h2><a href="single-product.php?id=<?php echo $DienThoai[$key]['ProductID'] ?>"><?php echo $DienThoai[$key]['ProductName'] ?></a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                        <?php echo $DienThoai[$key]['Price'] ?>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">LapTop</h2>
                    <a href="index.php?mod=category&act=resultcategory&id=6" class="wid-view-more">View All</a>
                    <?php 
                    $Laptop = $product->getLaptop();
                    foreach($Laptop as $key => $value)
                    {
                    ?>
                    <div class="single-wid-product">
                        <a href="single-product.php?id=<?php echo $Laptop[$key]['ProductID'] ?>"><img src="pictures/upload/<?php echo $Laptop[$key]['ImageUrl'] ?>" alt=""
                                                           class="product-thumb"></a>
                        <h2><a href="single-product.php?id=<?php echo $Laptop[$key]['ProductID'] ?>"><?php echo $Laptop[$key]['ProductName'] ?></a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                        <?php echo $Laptop[$key]['Price'] ?>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>  
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">USB</h2>
                    <a href="index.php?mod=category&act=resultcategory&id=2" class="wid-view-more">View All</a>
                    <?php 
                    $Usb = $product->getUsb();
                    foreach($Usb as $key => $value)
                    {
                    ?>
                    <div class="single-wid-product">
                        <a href="single-product.php?id=<?php echo $Usb[$key]['ProductID'] ?>"><img src="pictures/upload/<?php echo $Usb[$key]['ImageUrl'] ?>" alt=""
                                                           class="product-thumb"></a>
                        <h2><a href="single-product.php?id=<?php echo $Usb[$key]['ProductID'] ?>"><?php echo $Usb[$key]['ProductName'] ?></a></h2>
                        <div class="product-wid-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-wid-price">
                        <?php echo $Usb[$key]['Price'] ?>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->
