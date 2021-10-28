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
    <div class="container">
        <?php if (!empty($banks)) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banks as $bank) { ?>
                <tr>
                    <th scope="row"><?php echo $bank['id'] ?></th>
                    <td>
                        <?php echo $bank['user_id'] ?>
                    </td>
                    <td>
                        <?php echo $bank['cost'] ?>
                    </td>
                    <td>
                        <a href="form_bank.php?id=<?php echo $bank['id'] ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                        </a>
                        <a href="view_bank.php?id=<?php echo $bank['id'] ?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>
                        <a href="delete_bank.php?id=<?php echo $bank['id'] ?>">
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
    <a href="form_bank.php">Add bank</a>
</body>

</html>