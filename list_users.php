<?php
// Start the session
session_start();
spl_autoload_register(function($class){
    require './models/' . $class . '.php';
});

//$userModel = $factory->make('user');
$userModel = UserModel::getInstance();

$key_code = "sdaknAnN67KbNJ234NK8oa2";

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword']; 
<<<<<<< HEAD
}
<<<<<<< HEAD

if(isset($_GET['success'])){
    echo "<script>alert('!!! Cập nhật thành công !!!')</script>";
    echo "<script>window.location.href = 'list_users.php'</script>";
}

if(isset($_GET['err'])){
    echo "<script>alert('Có vẻ như dữ liệu của bạn đã được thay đổi trước đó rồi!!! Vui lòng kiểm tra lại dữ liệu')</script>";
    echo "<script>window.location.href = 'list_users.php'</script>";
}
=======
}
$token = md5(uniqid());
>>>>>>> 1-php-202109/2-groups/4-D/5-15-Huy-phpunit
=======
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
echo 'User Real IP Address - '.$ip;  
>>>>>>> 1-php-202109/2-groups/4-D/2-51-Vinh-phpunit
$users = $userModel->getUsers($params);

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
    
        <?php if (!empty($users)) {?>
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
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
<<<<<<< HEAD
                    <?php foreach ($users as $user) {?>
<<<<<<< HEAD
                      
=======

                    <?php 
                     foreach ($users as $user) {?>
>>>>>>> 1-php-202109/2-groups/4-D/5-15-Huy-phpunit
                        <tr>
                            <th scope="row"><?php echo $user['id']?></th>
                            <td>
                                <?php echo $user['name'];?>

=======
                        <tr>
                            <th scope="row"><?php echo $user['id']?></th>
                            <td>
                                <?php echo strip_tags($user['name'])?>
>>>>>>> 1-php-202109/2-groups/4-D/2-51-Vinh-phpunit
                            </td>
                            <td>
                                <?php echo ($user['fullname'])?>
                            </td>
                            <td>
                                <?php echo ($user['email'])?>
                            </td>
                            <td>
                                <?php echo ($user['type'])?>
                            </td>
                            <td>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="form_user.php?id=<?php echo base64_encode($key_code.$user['id'])?>">
=======
                                <a href="form_user.php?id=<?php echo base64_encode(rand(100,999).$user['id'].rand(10,99)) ?>&version=<?php echo $user['version']?>">
>>>>>>> 1-php-202109/2-groups/4-D/5-15-Huy-phpunit
=======
                                <a href="form_user.php?id=<?= $user['id'] ?>">
>>>>>>> 1-php-202109/2-groups/4-D/2-51-Vinh-phpunit
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?= $user['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
<<<<<<< HEAD
<<<<<<< HEAD
                                <a href="delete_user.php?id=<?php echo base64_encode($key_code.$user['id'])?>">
=======
                                <a href="delete_user.php?id=<?php echo base64_encode(rand(100,999).$user['id'].rand(10,99))?>&token=<?php echo $token?>">                              
                                <?php $_SESSION['token'] = $token;
                                // var_dump($_SESSION['token']);var_dump($token);?>
>>>>>>> 1-php-202109/2-groups/4-D/5-15-Huy-phpunit
=======
                                <a href="delete_user.php?id=<?= $user['id']?>">
>>>>>>> 1-php-202109/2-groups/4-D/2-51-Vinh-phpunit
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else { ?>
            <div class="alert alert-dark" role="alert">
                This is a dark alert—check it out!
            </div>
        <?php } ?>
    </div>
</body>
</html>
