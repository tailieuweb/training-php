<?php
session_start();

include('functions.php');

$results = [];
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_GET['list'])) {
    if (isAdmin()) {
        $query = "SELECT * FROM users";
        $results = mysqli_query($conn, $query);
    }
}

?>

<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="header">
        <div class="row">
                <div class="col-md-12">
                <a href="list.php"> <h2 style="color: #fff;">List User</h2> </a>
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
                        <th scope="col">Username
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) : ?>
                        <tr scope="row">
                            <td><img src="./public/images/<?php echo $result['image'];?>" class="img-fluid" alt=""     style="width:50px; height:50px;"></td>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['fullname']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td>
                                <a href="./userdetail.php?id=<?php echo base64_encode($result['id']) ;?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                <a href='./edit.php?id=<?php echo base64_encode($result['id']) ; ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href='delete_user.php?id=<?php echo base64_encode($result['id']) ; ?>' name="delete_user"><i class="fa fa-times" aria-hidden="true" onClick="return confirm('Nhấn oke để xoá.')"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        <div class="back" style="text-align: center">
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
            <a href="admin.php" class="btn btn-info">Add User ++</a>
        </div>
    </div>
</body>
</html>