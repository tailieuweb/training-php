<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

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
            <div class="alert alert-warning" role="alert">
                List of users! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Bank ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Version</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banks as $bank) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $bank['user_id'] ?></th>
                            <td>
                                <?php echo $bank['bank_id'] ?>
                            </td>
                            <td>
                                <?php echo $bank['name'] ?>
                            </td>
                            <td>
                                <?php echo $bank['fullname'] ?>
                            </td>
                            <td>
                                <?php echo $bank['cost'] ?>
                            </td>

                            <td>
                                <a href="form_bank.php?id=<?php echo rand(100, 999) . md5($bank['bank_id'] . "chuyen-de-web-1") . rand(100, 999) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_bank.php?id=<?php echo rand(100, 999) . md5($bank['bank_id'] . "chuyen-de-web-1") . rand(100, 999)  ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_bank.php?id=<?php echo rand(100, 999) . md5($bank['bank_id'] . "chuyen-de-web-1") . rand(100, 999) ?>">
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