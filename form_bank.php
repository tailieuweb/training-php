<?php
// Start the session
session_start();
require_once 'DesignPattern/FactoryPattern.php';
$factory = new FactoryPattern();
$bankModel = $factory->make('bank');

$bank = NULL; //Add new bank
$_id = NULL;
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    
}
$banks = $bankModel->getbanks($params);

if (!empty($_GET['id'])) {
    foreach ($banks as $bank1) {
        if($_GET['id'] == md5($bank1['id'])){                      
            $_id = $bank1['id'];    
        }
    }  
    $bank = $bankModel->findbankById($_id);//Update existing bank
}


if (!empty($_POST['submit'])) {
    if (!empty($_id)) {
        if(isset($_POST['version'])&&$_POST['version']==md5($bank[0]['version'])){            
                $bankModel->updatebank($_POST);
            
            header('location: list_banks.php');
        }
        else{
        echo '<script>alert("Version đã thay đổi, vui lòng làm mới trang!");</script>';
            header('Refresh:3');
        }
    } else {
        $bankModel->insertbank($_POST);
        header('location: list_banks.php');
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>bank form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
    <p><?php if(isset($bank[0]['version'])) echo 'Version: ' . $bank[0]['version'] ?></p>
            <?php if ($bank || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    bank form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="user_id">User ID</label>
                        <input class="form-control" name="user_id" placeholder="user_id" value='<?php if (!empty($bank[0]['user_id'])) echo $bank[0]['user_id'] ?>'>
                        <label for="cost">Cost</label>
                        <input class="form-control" name="cost" placeholder="Cost" value="<?php if (!empty($bank[0]['cost'])) echo $bank[0]['cost'] ?>">
                    </div>
                    <input type="hidden" name="version"
                    value="<?php if (!empty($bank[0]['version'])) echo md5($bank[0]['version']) ?>">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    bank not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>