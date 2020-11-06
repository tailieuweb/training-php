<?php
session_start();

include('functions.php');
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
$results = [];


// Gán hàm addslashes để chống sql injection
isset($_GET['search']) ? $search = addslashes($_GET['search']) : $search = "";
$query = "SELECT * FROM users WHERE username LIKE '%$search%' OR fullname LIKE '%$search%' ";
global $conn;
$sql = mysqli_query($conn, $query);
$num = mysqli_num_rows($sql);


?>




<html>

<head>
    <title>List User</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet/less" type="text/css" href="public/css/style.less" />
    <script type="text/javascript" src="public/js/less.min.js"></script>
    <?php
    $rowperpage = 4;
    $row = 0;

    // Previous Button
    if (isset($_POST['but_prev'])) {
        $row = $_POST['row'];
        $row -= $rowperpage;
        if ($row < 0) {
            $row = 0;
        }
    }

    // Next Button
    if (isset($_POST['but_next'])) {
        $row = $_POST['row'];
        $allcount = $_POST['allcount'];

        $val = $row + $rowperpage;
        if ($val < $allcount) {
            $row = $val;
        }
    }

    // generating orderby and sort url for table header
    function sortorder($fieldname)
    {
        $sorturl = "?order_by=" . $fieldname . "&sort=";
        $sorttype = "asc";
        if (isset($_GET['order_by']) && $_GET['order_by'] == $fieldname) {
            if (isset($_GET['sort']) && $_GET['sort'] == "asc") {
                $sorttype = "desc";
            }
        }
        $sorturl .= $sorttype;
        return $sorturl;
    }
    ?>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>List User</h2>
        </div>
        <form action="search.php" method="GET" placeholder="Nhập thông tin cần tìm">
            <input type="text" name="username" />
            <input type="submit" value="Search" />
        </form>


        <?php echo display_error(); ?>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><a href="<?php echo sortorder('id'); ?>">ID</a></th>
                        <th>Images</th>
                        <th scope="col"><a href="<?php echo sortorder('username'); ?>">Username</a></th>
                        <th scope="col"><a href="<?php echo sortorder('fullname'); ?>">FullName</a></th>
                        <th scope="col"><a href="<?php echo sortorder('email'); ?>">Email</a></th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <?php
                // count total number of rows
                $sql = "SELECT COUNT(*) AS cntrows FROM users";
                $result = mysqli_query($conn, $sql);
                $fetchresult = mysqli_fetch_array($result);
                $allcount = $fetchresult['cntrows'];

                // selecting rows
                $orderby = " ORDER BY id desc ";
                if (isset($_GET['order_by']) && isset($_GET['sort'])) {
                    $orderby = ' order by ' . $_GET['order_by'] . ' ' . $_GET['sort'];
                }
                ?>

                <tbody>
                    <?php
                    if (isset($_REQUEST['ok'])) {
                        if ($search == "") {
                            header("location: list.php");
                        } elseif ($num > 0) {
                            echo "$num ket qua tra ve voi tu khoa '<b>$search</b>'";
                            while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <tr scope="row">
                                    <td><?php echo $result['id']; ?></td>
                                    <td><img src="./public/images/<?php echo $result['image_profile'] ?> " height="30" width="30" alt=""></td>
                                    <td><?php echo $result['username']; ?></td>
                                    <td><?php echo $result['fullname']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td>
                                        <a href="userinfo.php?user_id=<?= md5($result['id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="edituserid.php?id=<?php echo md5($result['id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="delete.php?user_id=<?= md5($result['id']) ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                        <?php  }
                        } else {
                            echo "Khong tim thay ket qua!";
                        }
                        ?>

                        <?php } else {
                        // fetch rows
                        $sql = "SELECT * FROM users " . $orderby . " limit $row," . $rowperpage;
                        $result = mysqli_query($conn, $sql);
                        //$sno = $row + 1;
                        while ($fetch = mysqli_fetch_array($result)) {
                            $id = $fetch['id'];
                            $username = $fetch['username'];
                            $fullname = $fetch['fullname'];
                            $email = $fetch['email'];
                            $image = $fetch['image_profile'];
                        ?>


                            <tr scope="row">
                                <td><?php echo $id; ?></td>
                                <td><img src="./public/images/<?php echo $image ?> " height="30" width="30" alt=""></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $fullname; ?></td>
                                <td><?php echo $email; ?></td>

                                <td>

                                    <a href="chitiet.php?id=<?php echo md5($id) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                    <a href="edituserid.php?id=<?php echo md5($id) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a href="delete.php?id=<?php echo md5($id) ?>" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                    <?php

                        }
                    }
                    ?>

                </tbody>
            </table>
            <form method="post" action="">
                <div id="div_pagination">
                    <input type="hidden" name="row" value="<?php echo $row; ?>">
                    <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                    <input type="submit" class="btn " name="but_prev" value="Previous">
                    <input type="submit" class="btn " name="but_next" value="Next">
                </div>
            </form>
        </div>
        <div class="back" style="text-align: center">
            <button type="button" class="btn " onClick="javascript:history.go(-1)">Back</button>

        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script language="JavaScript" type="text/javascript">
        $(document).ready(function() {
            $("a.delete").click(function(e) {
                if (!confirm('Are you delete?')) {
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>
</body>

</html>