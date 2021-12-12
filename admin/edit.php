<?php 
require "./form/head.php";
    $id = "";
    $edit = "";
    if(isset($_GET['idProduct']) && $_GET['edit']){
        $id = $_GET['idProduct'];
        $edit = $_GET['edit'];
        
    }
?>
<?php require "./form/header_part.php"; ?>
<?php require "./form/topHeaderMenu.php"; ?>
<?php require "./form/startTopSerch.php"; ?>
<?php require "./form/sidebarMenu.php"; ?>
<?php require "processEdit.php"; ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h1>Sửa</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <?php if($edit == "product"){ 
                                    foreach($product->getProductID($id) as $array){
                                ?>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Sản phẩm</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Tên :</label>
                                <div class="controls">
                                    <input type="hidden" value="<?= $array['ID'] ?> " name="id">
                                    <input type="text" value="<?= $array['name'] ?>" class="span11"
                                        placeholder="Product name" name="name" required /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Chọn hãng:</label>
                                <div class="controls">
                                    <select name="manu_id" id="subcate">
                                        <?php
                                             foreach ($manufacture->getAllManufactures() as $value) { 
                                                    if($array['manu_name'] == $value['manu_name']){
                                                ?>
                                        <option selected value="<?= $value['manu_id'] ?>"><?= $value['manu_name'] ?>
                                        </option>

                                        <?php  }else{?>
                                        <option value="<?= $value['manu_id'] ?>"><?= $value['manu_name'] ?></option>
                                        <?php }} ?>
                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Chọn loại sản phẩm:</label>
                                <div class="controls">
                                    <select name="type_id" id="subcate">
                                        <?php foreach ($protype->getAllProtype() as $value) {
                                                    if($value['type_name'] == $array['type_name']){
                                                ?>
                                        <option selected value="<?= $value['type_id'] ?>"><?= $value['type_name'] ?>
                                        </option>
                                        <?php }else{?>
                                        <option value="<?= $value['type_id'] ?>"><?= $value['type_name'] ?></option>
                                        <?php }} ?>
                                    </select> *
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Chọn hình:</label>
                                    <div class="controls">
                                        <input type="file" name="fileUpload" id="fileUpload">
                                        <img style="width:100px;height:100px"
                                            src="<?= "../images/".$array['pro_image'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Chi tiết</label>
                                    <div class="controls">
                                        <textarea class="span11" required placeholder="Description"
                                            name="description"><?= $array['description'] ?></textarea>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Giá:</label>
                                        <div class="controls">
                                            <input type="number" value="<?= $array['price'] ?>" class="span11"
                                                placeholder="price" name="price" required /> *
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nổi bật:</label>
                                        <div class="controls">
                                            <input type="number" value="<?= $array['feature'] ?>" class="span11"
                                                name="feature" min="0" max="1" required /> *
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="submitEditProduct" class="btn btn-success">Cập
                                            nhật</button>
                                    </div>
                                </div>
                        </form><?php }}?>
                        <!-- Edit manu !-->
                        <?php if(isset($_GET['idManu']) && isset($_GET['editManu'])){ 
                                 $id = $_GET['idManu'];
                                        foreach($manufacture->getManuID($id) as $value){
                                 ?>
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Loại sản phẩm</h5>
                            </div>
                            <form action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                                <div class="control-group">
                                    <label class="control-label">Name:</label>
                                    <div class="controls">
                                        <input type="hidden" value="<?= $value['manu_id'] ?> " name="id">
                                        <input type="text" value="<?= $value['manu_name'] ?>" class="span11"
                                            placeholder="Manu name" name="name" required /> *
                                        <input type="submit" name="editManu" value="Edit" class="btn btn-success ">
                                    </div>
                                </div>
                            </form><?php }}?>
                        </div>
                        <?php
                                if(isset($_GET['editProtype']) && isset($_GET['idProtype'])){
                                    $id = $_GET['idProtype'];
                                    foreach($protype->getProtypeID($id) as $value){
                                ?>
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Loại sản phẩm</h5>
                            </div>
                            <form action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                                <div class="control-group">
                                    <label class="control-label">Name:</label>
                                    <div class="controls">
                                        <input type="hidden" value="<?= $value['type_id'] ?> " name="id">
                                        <input type="text" value="<?= $value['type_name'] ?>" class="span11"
                                            placeholder="Protype name" name="name" required /> *
                                        <input type="submit" name="editProtype" value="Edit" class="btn btn-success ">
                                    </div>
                                </div>
                            </form><?php }}?>
                        </div>
                        <?php
                             if(isset($_GET['editUser']) && isset($_GET['idUser'])){
                                $id = $_GET['idUser'];                                  
                                    foreach($user->getUserID($id) as $value);{
                            ?>
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>User</h5>
                            </div>
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">Username:</label>
                                    <div class="controls">
                                        <input type="hidden" value="<?= $value['user_id'] ?> " name="id">
                                        <input type="text" class="span11" placeholder="Username" name="name"
                                            value="<?= $value['name'] ?>" required /> *
                                    </div>
                                    <label class="control-label">Password:</label>
                                    <div class="controls">
                                        <input type="password" class="span11" placeholder="password" name="password"
                                            value="<?= $value['password'] ?>" required /> *
                                    </div>
                                    <label class="control-label">Role:</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="role" name="role"
                                            value="<?= $value['role'] ?>" required /> *
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" name="editUser" class="btn btn-success">Cập nhật</button>
                                </div>
                            </form><?php }}?>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <div class="active">

                                    </div>
                                </ul>
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