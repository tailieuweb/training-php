<?php
// Start the session
session_start();
//1-b
require_once 'models/FactoryPattern.php';
$factory = new FactoryPattern();
$userModel = $factory->make('user');
$bankModel = $factory -> make('bank');
<<<<<<< HEAD

$type = "user";
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] =  $keyword; 
=======
function clean($string) {
    $string = preg_replace('/[^A-Za-z0-9]/', '', $string); // Removes special chars.
    return preg_replace('/ +/', ' ', $string);
 }
$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = strip_tags($_GET['keyword']);
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
}
//feature 1-a
$users = $userModel->getUsers($params);
function getName($n) {
    $characters = '162379812362378dhajsduqwyeuiasuiqwy460123';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

function Xulyid($id){
    $dodaichuoi = strlen($id);
    $chuoitruoc = getName(23);
    $chuoisau = getName(9);
    $handle_id = $chuoitruoc.$id. $chuoisau;
    return $handle_id;
}

?>  
<!DOCTYPE html>
<html>
<head>
    <title>home - <?php echo $type?></title>
    <?php include 'views/meta.php' ?>
</head>
    <?php include 'views/header.php';?>
<body>
    <div class="container">
        <?php if (!empty($users) && !empty($type)) {?>
            <div class="alert alert-warning" role="alert">
                List of users!<br>
                Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 0; foreach ($users as $user) { $index++;$bankValue = $bankModel->SelectCostByUserId($user['id']);$handle_id =Xulyid($user['id']);?>
                        <tr>
                            <th scope="row"><?php echo $index?></th>
                            <td>
                                <?php echo Strip_tags($user['name'])?>
                            </td>
                            <td>
                                <?php echo Strip_tags($user['fullname'])?>
                            </td>
                            <td>
                                <?php echo Strip_tags($user['type'])?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo $handle_id ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo $handle_id  ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_user.php?id=<?php echo $handle_id ?>">
                                    <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                                </a>
                                <a href="delete_bank.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-money" aria-hidden="true" title="Delete Cost"></i>
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
