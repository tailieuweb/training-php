<?php
    require_once './models/Facade/Facade.php';
    $facade = new Facade();
    $bankModel = $facade->makeRequire('BankModel');
    $userModel = $facade->makeRequire('UserModel');
    $id = 0;
    if($_GET['id'] > 0 && is_numeric($_GET['id'])){
        $id = $_GET['id'];
    }
    else{
        header('location:list_bank.php');
    }
    $banks = $bankModel->findUserByID($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
<?php include 'views/header.php'?>
<div class="container">

    <?php if (!empty($banks)) { 
        ?>
        <div class="alert alert-warning" role="alert">
            User profile
        </div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $banks[0]['id'] ?>">
            <div class="form-group">
                <label for="name">Name : </label>
                <span><?php if (!empty($banks[0]['name'])) echo strip_tags($banks[0]['name']) ?></span>
            </div>
            <div class="form-group">
                <label for="password">Fullname : </label>
                <span><?php if (!empty($banks[0]['fullname'])) echo strip_tags($banks[0]['fullname']) ?></span>
            </div>
            <div class="form-group">
                <label for="password">Email : </label>
                <span><?php if (!empty($banks[0]['name'])) echo  strip_tags($banks[0]['email']) ?></span>
            </div>
            <div class="form-group">
                <label for="password">Cost : </label>
                <span><?php if (!empty($banks[0]['cost'])) echo strip_tags($banks[0]['cost']) ?></span>
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
    

