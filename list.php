<?php
session_start();

include('functions.php');

// // Require https
// if ($_SERVER['HTTPS'] != "on") {
//     $url = "https://". $_SERVER['localhost'] . $_SERVER['localhost'];
//     header("location: list.php");
//     EXIT;
// }

$results = [];

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
        
        <style>
            .btn-success a{
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
		<div class="container">
        <div class="header">
            <h2>List User</h2>
        </div>
        <form >
            <?php echo display_error(); ?>	

            <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'php_training');
            
             
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(id) as total from users');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 3;
                
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
                
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                
                // Tìm Start
                $start = ($current_page - 1) * $limit;
                
                // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                $result = mysqli_query($conn, "SELECT * FROM users LIMIT $start, $limit");
            ?>
            <button class="btn btn-success"> <a href="admin.php">Add Users</a></button>
            <table class="table">
                <thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Image</th>
						<th scope="col">Username</th>
						<th scope="col">Full name</th>
						<th scope="col">Email</th>
						<th scope="col">Action</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $resultItem): ?>
                    <tr scope="row">
                        <td><?php echo $resultItem['id']; ?></td>  
                        <td><img width="30px" src="public/images/<?php echo $resultItem['image']; ?>" ></td>  
                        <td><?php echo $resultItem['username']; ?></td>   
                        <td><?php echo $resultItem['fullname']; ?></td>   
                        <td><?php echo $resultItem['email']; ?></td> 
						<td>
                            <!-- <a><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                            <a href="viewUser.php?edit=<?php echo $resultItem['id']; ?>"><i class="fa fa-eye" aria-hidden="true" ></i></a>

                            <!-- edit not working -->
							<a href="edit.php?edit=<?php echo $resultItem['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>
							
							<a href="deleteUser.php?id=<?php echo $resultItem['id']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
							
						</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </form>
        <br/>
        <div class="pagination" style="display: flex; justify-content: center; align-items: center;">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="list.php?page='.($current_page-1).'" style="padding: 0px 5px;">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span style="padding: 0px 5px;">'.$i.'</span> | ';
                }
                else{
                    echo '<a href="list.php?page='.$i.'" style="padding: 0px 5px;">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="list.php?page='.($current_page+1).'" style="padding: 0px 5px;">Next</a> | ';
            }
           ?>
        </div>
        <br/>
        <div class="back" style="text-align: center">
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
        <!-- <?php echo '<button type=\"button\" class=\"btn btn-info\" onClick=\"javascript:history.go(-'.$current_page.')">Back</button>' ?> -->
        </div>
        </div>
    </body>
</html>