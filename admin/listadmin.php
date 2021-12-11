<?php
ob_start();
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/admin.php'?>
<?php 
  $admin = new admin();
  $check = Session::get('level');
  //Add admin
  if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['registerbtn'])  ){
        $insertadmin = $admin->insert_Admin($_POST);
    }
    //Delete_admin
    if(isset($_POST["delete_id"])){
    $id = $_POST["delete_id"];
        $deladmin = $admin->delete_Admin($id);
  }
   if(isset($_POST["edit_user"])){
    $id = $_POST["edit_user"];
        $deladmin = $admin->reset_Password($id);
  }

 ?>
<?php 
  $check= session::get('level');
  if($check == '1'){
    header('Location:index.php');
  }

 ?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">
            <input type="hidden" name="delete_id" value="">
            <div class="form-group">
                <label> Tên Người Dùng </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
             <div class="form-group">
                <label>Tên Admin</label>
                <input type="name" name="name" class="form-control" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Xác Nhận Mật Khẩu</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
              <label >Chức Vụ</label>
                <select name="level" class="form-control">
                  <option value= "0">Admin</option>
                  <option value= "1">Nhân viên</option>
                </select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

















<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Admin
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Thêm Admin
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>Level</th>
            <th>Reset Password </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
           <?php
           $brand = new admin();
            $show = $brand->show_ListAdmin();
            if($show){
              $i = 0;
              while($result = $show->fetch_assoc()){
                $i++;
            
          ?>
          <tr>
            <td> <?php echo $i; ?> </td>
            <td> <?php echo $result['admin_User']; ?></td>
            <td> <?php echo $result['admin_Email']; ?></td>
            <td> *** </td>
            <td> <?php echo $result['level']; ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_user" value="<?php echo $result['admin_User']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> RESET Mật Khẩu </button>
                     <!-- <a href="editadmin.php?username=<?php echo $result['admin_User']?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">EDIT</a> -->
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $result['admin_User']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Xóa Nhân Viên  </button>
                </form>
            </td>
          </tr>
         <?php
          }
            }
            ?>  
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
    <script >
        function xoanv{
            alert("Chắc chắc bạn muốn xóa");
        }
    </script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
ob_end_flush();

?>