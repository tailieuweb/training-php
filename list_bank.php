<?php
// Start the session
session_start();
require_once './models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankmodel = $factory->make('bank');
$userModel = $factory->make('user');

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword']; 
}

$error = null;

if(!is_object($userModel)){
    if($userModel == 500){     
        $error = 1;     
    }
}else{
    $banks = $bankmodel->getBanks($params);
}
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
                List of Bank! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Actions</th>
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
                                <a href="view_user.php?id=<?php echo $bank['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_bank.php?id=<?php echo $bank['id']?>">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <?php if($error == 1){?>
                <div style="text-align: center; font-weight: bold; color: red;">
                   <p>>>> Connect Fail <<<</p>
                   <h3 style="font-size: 10rem;">404 | Data - Error</h3>
                </div>
            <?php } else {?>
                <div class="alert alert-dark" role="alert">
                    This is a dark alert—check it out!
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</body>
</html>