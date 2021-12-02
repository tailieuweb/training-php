<?php
// Start the session
session_start();
$_SESSION['token']=md5(1);
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}
$banks = $bankModel->getbanks($params);
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
                List of banks! <br>
            </div>
            <table class="table table-striped">
            <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User_ID</th>
                        <th scope="col">COST</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banks as $bank) {?>
                        <tr>
                            <td>
                                <?php echo $bank['id']?>
                            </td>
                            <td>
                                <?php echo $bank['user_id']?>
                            </td>
                            <td>
                                <?php echo $bank['cost']?>
                            </td> 
                            <td>
                                <a href="form_bank.php?id=<?php echo md5($bank['id']) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_bank.php?id=<?php echo md5($bank['id']) ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_bank.php?id=<?php echo md5($bank['id'])?>&token=<?php echo $_SESSION['token'] ?? '' ?>">
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