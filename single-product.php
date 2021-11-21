<?php
require 'Controller/Pagination.php';
require_once 'Controller/FactoryPattern.php';
$factory = new FactoryPattern();
$product = $factory->make('product');
$sanpham = $product->get3SPNew();
$keyword = '';
?>
<?php include_once("view/header.php"); ?>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="shop.php" method="get">
                        <input type="text" name="keyword" class="searchTerm" placeholder="Search products..."
                            <?php echo $keyword ?>></input>
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class='single-sidebar'>
                    <h2 class='sidebar-title'>Sản phẩm mới nhất</h2>
                    <?php foreach ($sanpham as $key => $value)
                echo "
                    <div class='thubmnail-recent'>
                    <img src='pictures/upload/" . $value['ImageUrl'] . "' class='recent-thumb' style='width:70px;height:70px;'>
                    <h2><a href='single-product.php?id=" . $value['ProductID'] . " '>" . ($sanpham[$key]['ProductName']) . "</a></h2>                
                    <div class='product-sidebar-price'>
                    <h2>" . number_format($sanpham[$key]['Price']) . " VND</h2>
                        </div>
                    </div>"
                ?>x
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                        <li><a href="">Sony Smart TV - 2015</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="">Home</a>
                        <a href="">Category Name</a>
                        <a href="">Sony Smart TV - 2015</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                      if(!isset($_GET['id'])){
                          echo "Vui lòng chọn sản phẩm !";
                      }else foreach ($product->getData() as $key => $value)
                        if($_GET['id']==$product->getData()[$key]['ProductID'])
                      echo"<div class='product-images'>
                          <div class='product-main-img'>
                              <img src='pictures/upload/".$product->getData()[$key]['ImageUrl']."'>
                          </div>
                          
                          <div class='product-gallery'>
                          <img src='pictures/upload/".$product->getData()[$key]['ImageUrl']."'>
                          <img src='pictures/upload/".$product->getData()[$key]['ImageUrl']."'>
                          <img src='pictures/upload/".$product->getData()[$key]['ImageUrl']."'>
                          </div>
                      </div>
                  </div>
                  
                  <div class='col-sm-6'>
                      <div class='product-inner'>
                      <h2>".$product->getData()[$key]['ProductName']."</h2>
                          <div class='product-inner-price'>
                              <span>".number_format($product->getData()[$key]['Price'])." VND</span><br>
                          </div>    
                          
                          <form action='' class='cart'>
                              <div class='quantity'>
                                  <input type='number' size='4' class='input-text qty text' title='Qty' value='1' name='quantity' min='1' step='1'>
                              </div>
                              <button class='add_to_cart_button' type='submit'>Add to cart</button>
                          </form>   
                          
                          <div class='product-inner-category'>
                              <p>Category: <a href=''>Summer</a>. Tags: <a href=''>awesome</a>, <a href=''>best</a>, <a href=''>sale</a>, <a href=''>shoes</a>. </p>
                          </div> 
                          
                          <div role='tabpanel'>
                              <ul class='product-tab' role='tablist'>
                                  <li role='presentation' class='active'><a href='#home' aria-controls='home' role='tab' data-toggle='tab'>Description</a></li>
                                  <li role='presentation'><a href='#profile' aria-controls='profile' role='tab' data-toggle='tab'>Reviews</a></li>
                              </ul>
                              <div class='tab-content'>
                                  <div role='tabpanel' class='tab-pane fade in active' id='home'>
                                      <h2>Product Description</h2>  
                                      <p>".$product->getData()[$key]['Description']."</p>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          ;"?>

                        </div>
                    </div>
                </div>
                <div class="related-products-wrapper">
                    <h2 class="related-products-title">Related Products</h2>
                    <div class="related-products-carousel">
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-1.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>
                                        Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See
                                        details</a>
                                </div>
                            </div>

                            <h2><a href="">Sony Smart TV - 2015</a></h2>

                            <div class="product-carousel-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-2.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>
                                        Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See
                                        details</a>
                                </div>
                            </div>

                            <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                            <div class="product-carousel-price">
                                <ins>$899.00</ins> <del>$999.00</del>
                            </div>
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-3.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>
                                        Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See
                                        details</a>
                                </div>
                            </div>

                            <h2><a href="">Apple new i phone 6</a></h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-4.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>
                                        Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See
                                        details</a>
                                </div>
                            </div>

                            <h2><a href="">Sony playstation microsoft</a></h2>

                            <div class="product-carousel-price">
                                <ins>$200.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-5.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>
                                        Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See
                                        details</a>
                                </div>
                            </div>

                            <h2><a href="">Sony Smart Air Condtion</a></h2>

                            <div class="product-carousel-price">
                                <ins>$1200.00</ins> <del>$1355.00</del>
                            </div>
                        </div>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="img/product-6.jpg" alt="">
                                <div class="product-hover">
                                    <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>
                                        Add to cart</a>
                                    <a href="" class="view-details-link"><i class="fa fa-link"></i> See
                                        details</a>
                                </div>
                            </div>

                            <h2><a href="">Samsung gallaxy note 4</a></h2>

                            <div class="product-carousel-price">
                                <ins>$400.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include_once("view/footer.php");