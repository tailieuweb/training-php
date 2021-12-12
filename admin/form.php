<?php
if (isset($_GET['value'])) {
    $value = $_GET['value'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php require "./form/head.php"; ?>
    <?php
    $perPage = 2;     //số lượng sản phẩm hiển thị trên 1 trang  
    $total = count($product->getAllProducts());     // Tính tổng số dòng
    ?>

    <body>
        <?php require "./form/header_part.php"; ?>
        <?php require "./form/topHeaderMenu.php"; ?>
        <?php require "./form/startTopSerch.php"; ?>
        <?php require "./form/sidebarMenu.php"; ?>
        <?php require "add.php"; ?>
        <!-- BEGIN CONTENT -->
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb" style="padding: 1px;background: #cbcbcb;"> <a href="#" title="Go to Home" class="tip-bottom current" style="font-size: 17px;"><i class="icon-home"></i>
                        Home</a></div>
                <h1>Thêm mới</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                <?php if ($value == "product") { ?>
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Sản Phẩm</h5>
                                    </div>
                                    <!-- BEGIN USER FORM -->
                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!-- Tên sp -->
                                        <div class="control-group">
                                            
                                            <label class="control-label">Tên:</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="Tên sản phẩm" name="name" required/> *
                                            </div>
                                        </div>
                                        <!-- Chọn hãng -->
                                        <div class="control-group">
                                            <label class="control-label">Chọn hãng:</label>
                                            <div class="controls">
                                                <select name="manu_id" id="subcate">
                                                    <?php foreach ($manufacture->getAllManufactures() as $value) {
                                                        //kiem tra trung ?>
                                                        <option value="<?= $value['manu_id'] ?>"><?= $value['manu_name'] ?></option>
                                                    <?php } ?>
                                                </select> *
                                            </div>
                                        </div>
                                        <!-- Chọn loại SP -->
                                        <div class="control-group">

                                            <label class="control-label">Chọn loại sản phẩm:</label>
                                            <div class="controls">
                                                <select name="type_id" id="subcate">
                                                    <?php foreach ($protype->getAllProtype() as $value) { ?>
                                                        <option value="<?= $value['type_id'] ?>"><?= $value['type_name'] ?></option>
                                                    <?php } ?>
                                                </select> *
                                            </div>
                                            <!-- Chọn hình SP -->
                                            <div class="control-group">
                                                <label class="control-label">Chọn hình:</label>
                                                <div class="controls">
                                                    <input type="file" name="fileUpload" id="fileUpload" required>
                                                </div>
                                            </div>
                                            <!-- Chi tiết sản phẩm -->
                                            <div class="control-group">
                                                <label class="control-label">Chi tiết</label>
                                                <div class="controls">
                                                    <textarea class="span11" placeholder="Chi tiết sản phẩm" name="description" required></textarea>
                                                </div>
                                                <!-- Giá SP -->
                                                <div class="control-group">
                                                    <label class="control-label">Giá :</label>
                                                    <div class="controls">
                                                        <input type="text" class="span11" placeholder="Giá" name="price" required/> *
                                                    </div>
                                                </div>
                                                <!-- SP Nổi bật -->
                                                <div class="control-group">
                                                    <label class="control-label">Nổi bật:</label>
                                                    <div class="controls">
                                                        <input type="number" class="span11" name="feature" min="0" max="1" required/> *
                                                    </div>
                                                </div>
                                                <!-- Nút thêm -->
                                                <div class="form-actions">
                                                    <button type="submit" name="addProduct" class="btn btn-success">Thêm</button>
                                                </div>
                                            </div>
                                    </form>
                                    <!-- END USER FORM -->
                                <?php } else if ($value == "manufacture") { ?>
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Hãng</h5>
                                    </div>
                                    <!-- BEGIN USER FORM -->
                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label">Tên hãng :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="Tên hãng" name="name" required /> *
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" name="addManufacture" class="btn btn-success">Thêm</button>
                                        </div>
                                    </form>
                                    <!-- END USER FORM -->
                                <?php } else if ($value == "protype") { ?>
                                    <!-- BEGIN USER FORM -->
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Loại sản phẩm</h5>
                                    </div>
                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label">Tên loại sản phẩm :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="Tên loại sản phẩm" name="typename" required /> *
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" name="addProtype" class="btn btn-success">Thêm</button>
                                        </div>
                                    </form>
                                <?php } else if ($value == "user") { ?>
                                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                        <h5>Users</h5>
                                    </div>
                                    <!-- BEGIN USER FORM -->
                                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label">Username:</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="Username" name="name" required /> *
                                            </div>
                                            <label class="control-label">Password:</label>
                                            <div class="controls">
                                                <input type="password" class="span11" placeholder="password" name="password" required /> *
                                            </div>
                                            <label class="control-label">Role:</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="role" name="role" required /> *
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" name="addUser" class="btn btn-success">Thêm</button>
                                        </div>
                                    </form>
                                    <!-- END USER FORM -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- END CONTENT -->
        <?php require "./form/footer_part.php"; ?>
        <?php require "./form/script.php"; ?>
    </body>

    </html>
<?php } else {
    header("location:index.php");
} ?>