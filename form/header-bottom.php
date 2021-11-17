<div class="header-bottom head-bottom" >
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-md-12" >
                    <div class="navbar-header">
                    
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo">
                            <a href="index.php">
                                <img src="images/logo.png" alt="" style="width: 100px; height: 50px"/>
                                <a href="" class="logo_name">Electronic Store</a>
                            </a> 
                        </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="index.php">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach ($protype->getAllProtype() as $value) { ?>
                                        <li><a href="cate.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Kết nối</a></li>
                            <li><a href="cart.php">Giỏ hàng</a></li>
                            <li><a href="./Login/logout.php">Đăng nhập</a></li>
                        </ul>
                        <div class="search_box pull-right">
                            <form action="result.php" method="get">
                                <input type="text" placeholder="Search" name="key" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->