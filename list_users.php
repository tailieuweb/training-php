<?php
// Start the session
session_start();
require_once 'models/FactoryPattern.php';

$factory = new FactoryPattern();

$userModel = $factory->make('user');

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$users = $userModel->getUsers($params);




// $input = 1;
// $input['name'] = 'testnoname1';

// $input['fullname'] = 'testnoname';
// $input['email'] = 'testnoname';
// // $input['type'] = 'user';
// $input['password'] = 'testnoname';

// $result = $userModel->insertUser($input);
// if($result){
//     echo 'add success';
// }
// else echo 'add failed';


// $input['name'] = 'thuong2';
// $input['fullname'] = 'tpthuong';
// $input['email'] = 'email';
// $input['type'] = 'user';
// $input['password'] = "123";

// $insert = $userModel->insertUser($input);
// if(empty($input)){
//     echo 'input rỗng';
//   }
//   else{
//       echo 'input ko rỗng';
//   }

//   if (!empty($input['password']) && !empty($input['name']) && !empty($input['type'])) {
//     echo 'input is not empty';
//   }else{
//       echo 'input is empty';
//   }
// die();


// echo'<br>keyword'. $params['keyword'];
// if(!isset($params['keyword'])){
//     echo'<br>input rỗng ';
// }


// $params1 = [];
// $params1['keyword'] = 1;
// $alo = [];
// echo 'size: '. count($alo);
// $alo['keyword'] = 1;
// $data = $userModel->getUsers($alo);
//  echo 'size: '.count($users). '<br>';
// $users1[] = null;
// //  echo ($users).'<br>';
// echo '<br>';
// echo '<br>'.count($users).'<br>';
// //  die();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if (!empty($users)) {
                if(is_string($users)){
        ?>
        <div class="alert alert-dark" role="alert">
                Not Found User!
            </div>
        <?php exit();} ?>
            <div class="alert alert-warning" role="alert">
                List of users! <br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>
                        <tr>
                            <th scope="row"><?php echo $user['id']?></th>
                            <td>
                                <?php echo $user['name']?>
                            </td>
                            <td>
                                <?php echo $user['fullname']?>
                            </td>
                            <td>
                                <?php echo $user['type']?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <div class="alert alert-dark" role="alert">
                Not Found User!
            </div>
        <?php } ?>
    </div>
</body>
</html>