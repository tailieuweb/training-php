<?php
session_start();

include('functions.php');
 
$results = [];
$id = isset($_GET['id']) ? $_GET['id'] : '';

// if (isset($_GET['list'])) {
//     if (isAdmin()) {
//         $query = "SELECT * FROM users";
//         $results = mysqli_query($conn, $query);
//     }
// }

$page = 1; //khởi tạo trang ban đầu
$limit = 2; //số bản ghi trên 1 trang (2 bản ghi trên 1 trang)


$arrs_list = mysqli_query($conn, "SELECT id from users");
$total_record = mysqli_num_rows($arrs_list); //tính tổng số bản ghi có trong bảng khoahoc

$total_page = ceil($total_record / $limit); //tính tổng số trang sẽ chia

//xem trang có vượt giới hạn không:
if (isset($_GET["list"]))
    $page = $_GET["list"]; //nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
if ($page < 1) $page = 1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
if ($page > $total_page) $page = $total_page; //nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng

//tính start (vị trí bản ghi sẽ bắt đầu lấy):
$start = ($page - 1) * $limit;

//lấy ra danh sách và gán vào biến $arrs:

$sort = '';
$attr = '';
$arrs = [];
if(isset($_GET['sort']) && isset($_GET['attr'])){
    $sort = escape($_GET['sort']);
    $attr = escape($_GET['attr']);
    if(($sort == 'desc' && ($attr == 'username' || $attr == 'fullname')) || ($sort == 'asc' && ($attr == 'username' || $attr == 'fullname')))
    {
        $sql = "SELECT * FROM users ORDER BY $attr $sort limit $start,$limit";
    }  
    else{
        $sql = "SELECT * from users limit $start,$limit";
    } 
    
    
}
else{
    $sql = "SELECT * from users limit $start,$limit";
}
$arrs = mysqli_query($conn,$sql);

if(isset($_POST['delete']) && isset($_POST['id']) && $_SESSION['token'] == $_POST['token']){
    deleteUser(base64_decode($_POST['id']));
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
                <div class="col-md-6">
                <a href="list.php"> <h2 style="color: #fff;">List User</h2> </a>
            
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
                        
                        <th scope="col">Username
                        <?php if($sort=='desc' && $attr=='username'){?>
                            <a href="?sort=asc&attr=username" class="fa fa-sort-alpha-asc">
                        <?php } else{?>
                            <a href="?sort=desc&attr=username" class="fa fa-sort-alpha-desc">
                        <?php }?>
                        </th>
                
                        <th scope="col">Full name
                        <?php if($sort=='desc' && $attr=='fullname'){?>
                            <a href="?sort=asc&attr=fullname" class="fa fa-sort-alpha-asc">
                        <?php } else{?>
                            <a href="?sort=desc&attr=fullname" class="fa fa-sort-alpha-desc">
                        <?php }?></th>

                        <th scope="col">Email</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>   
                </thead>
                <tbody>
                    <?php foreach ($arrs as $arr) : ?>
                   <?php if(isset($_SESSION['count' .$arr['id']])){
                       unset($_SESSION['count' .$arr['id']]);
                }
                       ?>
                        <tr scope="row">
                            <td><img src="./public/images/<?php echo $arr['image'];?>" class="img-fluid" alt=""     style="width:50px; height:50px;"></td>
                            <td><?php echo $arr['id']; ?></td>
                            <td><?php echo $arr['username']; ?></td>
                            <td><?php echo $arr['fullname']; ?></td>
                            <td><?php echo $arr['email']; ?></td>
                            <td>
                                <a href="./userdetail.php?id=<?php echo base64_encode($arr['id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                <a href='./edit.php?id=<?php echo base64_encode($arr['id']) ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
                                <!-- <a href='delete_user.php?id=<?php echo base64_encode($arr['id']) ; ?>' name="delete_user"><i class="fa fa-times" aria-hidden="true" onClick="return confirm('Nhấn oke để xoá.')"></i></a>              -->
                            </td>
                            <td>
                                <form></form>
                                <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo base64_encode($arr['id'])?>">
                                <?php 
                                $token = md5(random(6));
                                $_SESSION['token'] = $token;
                                ?>
                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                <button type="submit" name="delete" class="btn btn-primary" onClick="return confirm('Nhấn oke để xoá.')">Delete</button>
                            </td>
                        
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        <div style="text-align: center">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li <?php if ($page == $i) echo "class='active'"; ?>>

                    <?php if($sort == 'desc' && $attr == 'username'){?>

                        <a href="?sort=desc&attr=username&list=<?php echo $i; ?>">

                    <?php }else if($sort == 'asc' && $attr == 'username') {?>

                        <a href="?sort=asc&attr=username&list=<?php echo $i; ?>">

                    <?php }else if($sort == 'desc' && $attr == 'fullname') {?>

                        <a href="?sort=desc&attr=fullname&list=<?php echo $i; ?>">

                    <?php }else if($sort == 'asc' && $attr == 'fullname') {?>

                        <a href="?sort=asc&attr=fullname&list=<?php echo $i; ?>">
                
                    <?php }else{?>
                        <a href="list.php?list=<?php echo $i; ?>">
                    <?php }?>
            
                    <?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        </div>
       
        <div class="back" style="text-align: center">
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
            <a href="admin.php" class="btn btn-info">Add User ++</a>
        </div>
    </div>
</body>
</html>