<?php
// Start the session
session_start();
require_once 'models/BankModel.php';
$bankModel = new BankModel();
$bank = NULL; //Add new bank
$_id = NULL;
if (!empty($_GET['user_id'])) {
    $_id = $_GET['user_id'];
}
$bank = $bankModel->getBanks();
if (!empty($_POST['submit'])) {
    $bankInsert = $bankModel->insertBank($_POST);
    if ($bankInsert == true) {
        header('location: list_banks.php');
    }
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

        <?php if ($bank || empty($id)) {

        ?>
            <div class="alert alert-warning" role="alert">
                Bank form
            </div>
            <form method="POST">
                <input type="hidden" name="user_id" value="<?php echo $_id ?>">

                <div class="form-group">
                    <label for="name">User name</label>
                    <select name="user_id">
                        <option value="0" <?php if (!empty($bank[0]['name']) == '0') {
                                                echo "selected";
                                            } ?>>---</option>
                        <?php foreach ($bank as $item) {
                            $id_bank = $item['bank_id'];
                        ?>
                            <option value="<?php echo $bank[$id_bank - 1]['user_id']; ?>" <?php if (!empty($bank[$id_bank - 1]['user_id']) == $item['name']) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $item['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <label for="cost">Cost</label>
                <input type="number" name="cost" id="" placeholder="10">
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