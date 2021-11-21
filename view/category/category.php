<?php

//use SmartWeb\Category;
use SmartWeb\Category;
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;

$cate = Category::getInstance();
$resultc = $cate->getCategory();
// var_dump($result);
foreach ($resultc as $row) {
    echo "<a href=\"index.php?mod=category&act=resultcategory&id={$row['CategoryID']}\">{$row['CategoryName']}</a>";
}
