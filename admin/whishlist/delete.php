<?php 
session_start();

// -----------Factory------------------
require "../../models/WhishListModel.php";
$whishlist = new WhishListModel();
$id = NULL;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $whishlist->deleteWhishList($id);
}
header('location: ./index.php');