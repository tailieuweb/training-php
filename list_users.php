<?php
// Start the session
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$users = $userModel->getUsers($params);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>

</head>

<body>
    <?php include 'views/header.php' ?>
    <div class=" container">

        <?php if (!empty($users)) { ?>
        <div class="alert alert-warning" role="alert">
            List of users! <br>
            Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <!-- Phân tách thông tin -->
                    <!-- Sử dùng hàm htmlspecialchars đễ mã hóa các ký tự có khả năng thực thi javascript trước khi lưu trữ Stored XSS -->
                    <th scope="row"><?php echo htmlspecialchars($user['id']) ?></th>
                    <td>
                        <?php echo htmlspecialchars($user['name']) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($user['fullname']) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($user['email']) ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($user['type']) ?>
                    </td>
                    <td>
                        <?php
                            $min = 10000;
                            $max = 99999;
                            $ran_string = $userModel->generateRandomString(10);
                        ?>
                        <a href="form_user.php?id=<?= $ran_string . $user['id'] . mt_rand($min , $max) ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                        </a>
                        <a href="view_user.php?id=<?= $ran_string . $user['id'] . mt_rand($min , $max) ?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>
                        <a href="delete_user.php?id=<?= $ran_string . $user['id'] . mt_rand($min , $max) ?>">
                            <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <!-- Test Reflected XSS bằng htmlspecialchars -->
        <?php if (!empty($params['keyword'])) { ?>
        <div class="alert alert-warning" role="alert">
            <?php echo htmlspecialchars($params['keyword']) ?>
        </div>
        <?php } ?>
        <?php } ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="public/js/xss.js"></script>
</html>