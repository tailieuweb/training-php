   <?php
    
    include 'inc/header.php';

?>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Thương hiệu</span>
                        </div>
                         <?php
                             $show = $brand->show_brand();
                        if($show){
                           
                            while($result = $show->fetch_assoc()){
                               
                        
                    ?>
                        <ul>

                            <li><a href="product.php?brandid=<?php echo $result['brandId'] ?>,&brandName=<?php echo $result['brandName'] ?>"><?php echo $result['brandName']; ?></a></li>
                            
                        </ul>
                        <?php
                    }
                        }
                        ?> 
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <?php 

                            
                            
                      

                             ?>
                            <form action="product.php" method="GET">
                                <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> -->

                                <input type="text" name="namepro" placeholder="What do yo u need?">
                                <button type="" class="site-btn">SEARCH</button>

                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 11.188.888</h5>
                                <span>Hổ trợ 24/7 </span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/banner/banner.jpg">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                $get_ProductbyType = $pro->Get_ProductFeathered();
                if($get_ProductbyType){
                    while($result =$get_ProductbyType->fetch_assoc()){


                
             ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="admin/uploads/<?php echo $result['image']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?php echo $result['productName'] ?></a></h6>
                            <h5>$<?php echo $result['price'] ?> </h5>
                        </div>
                    </div>
                </div>
                <?php  
                }
            }
                ?>
                
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                $get_ProductbyType = $pro->get_ProductNew();
                if($get_ProductbyType){
                    while($result =$get_ProductbyType->fetch_assoc()){


                
             ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="admin/uploads/<?php echo $result['image']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?php echo $result['productName'] ?></a></h6>
                            <h5>$<?php echo $result['price'] ?> </h5>
                        </div>
                    </div>
                </div>
                <?php  
                }
            }
                ?>
                
            </div>
        </div>
    </section>
   
   
<?php
    
    include 'inc/footer.php';
    

?>
