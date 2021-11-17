<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/category.php'?>

<?php 
  $cat = new category();

  if(isset($_POST["delete_id"])){
    $id = $_POST["delete_id"];
        $delbrand = $cat->delete_Category($id);
  }

 ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $catName = $_POST['catName'];
        $catSize = $_POST['catSize'];
       

        $insertCat = $cat->insert_category($catName,$catSize);
    }
       ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
     
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">

                <label> Tên Danh Mục </label>
                <input type="text" name="catName" class="form-control" placeholder="Enter Category name">
            </div>
            <div class="form-group">
              <label >Size</label>
                <input type="text" name="catSize" class="form-control" placeholder="Enter Size">
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
        </div>
      </form>

    </div>
  </div>
</div>


 
<!-- /.container-fluid -->






<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh Mục Sản Phẩm 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Thêm Danh Mục
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

     <form action="" method="POST">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Tên Danh Mục </th>
           
          
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $show = $cat->show_category();
            if($show){
              $i = 0;
              while($result = $show->fetch_assoc()){
                $i++;
            
          ?>
          <tr>
            <td> <?php echo $i; ?> </td>
            <td> <?php echo $result['catName']; ?></td>
            

            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $result['catName']?>">
                  <button  type="submit" name="delete_btn" class="btn btn-danger">Xóa</button>
                </form>
            </td>
          </tr>
        <?php
          }
            }
            ?>  
        </tbody>
      </table>
       </form>

    </div>
  </div>
</div>

</div>


<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>