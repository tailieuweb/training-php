<?php
require_once 'models/UserModel.php';
$BankModel = new BankModel();

$banks = $bankModel->getUsers();
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
                        <th scope="col">Cost</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banks as $banks) { ?>
                        <tr>
                            <th scope="row"><?php echo $banks['id'] ?></th>
                            <td>
                                <?php echo $banks['name'] ?>
                            </td>
                            <td>
                                <?php echo $banks['fullname'] ?>
                            </td>
                            <td>
                                <?php echo $banks['email'] ?>
                            </td>
                            <td>
                                <?php echo $banks['type'] ?>
                            </td>
                            <td>
                                <a href="edit_bank.php?id=<?php echo $banks['id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_bank.php?id=<?php echo $banks['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_bank.php?id=<?php echo $banks['id'] ?>">
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