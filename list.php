
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
$less->compileFile('less/list.less', 'public/css/list.css');
?>

<?php
session_start();
$mahoa_id = md5("id");
include('functions.php');

$results = [];
if (isset($_GET['list'])) {
    $query = " SELECT * FROM `users` WHERE  ORDER BY `users`.`username` ASC ";
    $results = mysqli_query($conn, $query);
}

if (isset($_GET['list'])) {
    if (isAdmin()) {
        $query = "SELECT * FROM users ORDER BY username";
        $results = mysqli_query($conn, $query);
    }
}
//view
$id;
if (isset($_GET["$mahoa_id"])) {
    $id = $_GET["$mahoa_id"];
    $g_id = base64_decode(base64_decode(base64_decode(base64_decode($id))));
    $detail = " SELECT * FROM users WHERE `id` = $g_id";
    $details = mysqli_query($conn, $detail);
    $row = mysqli_fetch_array($details);
}
//search
$value_search;
if (isset($_GET['search'])) {
    $value_search = $_GET["search"];
    $search = " SELECT * FROM users WHERE `username` like '%$value_search%' or `email` = '$value_search'";
    $searchrs =  mysqli_query($conn, $search);
    $a = mysqli_fetch_array($searchrs);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- <title>Register</title>
        <link rel="stylesheet" type="" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" type="" href="public/css/styles.css">
        <link rel="stylesheet" type="" href="public/css/editstyle.css">
        <script src="./block.js"></script>     -->

        <title>List User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $url_path ?>/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url_path ?>/public/css/list.css" rel="stylesheet" type="text/css" />

        
        
        <?php
        if (!class_exists('lessc')) {
            include ('./libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('less/list.less', 'public/css/list.css');
        ?>
    </head>
    <body >
        <?php include '../php-traning-less/list-content.php'; ?>
    </body>
</html>