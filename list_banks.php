<?php
// Start the session
session_start();

require_once 'models/CSRFToken.php';
require_once 'models/FactoryPattern.php';

$bankModel = FactoryPattern::make('bank');

$csrf_token = CSRFToken::GenerateToken();
$_SESSION["csrf_token"] = $csrf_token;
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = htmlspecialchars($_GET['keyword']);
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
    <div class="container">
        <?php if (!empty($banks)) { ?>
            <div class="alert alert-warning" role="alert">
                List of users! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banks as $bank) { ?>
                        <tr>
                            <th scope="row"><?php echo $bank['id'] ?></th>
                            <td>
                                <?php echo strip_tags($bank['user_id']) ?>
                            </td>
                            <td>
                                <?php echo strip_tags($bank['cost']) ?>
                            </td>
                            <td>
                                <a href="form_bank.php?bank_id=<?php echo strip_tags($bank['id']) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_bank.php?bank_id=<?php echo strip_tags($bank['id']) ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_bank.php?bank_id=<?php echo strip_tags($bank['id']) ?>&btcsrf=<?php echo strip_tags($csrf_token) ?>">
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