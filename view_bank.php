<?php
<<<<<<< HEAD
require_once 'models/BankModel.php';
require_once 'models/FactoryPattent.php';

$factory = new FactoryPattent();
$bankModel = $factory->make('bank');

=======
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');
>>>>>>> 2-php-202109/2-groups/5-E/3-27-Tien
$bank = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
<<<<<<< HEAD
    $id_start = substr($id,3);
    $id_end=substr($id_start,0,-3);
    $bank = $bankModel->findBankById($id_end);//Update existing user
=======
    $bank = $bankModel->findBankById($id);//Update existing user
    
>>>>>>> 2-php-202109/2-groups/5-E/3-27-Tien
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if ($bank || empty($id)) { ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <span><?php if (!empty($bank[0]['name'])) echo $bank[0]['name'] ?></span>
            </div>
            <div class="form-group">
                <label for="password">Cost</label>
                <span><?php if (!empty($bank[0]['name'])) echo $bank[0]['cost'] ?></span>
            </div>

        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>
</body>
</html>