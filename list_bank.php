<?php
// Start the session
session_start();

require_once 'models/BankModel.php';
$bankModel = new BankModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$banks = $bankModel->getBanks($params);
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
        <?php if (!empty($banks)) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">SDT</th>
                    <th scope="col">Email</th>
                    <th scope="col">Stk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banks as $bank) { ?>
                <tr>
                    <!-- Phân tách thông tin -->
                    <!-- Sử dùng hàm htmlentities đễ mã hóa các ký tự có khả năng thực thi javascript trước khi lưu trữ -->
                    <th scope="row"><?php echo htmlentities($bank['id']) ?></th>
                    <td>
                        <?php echo htmlentities($bank['name']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($bank['fullname']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($bank['sdt']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($bank['email']) ?>
                    </td>
                    <td>
                        <?php echo htmlentities($bank['stk']) ?>
                    </td>
                    <td>
                        <?php
                            $min = 1000;
                            $max = 9999;
                        ?>
                        <a href="form_user.php?id=<?= mt_rand($min , $max) . $bank['id'] . mt_rand($min , $max) ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i> 
                        </a>
                        <a href="view_user.php?id=<?= mt_rand($min , $max) . $bank['id'] . mt_rand($min , $max) ?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>
                        <a href="delete_user.php?id=<?= mt_rand($min , $max) . $bank['id'] . mt_rand($min , $max) ?>">
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
        <?php } ?>
    </div>
</body>

</html>