<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}

$less = new lessc;
$less->compileFile('less/home.less', 'public/css/home.css');
?>

<div class="header">
    <div class="container">
        <h2>Admin - Home Page</h2>
        <div class="content">
            <!-- notification message -->
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

            <!-- logged in user information -->
            <div class="profile_info">
                <img src="public/images/admin_profile.png">
                <div>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <strong><?php echo $_SESSION['user']['username']; ?></strong>
                        <small>
                            <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                            <br>
                            <?php echo $_SESSION['user']['fullname']; ?><br>
                            <?php echo $_SESSION['user']['email']; ?><br>
                            <a href="admin.php">Add User</a> &nbsp;
                            <a href="list.php?list='1'">List User</a> &nbsp;
                            <a href="edit.php?id='1">Edit Information</a><br>
                            <a href="home.php?logout='1'" style="color: black;">Logout</a>
                        </small>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

</div>