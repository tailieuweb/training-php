<?php
include_once("model/manufacture.php");

use SmartWeb\DBMYSQL;
use SmartWeb\Manufacture;

$manu = Manufacture::getInstance();
$resultm = $manu->getManufactures();
// var_dump($result);
foreach ($resultm as $row) {
    echo "<a href=\"index.php?mod=manufactures&act=resultmanufacturers&id={$row['ManufacturerID']}\">{$row['ManufacturerName']}</a>";
}
