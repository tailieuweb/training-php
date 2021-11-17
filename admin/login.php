<?php

include('includes/header.php'); 
include '../classes/adminlogin.php'

?>
<?php  
  $class = new adminlogin();
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $admin_User = $_POST['admin_User'];
    $admin_Pass = md5($_POST['admin_Pass']);

    $login_check = $class->login_admin($admin_User,$admin_Pass);
  }
?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Đăng Nhập !</h1>
                <span><?php
                  if(isset($login_check)){
                    echo $login_check;
                }
       ?></span>
              </div>

                <form class="user" action="login.php" method="POST">

                    <div class="form-group">
                    <input type="text" name="admin_User" class="form-control form-control-user" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="admin_Pass" class="form-control form-control-user" placeholder="Password">
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block"> Đăng Nhập </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>



</div>


<?php
include('includes/scripts.php'); 
?>