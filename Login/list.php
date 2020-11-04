<?php 
session_start();
$mahoacaulenh_id = md5("id");
$bang =base64_encode(base64_encode(base64_encode(base64_encode("="))));
$v = md5(" <a  style='text-decoration: none;
color: #fff;' class='btn-warning btn_click click_xem'
 href='list.php? echo a=
  echo base64_encode(a['id'])&xem=aaaa'>Xem</a>");
include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
    $results = [];
    if (isset($_GET['page'])) $page = intval($_GET['page']);
    else 
    $page = 1;
    $page = ($page > 0) ? $page : 1;
    $limit = 5;
    $offset = ($page - 1) * $limit;
    $url = 'list.php?list=%271%27';
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
// xắp xếp tăng từ a đến z
$results= [];
if (isset($_GET['list'])) {    
        $query = " SELECT * FROM `users` ORDER BY `users`.`username` ASC ";
        $results = mysqli_query($conn, $query);   
}
//sortby 
$path = explode('=', $_SERVER['REQUEST_URI']);
$id_list = $path[count($path) - 1];
if (isset($_POST['list'])) {
    $id_list = $_POST['list'];
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
// xắp xếp tăng từ a đến z
$results= [];
if (isset($_GET['list'])) {    
        $query = " SELECT * FROM `users` ORDER BY `users`.`username` ASC ";
        $results = mysqli_query($conn, $query);
}
//xem chi tiết tài khoản
$id ;
if(isset($_GET["$mahoacaulenh_id"]))
{
 $id = $_GET["$mahoacaulenh_id"];
$g_id = base64_decode(base64_decode(base64_decode(base64_decode($id))));
    $detail = " SELECT * FROM users WHERE `id` = $g_id";
    $details = mysqli_query($conn, $detail);
  $row = mysqli_fetch_array($details);
}
// hàm tìm kiếm tài khoản
$value_search;
if(isset($_GET['search']))
{
    $value_search = $_GET["search"];
    $search = " SELECT * FROM users WHERE `username` like '%$value_search%' or `email` = '$value_search'";
    $searchrs =  mysqli_query($conn, $search);
    $a = mysqli_fetch_array($searchrs);
}

//xóa tài khoản 

if(isset($_GET["$mahoacaulenh_id"]) && isset($_GET['xoa'])){
                $usern = $_GET["$mahoacaulenh_id"];
                $mh_usern = base64_decode(base64_decode(base64_decode(base64_decode($usern))));
                delete($mh_usern);
            }
?>
<html>
<head>
    <title>Register</title>
  
	<link rel="stylesheet" type="" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="public/css/styles.css">
    <link rel="stylesheet" type="" href="public/css/editstyle.css">
    <script src="./block.js"></script>
</head>
<style>
  
#block_modal{
    background-color: rgba(0, 0, 0, 0.76);
    width: 100%;
    height: 100%;
    z-index: 10;
    top:0;
    left:0;
    position: absolute;  
}
.close_moda{
    width: 100%;
    height: 100%;
    position: absolute;
}
.list_detail{
    text-align: center;
    background: #fff;
    width: 35%;
    animation: 0.5s transiton_add linear;
    border-radius: 10px;
    position: relative;
    top: 20%;
    left: 30%;
    height: 400px;
}
#form_chinh, .content {
	width: 80%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
</style>
<body>
<div class="header">
	<h2>List User</h2>
   
</div>
<div id="form_chinh">
<?php echo display_error(); 
   ?>
<form class="form_search"  method="get" style="border:none; display:inline-flex; width:100%" >

<input type="text" class="form-control" name="search" id="search" style="text-align: center;"<?php if(isset($value_search)){ ?> value = "<?php echo $value_search ?>  " <?php  } ?>   placeholder="Search...">
        <button> search</button>
<!-- <input type="submit" value="Search" class="btn_click" style="margin-left:30px; background:yellowgreen ;"> -->


</form >

                           <?php if(isset($id)){ ?>
                                <div class="row">
                                    <div class="col_8">
                                    <img class="images-fiul" src="./public/images/admin_profile.png" alt="">
                                   
                                    </div>
                                    <div class="col_4">
                                        <?php if(isset($row)==true){ ?>
                                            <p>
                                            <?php echo $row['username']; ?>
                                            </p>
                                            <p>
                                            <?php echo $row['fullname']; ?>
                                            </p>
                                            <p>
                                            <?php echo $row['email']; ?>
                                          
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                                        <?php } else {?>
             
<table id="list_danhsach">       
<tr>
    <th>STT</th>
    <th>Username</th>
    <th>FullName</th>
    <th>Email</th>
    <th>Image</th>
    <th>Chức Năng</th>
</tr>
        <?php if(isset($results))
        { foreach($results as $value): ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td ><?php echo $value['fullname']; ?></td>
                 <td><?php echo $value['email']; ?></td>
                 <td>
                            <?php
                                $img = isset( $value['image'] ) ? $value['image'] : 'public/images/no-image.png';
                                $str_out = '';
                                $str_out .= '<img src="'.$img.'" style="width: 50px"/>';
                                echo $str_out;
                            ?>
                        </td>
                 <td> <button onclick="btn_xoa()" class="btn-success btn_click click_edit"><a href="edit.php?edit=<?php echo $value['id'] ?>">Sửa</a></button>
                
             
                <a href="list.php?id=<?php echo $value['id'] ?>&xem=aa"></a>
            
                <a  style="text-decoration: none;
                  color: #fff;" class="btn-warning btn_click click_xem"
                   href="list.php?<?php echo $mahoacaulenh_id?>=
                   <?php echo base64_encode(base64_encode(base64_encode( base64_encode($value['id']))))?>&xem=aaaa">Xem</a>
                 
                    <button class="btn-danger btn_click click_xoa" >
                    <a  href="list.php?<?php echo $mahoacaulenh_id?>=
                    <?php echo base64_encode(base64_encode(base64_encode( base64_encode($value['id']))))?>&xoa=sss" onclick="return confirm('Bạn có muốn xóa không!')">xóa</a></button>               
                </td>
             </tr>
            <?php endforeach;}
            if(isset($a)){
                foreach($searchrs as $value): ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['username']; ?></td>
                        <td ><?php echo $value['fullname']; ?></td>
                         <td><?php echo $value['email']; ?></td>
                         <td>
                            <?php
                                $img = isset( $value['image'] ) ? $value['image'] : 'public/images/no-image.png';
                                $str_out = '';
                                $str_out .= '<img src="'.$img.'" style="width: 50px"/>';
                                echo $str_out;
                            ?>
                        </td>
                         
                        <td> <button onclick="btn_xoa()" class="btn-success btn_click click_edit"><a href="edit.php?edit=<?php echo $value['id'] ?>">Sửa</a></button>
                
             
                <a href="list.php?id=<?php echo $value['id'] ?>&xem=aa"></a>
            
                <a  style="text-decoration: none;
                  color: #fff;" class="btn-warning btn_click click_xem"
                   href="list.php?<?php echo $mahoacaulenh_id?>=
                   <?php echo base64_encode(base64_encode(base64_encode( base64_encode($value['id']))))?>&xem=aaaa">Xem</a>
                 
                    <button class="btn-danger btn_click click_xoa" >
                    <a  href="list.php?<?php echo $mahoacaulenh_id?>=
                    <?php echo base64_encode(base64_encode(base64_encode( base64_encode($value['id']))))?>&xoa=sss" onclick="return confirm('Bạn có muốn xóa không!')">xóa</a></button>               
                </td>
                     </tr>
                    <?php endforeach;
            }      
            ?>
             </table> 
        <?php }?>
        <?php if ($search == "") : ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            <?php endif; ?>
                    <div class="back" style="text-align: center">
                        <input  style=" border-radius=5px; padding ; backgroud=red;" type="button" value="Back" onClick="javascript:history.go(-1)" />
                       
                    </div>

        </div >

</body>
</html>