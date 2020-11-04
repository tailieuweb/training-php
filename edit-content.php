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
$less->compileFile('less/edit.less', 'public/css/edit.css');
?>
<div class="header">
    <div class="container">
        <h2>Edit User</h2>
        </form>

        <form method="post" action="">
            <?php echo display_error(); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username1" value="<?php echo $data['username']; ?>" placeholder="<?php echo $data['username']; ?>">
            </div>
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="fullname1" value="<?php echo $data['fullname']; ?>" placeholder="<?php echo $data['fullname']; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email1" value="<?php echo $data['email']; ?>" placeholder="<?php echo $data['email']; ?>">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="save_btn">Save</button>
            </div>

        </form>
        <div class="back" style="text-align: center; padding-top: 10px;">
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-2)">Back</button>
        </div>
    </div>

</div>