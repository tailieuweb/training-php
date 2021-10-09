<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();

$banks = NULL; //Add new user
$id = NULL;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}
if (!empty($_POST['submit'])) {
    $bankModel->updateBank($_POST);
}
var_dump($bankModel);
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

        <?php if ($bank || empty($id)) { ?>

            <div class="alert alert-warning" role="alert">
                Bank form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input class="form-control" name="user_id" placeholder="User Id" value="<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input name="cost" class="form-control" placeholder="Cost" required>
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