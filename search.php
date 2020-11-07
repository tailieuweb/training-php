<?php
session_start();
include('functions.php');

// $results = [];
// $keyword = isset($_GET['keyword']);

// $results = search($keyword);

$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = escape($_GET['keyword']);
}
$listsearch = searchUser($keyword);

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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($keyword != '') {
                        foreach ($listsearch as $result) : ?>

                            <tr scope="row">
                            <td><img src="./public/images/<?php echo $result['image'];?>" class="img-fluid" alt="" style="width:50px; height:50px;"></td>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><?php echo $result['fullname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td>
                                    <a href="detail.php/<?php echo $result['username'] . '-' . $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                    <a href="admin.php?id=<?php echo $result['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a href="delete.php?id=<?php echo $result['id'] ?>" onclick="return onDelete()"><i class="fa fa-times" aria-hidden="true"></i></a>

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