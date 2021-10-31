<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');

if($userModel !== null){

// require_once 'models/UserModel.php';
// $userModel = new UserModel();

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
<<<<<<< HEAD
    <?php include 'views/header.php' ?>
    <div class=" container">
        <?php if (!empty($users)) { ?>
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
                    <!-- Sử dùng htmlentities để chuyển đổi tất cả các ký tự áp dụng thành các thực thể HTML trước khi save-->
                    <!-- Mã hoá các kí tự có thể thực thi các câu lệnh script -->
                    <th scope="row"><?php echo htmlentities($user['id']) ?></th>
                    <td>
                        <?php echo htmlentities($user['name']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($user['fullname']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($user['email']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($user['type']) ?>
                    </td>
                    <td>
                        <a href="form_user.php?id=<?= rand(100,999).$user['id'].rand(100,999)?> ">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i> 
                        </a>
                        <a href="view_user.php?id=<?=rand(100,999).$user['id'].rand(100,999)?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>
                        <a href="delete_user.php?id=<?=rand(100,999).$user['id'].rand(100,999)?>">
                            <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
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
=======
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if (!empty($users)) {?>
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
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>
                        <tr>
                            <th scope="row"><?php echo $user['id']?></th>
                            <td>
                                <?php echo $user['name']?>
                            </td>
                            <td>
                                <?php echo $user['fullname']?>
                            </td>
                            <td>
                                <?php echo $user['type']?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_user.php?id=<?php echo md5($user['id'].'TDC') ?>">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <div class="alert alert-dark" role="alert">
                This is a dark alert—check it out!
            </div>
>>>>>>> 2-php-202109/2-groups/8-H/4-33-Tri
        <?php } ?>
    </div>
<?php } else{echo"Lỗi factory!";} ?>
</body>
</html>