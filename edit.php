<?php 
session_start();
include('functions.php');

if (isLoggedIn() && isAdmin()) {
    $id = base64_decode(isset($_GET['id']) ? $_GET['id'] : '');
    if($id == ''){
        header("location: list.php");
    }
    else{
        $result = getUserById($id);
        if($result == []){
            header("location: list.php");
        }
    }

    if(isset($_POST['save_btn'])){
        if(!isset($_COOKIE['token' .$id])){
            if (count($errors) == 0) {
                editId($id);
                setcookie('token' .$id, $id, time() + 300); 
            }
        }   
        else{
            $_SESSION['success'] = "Update again after 5 minutes";
        }
    } 
}
else{
    header("location: login.php");
}                           

if (isset($_GET['edit'])) {
    if(isLoggedIn()){
        $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
        $results = mysqli_query($conn, $query);    
    }
}
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="header">
        <h2>Edit User</h2>
    </div>


    <form method="post" action="" enctype="multipart/form-data">
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

            
            
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $result['username'] ?>" disabled>
            </div>
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="fullname" value="<?php echo $result['fullname'] ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $result['email'] ?>">
            </div>
            <div class="input-group">
                <label for="image">User Image</label>
                <input type="file" name="image" id="image">
            </div>
                        
            <div class="input-group">
                <button  type="submit" class="btn" name="save_btn" onClick = "return confirm('Bạn có muốn sửa?')"> Save</button>
            </div>

    </form>
    <div class="back" style="text-align: center">
        <a href="list.php" class="btn">Back</a>
    </div>
	
</body>
</html>