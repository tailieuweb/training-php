<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/user.php";
$db = new Db;
$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$user = new User;
$token = null;

    if (isset($_POST['submitDelete'])){
        $id = $_POST['id'];   
        $image = "";
        $path = "";
        foreach($product->getProductID($id) as $array){
            $image = $array['pro_image'];
            $path = "../images/" . $image;
            unlink($path);
        }
        $product->delProduct($id);
        header("location:index.php");
    } 
     if (isset($_POST['submitDeleteManu'])) {
        $manuID = $_POST['idManu'];
        if (count($product->getProductsByManufacture($manuID)) > 0) {
                echo "<script> alert('Không thể xóa vì vẫn còn sản phẩm trong danh sách!');window.location.href='manufactures.php'</script>";
        } 
        else {
            $manufacture->delManufactuere($manuID);
            echo "<script> alert('Đã xóa.');window.location.href='manufactures.php'</script>";
        }
    } 
     if (isset($_POST['submitDeleteProtype'])) {
        $type_id  = $_POST['idProtype'];
        if (count($product->getProductsByProtype($type_id)) > 0) {
            echo "<script>alert('Không thể xóa vì vẫn còn sản phẩm trong danh sách!');window.location.href='protypes.php'</script>";
        } else {
            $protype->delProtype($type_id);
            echo "<script>alert('Đã xóa.');window.location.href='protypes.php'</script>";
        }
    }

    if(isset($_GET['iddel'])){
        $id = $_GET['iddel'];
        $token = $_GET['token'];
        //kiem tra
        if ($token == $_SESSION['_token']) {
            $user->delUser($id);
            echo "<script>alert('Đã xóa');window.location.href='users.php'</script>";
        }
        else{
            echo "<script>alert('Không xóa được');window.location.href='users.php'</script>";
        }
    }
?>
<!-- <script>
    window.location.href = "index.php";
</script> -->