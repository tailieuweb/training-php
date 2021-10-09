<?php
require_once 'models/BankModel.php';
$bankModel = new BankModel();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$banks = NULL; //Add new user
$id = NULL;
$listUsers = $userModel->getUsers();
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $banks = $bankModel->getBankById($id);
}

if (!empty($_POST['submit'])) {
    if (!empty($id)) {
        //Update bank
        $bankModel->updateBank($_POST);
    } else {
        $bankModel->insertBank($_POST);
    }
    // header('location: form_bank.php');
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

        <?php if ($banks || empty($id)) { ?>

            <div class="alert alert-warning" role="alert">
                Bank form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="type">Name</label>
                    <select class="form-control" name="user_id">
                        <?php
                        foreach ($listUsers as $user) { ?>
                            <option value="<?php echo $user['id'] ?>" <?php if (!empty($banks[0]['name'])) {
                                                                            if ($banks[0]['name'] == $user['name']) {
                                                                                echo "selected";
                                                                            }
                                                                        } ?>><?php echo $user['name'] ?></option>

                        <?php  }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input name="cost" class="form-control" placeholder="Cost" required value="<?php if (!empty($banks[0]['cost'])) echo $banks[0]['cost'] ?>">
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