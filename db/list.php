<?php
session_start();

include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (!isAdmin()) {
    $_SESSION['msg'] = "You have no authority to perform this action";
    header('location: index.php');
}

$results = [];

if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 5;
$offset = ($page - 1) * $limit;
$url = 'list.php?list=6';

$option_id_desc = array(
    'order_by' => 'id DESC',
    'limit' => $limit,
    'offset' => $offset,
);
$option_id_asc = array(
    'order_by' => 'id ASC',
    'limit' => $limit,
    'offset' => $offset,
);


// Gán hàm addslashes để chống sql injection
isset($_GET['search']) ? $search = addslashes($_GET['search']) : $search = "";
$options_search = array(
    'where' => "username LIKE '%" . ($search) . "%' or fullname like '%" . ($search) . "%'",
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id ASC'
);
$query = "SELECT * FROM users WHERE username LIKE '%$search%' OR fullname LIKE '%$search%' OR email LIKE  '%$search%'";
global $conn;
$sql = mysqli_query($conn, $query);
$num = mysqli_num_rows($sql);

//sortby 
$path = explode('=', $_SERVER['REQUEST_URI']);
$id_list = $path[count($path) - 1];
if (isset($_POST['list'])) {
    $id_list = $_POST['list'];
}
if (isAdmin()) {
    $id_list == 5 ? $_SESSION['results_user'] = get_by_options('users', $option_id_desc)
        : $_SESSION['results_user'] = get_by_options('users', $option_id_asc);
}

//pagination
if ($search != "") {
    $total_rows = get_total('users', $options_search);
} else {
    $id_list == 5 ? $total_rows = get_total('users', $option_id_asc)
        : $total_rows = get_total('users', $option_id_desc);
}
$total = ceil($total_rows / $limit);
$pagination = pagination_admin($url, $page, $total);

?>

<html>

<head>
    <title>List User</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <!-- notification message -->
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
        <div class="header">
            <h2>List User</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="list.php?list=" method="post">
                    <div class="input-group">
                        <label>Sort By:</label>
                        <select class="form-control" name="list" id="list">
                            <option name="list" value="6">ID ASC</option>
                            <option name="list" value="5">ID DESC</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="list.php" method="get">
                    <div class="input-group">
                        <label>Search:</label>
                        <input type="text" name="search" />
                    </div>
                    <button type="submit" name="ok" value="<?php isset($_GET['search']) ? $_GET['search'] : "search" ?>" class="btn btn-info">Search</button>
                </form>
            </div>
        </div>
        <br>
        <form>
            <?php echo display_error(); ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_REQUEST['ok'])) {
                        if ($search == "") {
                            header("location: list.php");
                        } elseif ($num > 0) {
                            echo "$num kết quả trả về với từ khóa '<b>$search</b>'";
                            while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <tr scope="row">
                                    <td><?php echo $result['id']; ?></td>
                                    <td><?php echo $result['username']; ?></td>
                                    <td><?php echo $result['fullname']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td>
                                        <a href="userinfo.php?user_id=<?= getLink($result['id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="edit.php?edit=<?= getLink($result['id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="delete.php?user_id=<?= getLink($result['id']) ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                    <!-- chức năng thêm xóa sửa chưa được mã hóa ID dễ dàng bị tấn công CSRF -->
                                    <!-- 
                                        <td>
                                        <a href="userinfo.php?user_id=<?= $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="edit.php?edit=<?= $result['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="delete.php?user_id=<?= $result['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                     -->
                                </tr>
                        <?php  }
                        } else {
                            echo "Khong tim thay ket qua!";
                        }
                        ?>

                        <?php } else {
                        foreach ($_SESSION['results_user'] as $result) : ?>
                            <tr scope="row">
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><?php echo $result['fullname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td>
                                    <a href="userinfo.php?user_id=<?= getLink($result['id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="edit.php?edit=<?= getLink($result['id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="delete.php?user_id=<?= getLink($result['id']) ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                                <!-- chức năng thêm xóa sửa chưa được mã hóa ID dễ dàng bị tấn công CSRF -->
                                <!-- 
                                        <td>
                                        <a href="userinfo.php?user_id=<?= $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="edit.php?edit=<?= $result['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="delete.php?user_id=<?= $result['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                     -->
                            </tr>
                    <?php
                        endforeach;
                    }
                    ?>

                </tbody>
            </table>
            <?php if ($search == "") : ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            <?php endif; ?>
        </form>
        <div class="back" style="text-align: center; padding-top: 10px;">
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
        </div>
    </div>
</body>

</html>