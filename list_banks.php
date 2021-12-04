<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();
$banks = $bankModel->getBanks();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if (!empty($banks)) {?>
            <div class="alert alert-warning" role="alert">
                List of users! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banks as $bank) {?>
                        <tr>
                            <th scope="row"><?php echo $bank['id']?></th>
                            <td>
                                <?php echo $bank['user_id']?>
                            </td>
                            <td>
                                <?php echo $bank['cost']?>
                            </td>
                            <td>
                                <a href="form_bank.php?id=<?php echo $bank['id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_bank.php?id=<?php echo $bank['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <?php $string = "=4a12a+sadgak=ad/akdmdsaaks==nbjfdsi" ?>
                                <?php $string1 = "+9aj4a12a+sadgak=ad/đk5xva//k5sks+sm6" ?>
                                <?php $result = $string . base64_encode($bank['id']) . $string1 ?>
                                <a href="delete_bank.php?id=<?php echo $result ?>">
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
        <?php } ?>
    </div>
</body>
</html>