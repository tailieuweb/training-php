<?php
// require_once 'models/BankModel.php';
// $bankModel = new BankModel();
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();

$bankModel = $factory->make('bank');

$params = [];

$banks = $bankModel->getBank($params);

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $bankModel->findBankById($id); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($id)) {
        $bankModel->updateBankInfo($_POST);
    } else {
        $bankModel->insertBankInfo($_POST);
    }
    header('location: list_bank.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Bank form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($user || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                Bank profile
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">User ID : </label>
                    <span><?php if (!empty($user[0]['id'])) echo $user[0]['id'] ?></span>
                </div>
                <div class="form-group">
                    <label for="cost">Cost : </label>
                    <span><?php if (!empty($user[0]['cost'])) echo $banks[0]['cost'] ?></span>
                </div>
    </div>
    </form>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
        Bank not found!
    </div>
<?php } ?>
</div>
</body>

</html>