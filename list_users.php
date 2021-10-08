<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();
$params = [];
if (!empty($_GET['keyword'])) {
  $params['keyword'] = $_GET['keyword'];
}
$users = $userModel->getUsersByName($params);
$_SESSION['token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <?php include 'views/meta.php' ?>
</head>

<body>
  <?php include 'views/header.php' ?>
  <div class="container">
    <?php if (!empty($users)) { ?>
      <div class="alert alert-warning" role="alert">
        List of users!
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Fullname</th>
            <th scope="col">Type</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) { ?>
            <tr>
              <th scope="row"><?= $user['id'] ?></th>
              <td>
                <?= $user['name'] ?>
              </td>
              <td>
                <?= $user['fullname'] ?>
              </td>
              <td>
                <?= $user['type'] ?>
              </td>
              <td>
                <a href="form_user.php?uid=<?= $user['uid'] ?>&token=<?= $_SESSION['token'] ?>">
                  <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                </a>
                <a href="view_user.php?uid=<?= $user['uid'] ?>&token=<?= $_SESSION['token'] ?>">
                  <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                </a>
                <a href="delete_user.php?uid=<?= $user['uid'] ?>&token=<?= $_SESSION['token'] ?>">
                  <i class="fa fa-eraser" aria-hidden="true" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-dark" role="alert">
        This is a dark alert—check it out!
      </div>
    <?php } ?>
  </div>
  <script src="./public/js/script.js"></script>
</body>

</html>