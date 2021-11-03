<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';
require 'models/Repositories.php';

$repositories = new Repositories();
//
//$input['name'] = "name nek";
//$input['fullname'] = "full name nek";
//$input['email'] = "email@email.com";
//$input['type'] = "user";
//$input['password'] = "1234";

//$repositories->createAUser($input);
$userModel = FactoryPattern::make("user");

$user = NULL; //Add new user
$uuid = NULL;

if (!empty($_GET['uuid'])) {
    $uuid = $_GET['uuid'];
    $user = $userModel->findUserByUUId($uuid); // Update existing user
}


if (!empty($_POST['submit'])) {


    if (!empty($uuid)) {

        $_id = substr($_POST['id'], 4, strlen($_POST['id']) - 8);
        $_user = $userModel->findUserById($_id);

        if ($_POST['version'] == md5($_user[0]['version'])) {
            $_POST['id'] = $_id;
            $_POST['version'] = $_user[0]['version'];
            $userModel->updateUser($_POST);
            header('location: list_users.php');
        } else {
            // $value_not_change = json_decode(base64_decode($_POST['value_not_change']), true);
            // $value_not_change = $_POST;
            // 'name' => string '111 ' (length=4)
            // 'fullname' => string '111' (length=3)
            // 'email' => string 'lav@gmail.com' (length=13)
            // 'type' => string 'admin' (length=5)
            // 'password' => string '698d51a19d8a121ce581499d7b701668' (length=32)
            // 'version' => string '1' (length=1)

            // var_dump($_POST);
            // echo "<br/>===================<br/>";
            // var_dump($value_not_change);
            // echo "<br/>===================<br/>";
            // var_dump($_user[0]);
            $user[0] = $_user[0];
        }
    } else {
//        $userModel->insertUser($_POST);
        $repositories->createAUser($_POST);
        header('location: list_users.php');
    }

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

    <?php if ($user || !isset($uuid)) { ?>
        <div class="alert alert-warning" role="alert">
            User form
        </div>
        <form method="POST">
            <?php if (!empty($uuid)) : ?>
                <input type="hidden" name="uuid" value="<?php echo $uuid ?>">
            <?php endif; ?>
            <?php if (!empty($user[0]['id'])) : ?>
                <input type="hidden" name="id"
                       value="<?php echo rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . strip_tags($user[0]['id']) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) ?>">
            <?php endif; ?>
            <?php if (!empty($user[0]['version'])) : ?>
                <input type="hidden" name="version" value="<?php echo md5($user[0]['version']) ?>">
            <?php endif; ?>
            <?php if (!empty($user[0])) : ?>
                <input type="hidden" name="value_not_change" value="<?php echo base64_encode(json_encode($user[0])) ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Name"
                       value="<?php if (!empty($user[0]['name'])) echo strip_tags($user[0]['name']) ?>">
            </div>
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input name="fullname" class="form-control" placeholder="Fullname"
                       value="<?php if (!empty($user[0]['fullname'])) echo strip_tags($user[0]['fullname']) ?>">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <!-- <input type="password" name="password" class="form-control" placeholder="password" value="<?php //if (!empty($user[0]['password'])) echo $user[0]['password']
                ?>"> -->
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email"
                       value="<?php if (!empty($user[0]['email'])) echo strip_tags($user[0]['email']) ?>">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" uuid="type" class="form-control">

                    <option value="" selected disabled>Select type</option>

                    <option value="admin" <?php if (!empty($user[0]['type']) && $user[0]['type'] == "admin") echo "selected" ?>>
                        Admin
                    </option>

                    <option value="user" <?php if (!empty($user[0]['type']) && $user[0]['type'] == "user") echo "selected" ?>>
                        User
                    </option>

                    <option value="guest" <?php if (!empty($user[0]['type']) && $user[0]['type'] == "guest") echo "selected" ?>>
                        Guest
                    </option>

                </select>
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