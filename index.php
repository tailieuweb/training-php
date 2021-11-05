<?php
// Start the session
session_start();

require_once './DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();

$userRepository = $factory->make('UserRepository');
$params = [];

if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$userAccounts = $userRepository->getBankAccounts($params);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
    <!-- Thêm meta tag CSP -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <a href="index.php">Home</a>

        <?php if (!empty($userAccounts)) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userAccounts as $userAcc) { ?>
                        <tr>
                            <!-- Sử dụng htmlentities để ngăn chặn việc thực thi code khi in dữ liệu ra màn hình -->
                            <th scope="row"><?php echo htmlentities($userAcc['id']) ?></th>
                            <td>
                                <?php echo htmlentities($userAcc['name']) ?>
                            </td>
                            <td>
                                <?php echo htmlentities($userAcc['fullname']) ?>
                            </td>
                            <td>
                                <?php echo $userAcc['email']?>
                            </td>
                            <td>
                                <?php echo $userAcc['type']?>
                            </td>
                            <td>
                                <?php echo $userAcc['cost']?>
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
</body>

</html>