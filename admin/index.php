<?php

use SmartWeb\Controller\ManufactureController;
use SmartWeb\Controller\ProductController;
use SmartWeb\Controller\CategoryController;
use SmartWeb\Repository\ProductRepository;
use SmartWeb\Models\ObjectAssembler;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;

include("{$base_dir}admin{$ds}controller{$ds}productController.php");
include_once "{$base_dir}controller{$ds}cateController.php";
include_once "{$base_dir}controller{$ds}manuController.php";
include "{$base_dir}dj{$ds}dj.php";
include "{$base_dir}utilities.php";
//
$conf = "{$base_dir}dj{$ds}object.xml";
$phonecontrol = new ProductController($conf);
$manucontrol = new ManufactureController($conf);
$catecontrol = new CategoryController($conf);


$phonecontrol->insert();
$phonecontrol->update();
$phonecontrol->delete();
$phonecontrol->send_data_from();
$result = "";
if (isset($_POST['key']) && $_POST['key'] === "content") {
    $result =  $phonecontrol->display_products();
    exit($result);
}
include "header.php";
?>

<body>
    
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">ADMIN</h3>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <div class="container">
        <!-- Content here -->
        <div class="row">
            <div class="col-2">
                <!-- dang de trong -->
            </div>
            <div class="col-10">
                <?php include "./manager/product/information.php" ?>
            </div>
        </div>
    </div>

    <?php
    include "footer.php"
    ?>