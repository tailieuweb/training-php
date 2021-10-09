<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');
$params = [];

if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    //Kiểm tra keyword bằng regex trong PHP
    // $pattern = '/^[A-Za-z0-9]$/';
    // if (!preg_match($pattern, $params['keyword'])) {
    //     echo "Không đúng định dạng";
    //     $params['keyword'] = null;
    // }
}

$banks = $bankModel->getBank($params);

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
        <?php if (!empty($banks)) { ?>
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
                    <?php foreach ($banks as $bank) { ?>
                        <tr>
                            <!-- Sử dụng htmlentities để ngăn chặn việc thực thi code khi in dữ liệu ra màn hình -->
                            <th scope="row"><?php echo htmlentities($bank['id']) ?></th>
                            <td>
                                <?php echo htmlentities($bank['name']) ?>
                            </td>
                            <td>
                                <?php echo htmlentities($bank['fullname']) ?>
                            </td>
                            <td>
                                <?php echo $bank['email']?>
                            </td>
                            <td>
                                <?php echo $bank['type']?>
                            </td>
                            <td>
                                <?php echo $bank['cost']?>
                            </td>
                            <td>
                                <!-- Encode id with random number -->
                                <a href="form_user.php?id=<?php echo rand(10000,99999).$bank['id'].rand(10000,99999) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <!-- Encode id with random number -->
                                <a href="view_user.php?id=<?php echo rand(10000,99999).$bank['id'].rand(10000,99999) ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <!-- Encode id with random number -->
                                <a href="delete_bank.php?id=<?php echo rand(10000,99999).$bank['id'].rand(10000,99999) ?>">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                                <a href="form_bank.php?id=<?php echo rand(10000,99999).$bank['id'].rand(10000,99999) ?>">
                                    <span aria-hidden="true" title="Update bank account">&#9998;</span>
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

        <a href="http://training-php.local/form_bank.php">Add bank account!</a>
    </div>
</body>

</html>