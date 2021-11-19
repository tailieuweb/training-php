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
        $temp = $bankModel->updateBank($_POST);
        if ($temp->isSuccess == true) {
            echo "<script>alert('$temp->data');window.location.href='./list_bank.php'</script>";
        } else {
            echo "<script>alert('$temp->error');</script>";
        }
    } else {
        $bankModel->insertBank($_POST);
        header('location: list_bank.php');
    }
    // header('location: form_bank.php');
}

?>

<!DOCTYPE html>
<html>

<head>
<<<<<<< HEAD
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
    <?php include 'views/header.php';?>
<body>
    <div class="container">

        <?php if (($user || !isset($_id))) { ?>
=======
    <title>Bank form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($banks || empty($id)) { ?>
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
        <div class="alert alert-warning" role="alert">
            Bank form
        </div>
        <form method="POST">
<<<<<<< HEAD
            <input type="hidden" name="id" value="<?php echo $_id ?>">
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Fullname</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['fullname'] ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Email</label>
                <span><?php if (!empty($user[0]['name'])) echo $user[0]['email'] ?></span>
            </div>
            <div class="form-group mb-3">
                <label for="cost">Cost</label>
                <?php if ($bank) {?>
                <input class="form-control" name="cost" placeholder="cost"
                    value='<?php if (!empty($user[0]['name'])) echo $bank[0]['cost'] ?>' required>
                <?php } else {?>
                <input class="form-control" name="cost" placeholder="cost"
                    value='<?= 0?>' required>
                <?php }?>        
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
            User not found
        <?php }?>
    </div>  
=======
            <input type="hidden" name="id" value="<?php echo strip_tags($id) ?>">
            <div class="form-group">
                <label for="type">Name</label>
                <select class="form-control" name="user_id">
                    <?php 
                        foreach($listUsers as $user) { ?>
                    <option value=<?php echo strip_tags($user['id'])?>><?php echo strip_tags($user['name'])?></option>

                    <?php  }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input name="cost" class="form-control" placeholder="Cost" required>
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
                            <option value="<?php echo $user['id'] ?>" 
                            <?php if (!empty($banks[0]['name'])) {                                                                          
                                if ($banks[0]['name'] == $user['name']) {
                                     echo "selected";
                                 }
                            } ?>><?php echo $user['name'] ?></option>
                            <?php  }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="version"
                            value="<?php if (!empty($banks[0]['version'])) echo $banks[0]['version'] ?>">
                        <label for="cost">Cost</label>
                        <input name="cost" class="form-control" placeholder="Cost" required
                            value="<?php if (!empty($banks[0]['cost'])) echo $banks[0]['cost'] ?>">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
                <?php } ?>
            </div>
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
</body>

</html>