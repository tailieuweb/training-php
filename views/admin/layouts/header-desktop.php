<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="../index.php">
                    <img src="../public/backend/images/icon/logo-white.png" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="admin.php">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="bot-line"></span>
                        </a>

                    </li>

                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>Pages</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="products/index.php">Products</a>
                            </li>
                            <li>
                                <a href="whishlist/index.php">WhishList</a>
                            </li>
                            <li>
                                <a href="Manufacture/">Manufactures</a>
                            </li>
                            <li>
                                <a href="../admin/protype">Protype</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="../admin/oders/index.php">
                            <i class="fas fa-desktop"></i>
                            <span class="bot-line"></span>Orders</a>

                    </li>
                    <li class="has-sub">
                        <a href="../admin/zipcode/index.php">
                            <i class="fas fa-desktop"></i>
                            <span class="bot-line"></span>ZipCode</a>

                    </li>
                </ul>
            </div>
            <div class="header__tool">

                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="../public/backend/images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>
                        <?php 
                            if (isset($_SESSION['lgUserID'])) {
                                ?>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?= $_SESSION['lgUserName'] ?></a>
                        </div>
                        <?php
                            } ?>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="../public/backend/images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
                                <?php 
                                    if(isset($_SESSION['lgUserID'])) { 
                                    
                                ?>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="../profile.php"><?= $_SESSION['lgUserName'] ?></a>
                                    </h5>
                                    <span class="email">ngoctam2303001@gmail.com</span>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="account-dropdown__body">
                                <?php
                            if (!empty($_SESSION["lgUserID"])) {
                                $chuoi1 = <<<EOD
                                <div class="account-dropdown__item">
                                    <a href="../profile.php">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="../logout.php">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                 </div>
                                EOD;
                                echo $chuoi1;
                            } 

                            ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>