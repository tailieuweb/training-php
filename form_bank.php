<?php
session_start();
require_once 'models/UserModel.php';
require_once 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$bankModel = '';
$userModel = '';
// var_dump($factory->make('user'));

$userModel = $factory->make('user');
$bankModel = $factory->make('bank');


$bank = NULL; //Add new user
$_id = NULL;
$id_end = NULL;
//List bank join user
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}
$users = $userModel->getUsers($params);

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $id_start = substr($_id, 3);
    $id_end = substr($id_start, 0, -3);
    
    $bank = $bankModel->findBankById($id_end); //Update existing user
    
}
if (!empty($_POST['submit'])) {
    $version = $_POST['version'];
    if (!empty($id_end)) {
        $a = $bankModel->updateBank($_POST, $version);
        
        if ($a == false) {
            $a = "Updating Error! Pleade Try Again";
        } else {
            header('location: list_banks.php');
        }
    } else {
        $bankModel->insertBanks($_POST);
        header('location: list_banks.php');
    }
    // header('location: list_users.php');
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
                User form

            </div>
            <?php if (isset($a)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $a; ?>
                </div>
            <?php } ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $id_end ?>">
                <input type="hidden" name="version" value="<?php if (!empty($bank[0]['version'])) echo md5($bank[0]['version'] . "chuyen-de-web-1") ?>">
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="user_id">
                        <?php
                        foreach ($users as $user) {
                            if ($user['id'] == $bank[0]['id']) {
                        ?>
                                <option value="<?= $user['id'] ?>" selected><?= $user['name'] ?></option>
                            <?php
                            } else { ?>
                                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                        <?php
                            }
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" name="cost" class="form-control" placeholder="0" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
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