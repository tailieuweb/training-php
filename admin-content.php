<?php
$url_host = $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';
preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);
?>
<div class="header">
    <div class="container">
        <h2>Admin - Create User</h2>
        <form method="post" action="admin.php">
            <?php echo display_error(); ?>
            <!-- <div class="input-group">
                <label>Avata image</label>
                <input class="form-control" type="file" name="upload_file" id="upload_file"/>
            <?php
                $str_out = '';
                if( isset( $image ) ) {
                    $str_out .= '<a style="background:url("'.$image.'") "></a>';
                }
                echo $str_out;
            ?>            
            </div> -->
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="fullname" value="<?php echo $fullname; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>User type</label>
                <select name="user_type" id="user_type">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn"> Create User</button>
            </div>
            <p>
                <a href="home.php">HOME</a>
            </p>
        </form>
    </div>
</div>