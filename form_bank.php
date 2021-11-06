<?php
require_once 'models/BankModel.php';
$bankModel = BankModel::getInstance();

require_once 'models/UserModel.php';
$userModel = UserModel::getInstance();

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
        // $temp = $bankModel->updateBank($_POST);
        $temp = $userModel->updateUser($_POST);
        var_dump($temp);
        die();
        if ($temp->isSuccess == true) {
            echo "<script>alert('$temp->data');window.location.href='./list_bank.php'</script>";
        } else {
            echo "<script>alert('$temp->error');</script>";
        }
    } else {
        $userModel->insertUser($_POST);
        // $bankModel->insertBank($_POST);
        header('location: list_bank.php');
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
                <input type="hidden" name="id" value="<?php echo strip_tags($id) ?>">
                <div class="form-group">
                    <label for="type">Name</label>
                    <select class="form-control" name="user_id">
                        <?php
                        foreach ($listUsers as $user) { ?>
                            <option value="<?php echo $user['id'] ?>" <?php if (!empty($banks[0]['name'])) {
                                                                            if ($banks[0]['name'] == $user['name']) {
                                                                                echo "selected";
                                                                            }
                                                                        } ?>><?php echo strip_tags($user['name']) ?></option>

                        <?php  }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="version" value="<?php if (!empty($banks[0]['version'])) echo strip_tags($banks[0]['version']) ?>">
                    <label for="cost">Cost</label>
                    <input name="cost" class="form-control" placeholder="Cost" required value="<?php if (!empty($banks[0]['cost'])) echo strip_tags($banks[0]['cost']) ?>">
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