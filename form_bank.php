<?php
// require_once 'models/BankModel.php';
// require_once 'models/UserModel.php';
require_once 'models/FactoryModel.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');
$userModel = $factory->make('user');

$bank = NULL; //Add new bank
$_id = NULL;
$id_end = NULL;
//List bank join user
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}
$users = $userModel->getUserHaveNotBank();
$banks = $bankModel->getBanks($params);

// if (!empty($_GET['id'])) {
//     $_id = $_GET['id'];
//     $id_start = substr($_id, 3);
//     $id_end = substr($id_start, 0, -3);
//     $bank = $bankModel->findBankById($id_end); //Update existing user
// }
// if (!empty($_POST['submit'])) {
//     $version = $_POST['version'];
//     if (!empty($id_end)) {
//         $a = $bankModel->updateBank($_POST);
//         if ($a == false) {
//             $a = "Updating Error! Pleade Try Again";
//         } else {
//             header('location: list_banks.php');
//         }
//     } else {
//         $bankModel->insertBanks($_POST);
//         header('location: list_banks.php');
//     }
// }
if (!empty($_POST['submit'])) {

    if (isset($_GET['id_bank'])) {
        $bankModel->updateBank($_POST);
    } else {
        $bankModel->insertBanks($_POST);
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

        <?php if ($bank || empty($id_end) || $users) { ?>
            <div class="alert alert-warning" role="alert">
                Bank form
            </div>
            <?php if (isset($a)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $a; ?>
                </div>
            <?php } ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id_end ?>">
                <input type="hidden" name="version" value="<?php if (!empty($bank[0]['version'])) echo md5($bank[0]['version'] . "chuyen-de-web-1") ?>">

                <?php

                if (isset($_GET['id'])) { ?>
                    <label for="">Name</label>
                    <div class="form-group">
                        <?php
                        foreach ($users as $user) {
                            if ($user['id'] == $_GET['id']) {
                                echo $user['name'];
                            }
                        }
                        ?>
                    </div>
                <?php } else { ?>
                    <label for="">Type</label>
                    <div class="form-group">
                        <select name="user_id">
                            <?php
                            foreach ($users as $user) {
                                if (isset($_GET['id'])) {
                            ?>
                                    <option value="<?= $user['id'] ?>" selected><?= $user['name'] ?></option>
                                    <?php if ($user['id'] == $_GET['id']) {
                                        echo $user['name'];
                                    } ?>
                                <?php
                                } else { ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                <?php }
                ?>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" step="any" name="cost" class="form-control" placeholder="Cost" value="<?php if (isset($_GET['id'])) {
                                                                                                        foreach ($banks as $bank) {
                                                                                                            if ($bank['user_id'] == $_GET['id']) {
                                                                                                                echo $bank['cost'];
                                                                                                            }
                                                                                                        }
                                                                                                    } ?>">
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