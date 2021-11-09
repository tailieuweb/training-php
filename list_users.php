<?php
// Start the session
session_start();

require_once 'models/FactoryPattern.php';
$factory = FactoryPattern::getInstance();
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}


$repository = $factory->make('user-repository');
if ($repository->userModel == !400) {
    $users = $repository->getUsersWithBank($params);
} else {
    $mes = "Sai mật khẩu Database..!";
}


$token = md5(rand(0, 7777777) . "TEAMJ");


?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <div class="alert alert-warning" role="alert">

            List of users! <br>
            <?php echo $mes ?>
        </div>
        <?php if (!empty($users)) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <th scope="row"><?php echo $user['id'] ?></th>
                    <td>
                        <?php echo $user['name'] ?>
                    </td>
                    <td>
                        <?php echo $user['fullname'] ?>
                    </td>
                    <td>
                        <?php echo $user['email'] ?>
                    </td>
                    <td>
                        <?= number_format($user['cost']) . ' $' ?>
                    </td>
                    <td>
                        <?php echo $user['type'] ?>
                    </td>
                    <td>
                        <a href="form_user.php?id=<?php echo md5($user['id'] . 'TeamJ-TDC') ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                        </a>
                        <a href="view_user.php?id=<?php echo md5($user['id'] . 'TeamJ-TDC') ?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>

                        <a
                            href="delete_user.php?id=<?php echo md5($user['id'] . 'TeamJ-TDC') ?>& token=<?php echo $token ?>">
                            <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                            <?php
                                    $_SESSION['_token'] = $token;
                                    ?>
                        </a>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="alert alert-dark" role="alert">
            This is a dark alert—check it out!
        </div>
        <?php } ?>
    </div>
    <script>
    function confirmDelete(delUrl) {
        if (confirm("Are you sure you want to delete")) {
            document.location = delUrl;
        }
    }
    </script>
</body>

</html>