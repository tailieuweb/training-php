<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';
require_once 'models/Repository.php';

$factory = new FactoryPattern();
$repository = new Repository();

$userModel = $factory->make('user');
$type = $userModel->getTypes();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = $_GET['id'];
    $user = $repository->getFullUser($_id); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($_id)) {
        $repository->updateFullUser($_POST);
    } else {
        $repository->createFullUser($_POST);
    }
    header('location: list_users.php');
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

        <?php if ($user || empty($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                </div>

                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input class="form-control" name="fullname" placeholder="Fullname" value="<?php if (!empty($user[0]['fullname'])) echo $user[0]['fullname'] ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" placeholder="Email" value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="type">Type user</label>
                    <select name="type" class="form-control">
                        <?php
                        foreach ($type as $value) {
                            if ($value['type_id'] == $user[0]['type']) {
                        ?>
                                <option selected value="<?php if (!empty($value['type_id'])) echo $value['type_id'] ?>"><?php if (!empty($value['name_type'])) echo $value['name_type'] ?></option>
                            <?php } else { ?>
                                <option value="<?php if (!empty($value['type_id'])) echo $value['type_id'] ?>"><?php if (!empty($value['name_type'])) echo $value['name_type'] ?></option>
                        <?php   }
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <?php
                if(!empty($_id)){
                    if($user[0]['id'] == $user[0]['user_id'] ){
                ?>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" name="cost" class="form-control" value="<?php if (!empty($user[0]['cost'])) echo $user[0]['cost'] ?>" placeholder="Cost">
                </div>
                <?php }} ?>
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