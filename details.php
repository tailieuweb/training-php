<?php 
include('functions.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $md_id = base64_decode(base64_decode(base64_decode($id)));
    $query = "SELECT * FROM users WHERE id = $md_id";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($results);
?>

<html>
<body>
<style>
.table{
    border:2px solid green;
    margin-left:560px;
    margin-top:100px;
}
th{
    border:2px solid green;
    padding:10px 20px;
}
td{
    border-left:2px solid green;
}
h2{
    text-align:center;
}
</style>
<h2>trang thông tin chi tiết</h2>
<table class="table" >
                <thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Username</th>
						<th scope="col">Full name</th>
						<th scope="col">Email</th>
					</tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                    <tr scope="row">
                        <td><?php echo $result['id']; ?></td>   
                        <td><?php echo $result['username']; ?></td>   
                        <td><?php echo $result['fullname']; ?></td>   
                        <td><?php echo $result['email']; ?></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
<?php } else {
    echo "không tìm thấy";
    }?>
</body>
</html>