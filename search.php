<?php
session_start();
include('functions.php');

//Chỉ cho nhập chữ, số và khoảng trắng
$pattern = '/^[a-zA-Z0-9\s]*$/';
$keyword = '';
if (isset($_GET['keyword'])) {
    if (preg_match($pattern, $_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
}
$listSearch = searchUser($keyword);

if(isset($_POST['delete']) && isset($_POST['id'])){
    $id = base64_decode(base64_decode(base64_decode($_POST['id'])));
    $result = getUserById($id);

    if($result['user_type'] != 'admin'){
        
        if($_SESSION['token' .$id] == $_POST['token' .$id]){
            deleteUser($id);
        }
        else{
            header("location: list.php");
        }       
    }
    else{
        $_SESSION['success'] = "Don't delete admin";
    }
}
?>

<html>

<head>
    <title>Register</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script>
        function onDelete() {
            return confirm("Do you want to delete?");
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="row">
                <div class="col-md-6">
                    <h2>List User</h2>
                </div>
                <div class="col-md-6">
                    <form action="search.php" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-top: 10px">Search</button>
                    </form>
                </div>
            </div>
        </div>


        <form>
            <?php echo display_error(); ?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success">
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">AVT</th>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($keyword != '') {
                        foreach ($listSearch as $result) : ?>

                            <tr scope="row">
                            <td><img src="./public/images/<?php echo $result['image'];?>" class="img-fluid" alt="" style="width:50px; height:50px;"></td>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><?php echo $result['fullname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td>
                                    <form></form>
                                    <form action="userdetail.php" method="post">

                                    <input type="hidden" name="id" value="<?php echo base64_encode($result['id'])?>">
                    
                                    <button type="submit" name="detail" class="btn btn-primary">
                                    <i class="fa fa-eye"></i></button>
                                </td>
                                <td>
                                    <form></form>
                                    <form action="edit.php" method="post">

                                    <input type="hidden" name="id" 
                                    value="<?php echo base64_encode(base64_encode($result['id']))?>">

                                    <button type="submit" name="edit" class="btn btn-primary">
                                    <i class="fa fa-pencil-square-o"></i></button>
                                </td>
                                <td>
                                    <form></form>
                                    <form action="" method="post">
                                    <input type="hidden" name="id" 
                                    value="<?php echo base64_encode(base64_encode(base64_encode($result['id'])))?>">
                                    <?php 
                                        $token = random(6);
                                        $_SESSION['token' .$result['id']] = $token;                 
                                    ?>
                                    <input type="hidden" name="<?php echo 'token' .$result['id']?>" 
                                    value="<?php echo $token ?>">       
                                    <button type="submit" name="delete" class="btn btn-primary" 
                                    onClick="return confirm('Nhấn oke để xoá')"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                        <?php endforeach;
                    } else { ?>
                        <td>No results</td>
                    <?php } ?>

                </tbody>
            </table>

        </form>
        <div class="back" style="text-align: center">
            <a class="btn btn-info" href="list.php?list='1'">Back</a>

        </div>
    </div>
</body>

</html>