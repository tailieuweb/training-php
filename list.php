<?php
session_start();

include('functions.php');
if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
$results = [];

if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 2;
$offset = ($page - 1) * $limit;
$url = 'list.php?';

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
$query = "SELECT * FROM users WHERE username LIKE '%$search%' OR fullname LIKE '%$search%' ";
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
    $id_list == 1 ? $_SESSION['results_user'] = get_by_options('users', $option_id_desc)
        : $_SESSION['results_user'] = get_by_options('users', $option_id_asc);
}

//pagination
if ($search != "") {
    $total_rows = get_total('users', $options_search);
} else {
    $id_list == 1 ? $total_rows = get_total('users', $option_id_asc)
        : $total_rows = get_total('users', $option_id_desc);
}

$total = ceil($total_rows / $limit);
$pagination = pagination_admin($url, $page, $total);
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
            <h2>List User</h2>
        </div>
        <form action="search.php" method="GET"  placeholder="Nhập thông tin cần tìm"> 
    <input type="text" name="username" /> 
    <input type="submit" value="Search" /> 
</form>
    <div class="row">
        <div class="col-md-12">
                
                <form action="list.php?list=" method="post">
                    <div class="input-group">
                        <label>Sort By:</label>
                        <select class="form-control" name="list" id="list">
                            <option name="list" value="2">ascending</option>
                            <option name="list" value="1">decrease</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
        </div>
    </div>
        
        <form >
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
                            echo "$num ket qua tra ve voi tu khoa '<b>$search</b>'";
                            while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <tr scope="row">
                                    <td><?php echo $result['id']; ?></td>
                                    <td><?php echo $result['username']; ?></td>
                                    <td><?php echo $result['fullname']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td>
                                        <a href="userinfo.php?user_id=<?= $result['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="edituserid.php?id=<?php echo $result['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="delete.php?user_id=<?= $result['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
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
                                <td class="fix_overtext"><?php echo $result['username']; ?></td>
                                <td  class="fix_overtext"><?php echo $result['fullname']; ?></td>
                                <td  class="fix_overtext"><?php echo $result['email']; ?></td>
                                <td>
                                    
                                <a href="chitiet.php?id=<?php echo $result['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
						
                        <a href="edituserid.php?id=<?php echo $result['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <a href="delete.php?id=<?php echo $result['id']?>" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
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
            <?php endif;
             ?>

        </form>
        <div class="back" style="text-align: center">
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
          
        </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Are you delete?')){
                    e.preventDefault();
                    return false;
                 }
                return true;
            });
        });
</script>
    </body>
</html>