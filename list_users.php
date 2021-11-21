<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
require_once 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$userModel = $factory->make('user');
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
                            <th scope="row"><?php echo $user['id'] ?></th>
                            <td>
                                <?php echo htmlspecialchars($user['name'] )?>
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
                            <a href="form_user.php?id=<?php echo rand(100, 999) . md5($user['id'] . "chuyen-de-web-1") . rand(100, 999) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo rand(100, 999) . md5($user['id'] . "chuyen-de-web-1") . rand(100, 999)  ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_user.php?id=<?php echo rand(100, 999) . md5($user['id'] . "chuyen-de-web-1") . rand(100, 999) ?>">
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
    <!-- <script>document.cookie</script> -->
    <!-- <script src="./public/js/csrf.js"></script> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
<script src="public/js/xss.js"></script>
</html>