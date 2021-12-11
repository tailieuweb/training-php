<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/admin.php'?>
<?php 
    $admin = new admin();
    if(!isset($_GET['username']) || $_GET['username']==NULL){
        echo "<script>window.location = 'login.php'</script>";
        
    }else{
        $user = $_GET['username'];
    }
     if(isset($_POST["save"])){

         $update_admin = $admin->update_admin($_POST,$user);
     }
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thông Tin Admin
            
    </h6>
  </div>

  <div class="card-body">
                <?php 
                    $adminn= $admin->get_Info($user);
                    if($adminn){
                        while($result = $adminn->fetch_assoc()){
                ?> 
    <form action="" method="POST">

       

            <div class="form-group">
                <label> Tên Người Dùng </label>
                <input type="text" name="username" class="form-control" value="<?php echo $result['admin_User'] ?>">
            </div>
             <div class="form-group">
                <label>Tên Admin</label>
                <input type="name" name="name" class="form-control" value="<?php echo $result['admin_Name'] ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $result['admin_Email'] ?>">
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" name="changepassword" class="form-control" placeholder="Enter New Password">
            </div>
            
        
       <?php if (isset($update_admin)) {
                echo $update_admin;
       } ?>
        <div class="modal-footer">
            <button onclick="location.href='listadmin.php'" type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" name="save" class="btn btn-primary">Lưu</button>
        </div>
      </form>
       <?php 
                }
            }
                ?>  
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>