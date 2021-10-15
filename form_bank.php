<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';

$bankModel = FactoryPattern::make("bank");

$bank = NULL; //Add new bank
$bank_id = NULL;

if (!empty($_GET['bank_id'])) {
    $bank_id = $_GET['bank_id'];
    $bank = $bankModel->findBankById($bank_id); // Update existing bank
}


if (!empty($_POST['submit'])) {

    if (!empty($bank_id)) {
        $bankModel->updateBank($_POST);
    } else {
        $bankModel->insertBank($_POST);
    }
    header('location: list_banks.php');
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

    <?php if ($bank || !isset($bank_id)) { ?>
        <div class="alert alert-warning" role="alert">
            Bank form
        </div>
        <form method="POST">
            <?php if (!empty($bank_id)) : ?>
                <input type="hidden" name="id" value="<?php echo $bank_id ?>">
            <?php endif; ?>


            <div class="form-group">
                <label for="name">User ID</label>
                <input class="form-control" name="user_id" placeholder="User ID"
                       value="<?php if (!empty($bank[0]['user_id'])) echo strip_tags($bank[0]['user_id']) ?>">
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input name="cost" class="form-control" placeholder="Cost"
                       value="<?php if (!empty($bank[0]['cost'])) echo strip_tags($bank[0]['cost']) ?>">
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
    <?php } ?>
</div>


</body>

</html>