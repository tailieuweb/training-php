<?php 
    include 'inc/header.php';

?>

     <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Thương hiệu</span>
                    </div>
                    <ul>
                             <?php
                        $show = $brand->show_brand();
                        if($show){
                           
                            while($result = $show->fetch_assoc()){
                         ?>      
                        <li><a href="product.php?brandid=<?php echo $result['brandId'] ?>,&brandName=<?php echo $result['brandName'] ?>"><?php echo $result['brandName'] ?></a></li>
                        <?php 
                            }
                        }
                         ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
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
            </div>
        </div>
    </div>
</section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>BUG SHOP</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                          
                        <span>Tất cả sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Thương hiệu</h4>
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
                        <div class="sidebar__item">
                            <h4>Giá</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                   
                        <div class="section-title product__discount__title">
                                   <?php  
                            
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                             $name=$_POST['search'];
                             echo "<h2>Search By '$name'</h2>";
                            
                        }elseif($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['namepro'])) {
                            $name=$_GET['namepro'];
                           echo "<h2>Search By '$name'</h2>";
                        }elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['brandid'])) {
                            $brandname=$_GET['brandName'];
                           echo "<h2>$brandname's Product </h2>";
                        } else{
                           echo'<h2>TẤT CẢ SẢN PHẨM</h2>';
                        
                        }
                       
                        
                        

                        
                        ?>
                            
                            <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp xếp theo</span>
                                    <select>
                                        <option value="0">Tăng dần</option>
                                        <option value="0">Giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <?php  
                            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['namepro'])) {
                                 $searchget=" A.productName LIKE  '%".$_GET['namepro']."%' AND";
                             }else{
                                $searchget="";
                             }
                        
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                             $searchpost=" A.productName LIKE  '%".$_POST['search']."%' AND";
                             
                            
                        }else{
                           $searchpost='';
                        }

                        
                            
                        
                 ?>
                        

             <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['brandid'])) {
                    $id=$_GET['brandid'];
                    $getProByBrand=$pro->Show_ProductByBrand($id);
                    if($getProByBrand){
                            while ($result = $getProByBrand->fetch_assoc()) {

                        
               ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin/uploads/<?php echo $result['image']?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="details.php?proname=<?php echo $result['productName'] ?>"><?php echo $result['productName'] ?></a></h6>
                                    <h5>$<?php echo  $fm->format_currency($result['price']) ?></h5>
                                </div>
                            </div>
                        </div>
            <?php 
                }
            }
             ?>            
                                 
            <?php
                }else{
                    $prodList = $pro->Show_Product($searchpost,$searchget);
                        if($prodList){
                        
                            while ($result = $prodList->fetch_assoc()) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin/uploads/<?php echo $result['image']?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="details.php?proname=<?php echo $result['productName'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="details.php?proname=<?php echo $result['productName'] ?>"><?php echo $result['productName'] ?></a></h6>
                                    <h5>$<?php echo   $fm->format_currency($result['price']) ?></h5>
                                </div>
                            </div>
                        </div>

            <?php 
                    }   
                }
            }
              ?>
                    </div>
                        </div>
                        
                  
                    
                    <center>
                        
                        <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
<?php
    
    include 'inc/footer.php';
    

?>