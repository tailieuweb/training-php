<?php
session_start();
require_once 'models/UserModel.php';
require_once 'models/FactoryPattent.php';
require_once 'models/Repository.php';
$factory = new FactoryPattent();
$reponsitory = new Repository();
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
    $bank = $bankModel->findBankByIdVersionTwo($_id);//Update existing user
}

if (!empty($_POST['submit'])) {
    
    if (!empty($_id)) {
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
    <title>Bank form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($bank || empty($_id)) { ?>
        <div class="alert alert-warning" role="alert">
            User form

        </div>
        <?php if (isset($a)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $a; ?>
        </div>
        <?php } ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_id ?>">
           
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
                <input type="number" name="cost" class="form-control" placeholder="0"
                    value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
        <div class="alert alert-success" role="alert">
            Bank not found!
        </div>
        <?php } ?>
    </div>
</body>

</html>