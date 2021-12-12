<?php
ob_start();
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/brand.php'?>

<?php 
  $brand = new brand();
  if(isset($_POST["delete_id"])){
    $id = $_POST["delete_id"];
        $delbrand = $brand->delete_Brand($id);
  }

 ?>
<?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addbrand'])){

        $brandName = $_POST['brandNameAdd']; 
        $insertName = $brand->insert_Brand($brandName);
    }
       ?>

<?php 

   if(isset($_POST["test"])){
     $id = $_POST["test"];
     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editbrand'])){

     
      $brandName = $_POST['brandNameEdit'];
       

        $updateBrand = $brand->update_brand($brandName,$id);
    
    }

  }
  
     
  

 ?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Thương Hiệu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
     
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">

                <label> Tên Thương Hiệu </label>

                <input type="text" name="brandNameAdd" class="form-control" placeholder="Enter Brand">
                
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" name="addbrand" class="btn btn-primary">Lưu</button>
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
    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thương Hiệu 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Thêm Thương Hiệu
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
            <th> Tên Thương Hiệu </th>
           
            <th>Chỉnh Sửa </th>
            <th>Xóa Thương Hiệu </th>
          </tr>
        </thead>
        <tbody>
          <?php
           
            $show = $brand->show_brand();
            if($show){
             
              while($result = $show->fetch_assoc()){
                ;
            
          ?>
          <tr>
            <td> <?php echo $result['brandId']; ?> </td>
            <td> <?php echo $result['brandName']; ?></td>
            
            <td>
                <form action="" method="post ">
                    <input type="hidden" name="edit_id" value="<?php echo $result['brandId']?>">
                    <a href="editbrand.php?brandid=<?php echo $result['brandId']?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Chỉnh Sửa</a>
                  
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $result['brandId']?>">
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
<script>
  $(document).ready(function(){
    
    $("#dataTable").on('click','#edit_btn',function(){
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").text();
      $("#test").val(id);
      
    });
 });
  
  
</script>

<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
ob_end_flush();
?>