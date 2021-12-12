<?php
ob_start();
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/cart.php'?>
<?php include '../classes/bill.php'?>


<?php 
  $cart = new cart();
  $bill = new bill();
  if(isset($_POST["delete_id"])){
    $id = $_POST["delete_id"];
        $delbrand = $cart->delete_Discount($id);
  }

 ?>
<?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerbtn'])){

        $code = $_POST['code']; 
        $discount = $_POST['discount']; 
        $insertName = $cart->insert_Discount($code,$discount);
    }
       ?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Mã Giảm Giá</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
     
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">

                <label> Mã Giảm Giá </label>
                <input type="text" name="code" class="form-control" placeholder="Enter Coupon code">

            </div>
            <div class="form-group">

                <label> Chiết Khấu </label>
                <input type="text" name="discount" class="form-control"  placeholder="Enter Discount">
                
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
    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Khuyến Mãi 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Thêm Chương Trình
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
            <th> Mã Giảm Giá</th>
            <th> Chiết Khấu</th>
            <th> Thao Tác </th>
            
          </tr>
        </thead>
        <tbody>
          <?php
           
            $show = $bill->show_Discount();
            if($show){
              $i = 0;
              while($result = $show->fetch_assoc()){
                $i++;
            
          ?>
          <tr>
            <td> <?php echo $i; ?> </td>
            <td> <?php echo $result['code']; ?></td>
             <td> <?php echo $result['discount']; ?>%</td>
            
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $result['id_discount']?>">
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
ob_end_flush();
?>