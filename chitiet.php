<?php
session_start();

include('functions.php');

$results = [];

$id=$_GET['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$results = mysqli_query($conn,$query);
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
            <h2>Chi Tiết Tài Khoản</h2>
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
                
                    <?php foreach ($results as $result): ?>
                    <tr scope="row">
                        <td><?php echo $result['id']; ?></td>   
                        <td><?php echo $result['username']; ?></td>   
                        <td><?php echo $result['fullname']; ?></td>   
                        <td><?php echo $result['email']; ?></td> 
                        <td>
						
							<a href="edituserid.php?id=<?php echo $result['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <a href="delete.php?id=<?php echo $result['id']?>"><i class="fa fa-times" aria-hidden="true"></i></a>
							
						</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </form>
        <div class="back" style="text-align: center">
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
          
        </div>
        </div>
        
    </body>
</html>