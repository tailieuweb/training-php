<?php
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
// Bank 
$bankModel = $factory->make('bank');
$bank = NULL; // Add new bank
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $bank = $bankModel->getBankById($id); //Update existing bank
}
if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        $bankModel->updateBank($_POST);
    } else {
        $userModel->insertBank($_POST);
    }
    header('location: list_bank.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if ($bank || empty($id)) { ?>
            <div class="alert alert-warning" role="alert">
                Bank profile
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <span><?php if (!empty($bank[0]['name'])) echo $bank[0]['name'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Fullname</label>
                    <span><?php if (!empty($bank[0]['name'])) echo $bank[0]['fullname'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Email</label>
                    <span><?php if (!empty($bank[0]['email'])) echo $bank[0]['email'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Type</label>
                    <span><?php if (!empty($bank[0]['type'])) echo $bank[0]['type'] ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Cost: </label>
                    <span><?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?></span>
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