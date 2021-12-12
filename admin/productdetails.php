<?php
include('includes/header.php');
include('includes/navbar.php');

?>
<?php include '../classes//brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php'?>
<style type="text/css">
.rows {
    display: flex;
    flex-wrap: wrap;
    margin-right: -.100rem;
    margin-left: -.75rem;
}

.scroll {
    height: 400px;
    overflow: scroll;
}

h5 {
    margin-top: 10px;
    margin-left: 80px;
    color: black;
    width: 80%;
    text-align: justify;
}

h3 {
    margin-left: 80px;
    color: red;
    font-weight: bold;
}

#redd {
    color: red;
    font-weight: bold;
}
</style>
<?php
    $prod = new product();
    $cat = new category();

    
    // get name product

    if(!isset($_GET['name']) || $_GET['name']==NULL){
    echo "<script>window.location = 'productlist.php'</script>";

    }else{
    $name = $_GET['name'];

    }

    // xoa product theo size
    


    $product= $prod->Show_ProductByName($name);
      if($product){
        while ($result = $product->fetch_assoc()){
          $namecat = $result['catName'];

        }
    }
    // update product
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updaepro'])){

    $updateProd = $prod->update_product($_POST,$_FILES,$name);
    }
    
    // add size
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addsize'])){

        $quantity = $_POST['quantity'];
        $size = $_POST['size'];
       

        $insert_product = $prod->add_Size_Product($name,$size,$quantity);
    }

    
    
?>


<!-- Begin editproduct -->
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhât Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <?php 
              $get_list= $prod->Show_ProductByName($name);
              if($get_list){
                  while($result_prod = $get_list->fetch_assoc()){
                ?>
                    <div class="form-group">

                        <label> Tên Sản Phẩm </label>
                        <input type="text" name="productName" class="form-control" placeholder="Enter Product"
                            value="<?php echo $result_prod['productName'] ?>">
                    </div>



                    <div class="form-group">

                        <label> Giá </label>
                        <input type="text" name="price" class="form-control" placeholder="Enter price"
                            value="<?php echo $result_prod['price'] ?>">
                    </div>
                    <div class="form-group">

                        <label> Mô Tả </label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description"
                            value="<?php echo $result_prod['description'] ?>">
                    </div>
                    <div class="form-group">

                        <label> Ảnh </label>
                        <img src="uploads/<?php echo $result_prod['image']?>" width="80" ?>
                        <input type="file" name="image" class="form-control" v>
                    </div>

                    <?php 
            }
          }
         ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" name="updaepro" class="btn btn-primary">Lưu</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- End editproduct -->
<!-- Begin addsize -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Loại Sản Phẩm</label>
                            <select id="size" name="size" class="form-control action">

                                <option>Chọn Size</option>
                                <?php
                                
                                $catlist = $cat->getSizebyCat($namecat);
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()) {
                                        
                            ?>
                                <option><?php echo $result['catSize'] ?></option>

                                <?php 

                                }
                            }
                            ?>

                            </select>
                        </div>



                        <div class="form-group">

                            <label> Số Lượng </label>
                            <input type="text" id="quantity" name="quantity" class="form-control"
                                placeholder="Enter quantity">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="addsize" class="btn btn-primary">Lưu</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End addsize -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Danh Sách Sản Phẩm
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editproduct">
                        Cập Nhật Sản Phẩm
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsize">
                        Thêm Size
                    </button>
                </h3>
            </div>

            <?php 
          
                
          $get_list= $prod->Show_ProductByName($name);
          if($get_list){
              while($result_prod = $get_list->fetch_assoc()){
                ?>
            <div class="card-body">



                <form action="" method="POST">

                    <div class="rows">

                        <div class="col-4">
                            <img src="uploads/<?php echo $result_prod['image']?>" width="400px">
                        </div>
                        <div class=" col-8">
                            <h3 class="m-0 font-weight-bold text-primary"><?php echo $result_prod['productName'] ?></h3>

                            <h5><?php echo $result_prod['description'] ?></h5>

                            <h5 id="redd">Thương hiệu: <?php echo $result_prod['brandName'] ?></h5>

                            <h5 id="redd">Danh mục: <?php echo $result_prod['catName'] ?></h5>


                            <h3>Giá: $<?php echo $result_prod['price'] ?></h3>

                        </div>
                    </div>
                    <form action="" method="post">

                        <div class="scroll">

                            <table class="table table-bordered" id="editable_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Size </th>
                                        <th> Số Lượng </th>

                                        <th> Chỉnh Sửa </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                
                                $Sizelist = $prod->getSize_1Product($name);
                                if($Sizelist){
                                    while ($result = $Sizelist->fetch_assoc()) {        
                            ?>
                                    <tr>
                                        <td> <?php echo $result['productId']?> </td>
                                        <td> <?php echo $result['size']?></td>
                                        <td id="quantity" name="quantity">
                                            <?php echo $result['quantity']?>
                                        </td>

                                        <td>
                                            <a href="updatequan.php?porid=<?php echo $result['productId']?>"
                                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cập Nhật</a>
                                        </td>
                                    </tr>
                                    <?php  
                                }
                            }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </form>

            </div>
            <?php  
                                }
                            }
                            ?>

        </div>
    </div>
</form>


<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>