<?php

// insert your mysql connection code here

session_start();

include('functions.php');

$perPage = 10;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);

$query = "SELECT COUNT(*) as total FROM redirect
WHERE user_id = '".$_SESSION['user_id']."'";
$r = mysql_fetch_assoc(mysql_query($query));

$totalPages = ceil($r['total'] / $perPage);

$links = "";
for ($i = 1; $i <= $totalPages; $i++) {
  $links .= ($i != $page ) 
            ? "<a href='index.php?page=$i'>Page $i</a> "
            : "$page ";
}


$r = mysql_query($query);

$query = "SELECT * FROM 'redirect'
WHERE 'user_id'= \''.$_SESSION['user_id'].' \' 
ORDER BY 'timestamp' LIMIT $startAt, $perPage";

$r = mysql_query($query);

// display results here the way you want

echo $links;