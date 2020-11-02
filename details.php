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
<head>
        <title>Register</title>
        
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/css/styles.css">
    </head>
    <body>
		<div class="container">
        <div class="header">
            <h2>Detail</h2>
        <form >
            <?php echo display_error(); ?>	

            <table class="table">
                <?php
                 $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                 echo $date->format('d-m-Y H:i:s');
                ?>
                <thead>
					<tr>
                        <th scope="col">Avata</th>
                        <th scope="col">ID</th>
						<th scope="col">Username
                        </th>
						<th scope="col">Full name
                       </th>
						<th scope="col">Email</th>
						
					</tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result):?>
                    <tr scope="row">  
                        <td><img src="./public/uploads/<?php echo $result['avata'] ;?>" alt="" style="width:60px;height:60px"></td>  
                        <td><?php echo $result['id']; ?></td>   
                        <td><?php echo $result['username']; ?></td>   
                        <td><?php echo $result['fullname']; ?></td>   
                        <td><?php echo $result['email']; ?></td> 
						
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>

<?php } else {
    echo "không tìm thấy";
    }?>
<br>
        <div class="back" style="text-align: center">
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
        </div>
</body>
</html>