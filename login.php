<?php ob_start();
include 'inc/header.php';

?>

<?php
$check = Session::get('customer_login');
if (!isset($check)) {
  header('Location:login.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $loginCus = $user->Login_Customer($_POST);
}
?>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  form {
    border: 3px solid #f1f1f1;
  }

  input[type=text],
  input[type=password] {
    width: 450px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;

  }

  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 15px 120px;
    border: none;
    cursor: pointer;
    width: 455px;
    position: relative;
    left: 50%;
    transform: translateX(-103%);
  }

  button:hover {
    opacity: 0.8;
  }

  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44337;
  }

  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
    text-align: center;
    font-size: 15px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }

    .cancelbtn {
      width: 100%;
    }
  }
</style>
<body>
<<<<<<< HEAD



  <form action="" method="post">
    <center>
      <h2>Đăng nhập</h2>
    </center>

    <div class="container">
      <label for="uname"><b>Tài khoản</b></label>
      <input class="userc" type="text" placeholder="Enter Username" name="username" required">
      <br>
      <label for="psw"><b>Mật khẩu </b></label>
      <input class="pswc" type="password" placeholder="Enter Password" name="password" required>
      <?php
      if (isset($loginCus)) {
        echo $loginCus;
      }
      ?>
      <br>
      <button type="submit" name="login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Lưu tài khoản
      </label>
    </div>

    <!-- <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div> -->
  </form>

</body>

<?php

include 'inc/footer.php';
ob_end_flush();
?>
