<?php
session_start();
include('functions.php');

$id = base64_decode(isset($_GET['id']) ? $_GET['id'] : '');

if($id == ''){
    header("location: list.php");
}
else{
    $result = getUserById($id);
    if($result == []){
        header("location: list.php");
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Detail</h2>
        </div>
        <form>
            <?php echo display_error(); ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full name</th>
                        <th scope="col">User type</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>

                    <tr scope="row">
                    <td><img src="./public/images/<?php echo $result['image'];?>" class="img-fluid" alt="" style="width:50px; height:50px;"></td>
                        </td>
                        <td><?php echo $result['id']; ?></td>
                        <td><?php echo $result['username']; ?></td>
                        <td><?php echo $result['fullname']; ?></td>
                        <td><?php echo $result['user_type']; ?></td>
                        <td><?php echo $result['email']; ?></td>

                    </tr>

                </tbody>
            </table>

        </form>
        <div class="back" style="text-align: center">
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>

        </div>
    </div>
</body>

</html>