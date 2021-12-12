<?php
include('includes/header.php');
include('includes/navbar.php');
include ("../helpers/format.php");

?>
<?php include '../classes/bill.php'?>
<?php 
    $bill = new bill();
  $fm=new format();
    
 ?>
 <?php 

   if(isset($_POST["test"])){
     $id = $_POST["test"];
     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

     $status = $_POST['status'];
     $updatestt = $bill->update_Status($status,$id);
     if($status == '3'){

      $deleteBill = $bill->deleteBill($id);
     }
    
    
    }

  }
  
     
  

 ?>
 <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cập nhật trạng thái</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
     
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">

                <label> Trạng thái </label>
                <input type="hidden" name="test" id="test"  value="">
                <!-- <input type="text" name="brandName" class="form-control" placeholder="Enter Brand"> -->
                <select class="form-control"  id="status" name="status">
                    
                  
                        <option  selected value="0">Đang Xử Lý</option>
                        <option value="1">Đang Giao Hàng</option>
                        <option value="2">Thành Công</option>
                        <option value="3">Xóa Đơn</option>
                   
                  </select>
                
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Đơn Hàng
            
    </h6>
    
  </div>

  <div class="card-body">
  <form action="" method="post">
  

    <div class="table-responsive">

      
      <?php 
          $level=session::get("level");
          if ($level==1) { ?>
            <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Ngày Đặt </th>
            <th width="15%">Khách Hàng </th>
            <th>Tổng Tiền</th>
            <th>Đia Chỉ</th>
            <th width="15%">Trạng Thái </th>
          </tr>
        </thead>
        <tbody>
            <?php
                    
                    $get_Bill=$bill->get_Bill();
                    if ($get_Bill){
                    while ($result=$get_Bill->fetch_assoc()) {
                    
                    
                    ?>
          <tr>
             
            <td value="idbill" name="idbill" data-name="<?= $result['order_Id'] ?>" ><a href="billdetails.php?idbill=<?php echo $result['order_Id']?>"> <?php echo $result['order_Id'] ?></a></td>
            <td><?php echo $fm->formatDate($result['date']) ?></td>
            <td><?php echo $result['receiver'] ?></td>
            <td>$<?php echo $fm->format_currency($result['totalprice']) ?></td>
            <td><?php echo $result['address'] ?></td>
            
                
            <?php
                  if ($result['status']==0) {
                    echo '<td class="text-danger">Đang Xử Lý</td>';
                  }elseif($result['status']==1){
                   echo '<td class="text-success">Đang Giao Hàng/td>';
                  }elseif($result['status']==2)
                   echo '<td class="text-success">Thành Công</td>';
                  else
                      echo '<td class="text-danger">Hủy Đơn Hàng</td>';
                  ?>
       
                    
               
          </tr>
         <?php
                    }
                    }
                    ?>
        </tbody>
      </table>

       <?php     
          }else{ ?>
<table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Ngày Đặt </th>
            <th width="15%">Khách Hàng </th>
            <th>Tổng Tiền</th>
            <th>Địa Chỉ</th>
            <th width="15%">Trạng Thái </th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
            <?php
                    
                    $get_Bill=$bill->get_Bill();
                    if ($get_Bill){
                    while ($result=$get_Bill->fetch_assoc()) {
                    
                    
                    ?>
          <tr>
             
            <td value="idbill" name="idbill" data-name="<?= $result['order_Id'] ?>" ><a href="billdetails.php?idbill=<?php echo $result['order_Id']?>"> <?php echo $result['order_Id'] ?></a></td>
            <td><?php echo $fm->formatDate($result['date']) ?></td>
            <td><?php echo $result['receiver'] ?></td>
            <td>$<?php echo $fm->format_currency($result['totalprice']) ?></td>
            <td><?php echo $result['address'] ?></td>
            
                
            <?php
                  if ($result['status']==0) {
                    echo '<td class="text-danger">Đang Xử Lý</td>';
                  }elseif($result['status']==1){
                   echo '<td class="text-success">Đang Giao Hàng</td>';
                  }elseif($result['status']==2)
                   echo '<td class="text-success">Thành Công</td>';
                  else
                      echo '<td class="text-danger">Hủy Đơn</td>';
                  ?>
       
                    
               
          
            <td>
                
      
               
                  <input  id="edit" type="button" name="submit" class="btn btn-primary" value="Cập nhật trạng thái" data-toggle="modal" data-target="#addadminprofile">
                 
               
            </td>
          </tr>
         <?php
                    }
                    }
                    ?>
        </tbody>
      </table>
  
      <?php
          }
       ?>         
        
    </div>
  </form>
  </div>
</div>

</div>
<script>
  $(document).ready(function(){
    
    $("#dataTable").on('click','#edit',function(){
      
      var currentRow = $(this).closest("tr");
      var id=currentRow.find("td:eq(0)").text();
      // var status=currentRow.find("td:eq(5)").val(); 
      
      // var show = id;
      // alert(show);
      $("#test").val(id);
      // $("#statuss").val(matp);
    });
 });
  
  
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>