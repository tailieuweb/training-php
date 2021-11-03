<?php
session_start();


require_once 'models/FactoryPattern.php';

$factoryModel = new FactoryPattern();
$userModel = $factoryModel->make('user');


$user = NULL;

$post_base_64_encode = $_GET['n'];
$user_base_64_encode = $_GET['o'];

$post_base_64_dencode = base64_decode($post_base_64_encode);
$user_base_64_dencode = base64_decode($user_base_64_encode);

$post_json_decode = json_decode($post_base_64_dencode, true); // current
$user_json_decode = json_decode($user_base_64_dencode, true); // comming.

$value_not_change = json_decode(base64_decode($post_json_decode['value_not_change']), true);
$newUser = $value_not_change;

$newUser['name'] = $user_json_decode['name'];
$newUser['fullname'] = $user_json_decode['fullname'];
$newUser['email'] = $user_json_decode['email'];
$newUser['type'] = $user_json_decode['type'];
$newUser['version'] = $user_json_decode['version'];

if ($value_not_change['name'] != $post_json_decode['name']) {
  $newUser['name'] = $post_json_decode['name'];
}
if ($value_not_change['fullname'] != $post_json_decode['fullname']) {
  $newUser['fullname'] = $post_json_decode['fullname'];
}

if ($value_not_change['email'] != $post_json_decode['email']) {
  $newUser['email'] = $post_json_decode['email'];
}

if ($value_not_change['type'] != $post_json_decode['type']) {
  $newUser['type'] = $post_json_decode['type'];
}



if (!empty($_POST['submit'])) {
}

?>

<?php include 'views/meta.php' ?>

<div class="container-fluid">
  <div class="alert alert-warning h2 text-center" role="alert" style="margin-top: 0;">
    Dữ liệu vừa được cập nhập trước đó.
  </div>
  <!-- <div>
    <strong class="h4">Quay lại trang danh sách user: </strong>
    <a href='<?php $_SERVER['HTTP_REFERER'] ?>list_users.php'>List users</a>
  </div>
  <div style="margin-top: 7px">
    <strong class="h4">Quay lại trang cập nhập: </strong>
    <a href='<?php $_SERVER['HTTP_REFERER'] ?>/form_user.php?uuid=e03ed5e731550609cdb5c41c6fd0a665'>Tiếp tụp cập nhập.</a>
  </div> -->
</div>

<div class="container-fluid">
  <form method="POST" action="<?php echo $_SERVER['HTTP_REFERER'] ?>/form_user.php?uuid=<?php echo $newUser['uuid'] ?>">
    <input type="hidden" name="id" value="<?php echo rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . $user_json_decode['id'] . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) ?>">
    <input type="hidden" name="version" value="<?php if (!empty($user_json_decode['version'])) echo md5($user_json_decode['version'])?>">

    <div class="row">

      <div class="col-md-12" id="right">
        <div class="h3">Current changes</div>
        <div class="form-group">
          <label for="name">Name</label>
          <div style="display: flex;">
            <input class="form-control" name="name" placeholder="Name" value="<?php if (!empty($newUser['name'])) echo strip_tags($newUser['name']) ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="fullname">Fullname</label>
          <div style="display: flex;">
            <input name="fullname" class="form-control" placeholder="Fullname" value="<?php if (!empty($newUser['fullname'])) echo strip_tags($newUser['fullname']) ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div style="display: flex;">
            <!-- <input type="password" name="password" class="form-control" placeholder="password" value="<?php // if (!empty($newUser['password'])) echo strip_tags($newUser['password']) ?>"> -->
            <input type="password" name="password" class="form-control" placeholder="password" required>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <div style="display: flex;">
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (!empty($newUser['email'])) echo strip_tags($newUser['email']) ?>">
          </div>

        </div>
        <div class="form-group">
          <label for="type">Type</label>
          <div style="display: flex;">
            <select name="type" uuid="type" class="form-control">
              <option value="" selected disabled huuidden>Select type</option>
              <option value="admin" <?php if (!empty($newUser['type']) && $newUser['type'] == "admin") echo "selected" ?>>Admin</option>
              <option value="user" <?php if (!empty($newUser['type']) && $newUser['type'] == "user") echo "selected" ?>>User</option>
              <option value="guest" <?php if (!empty($newUser['type']) && $newUser['type'] == "guest") echo "selected" ?>>Guest</option>
            </select>
          </div>

        </div>
      </div>

    </div>

    <button type="submit" name="submit" value="submit" class="btn btn-success btn-lg" style="width: 100%;">Submit</button>

  </form>

</div>