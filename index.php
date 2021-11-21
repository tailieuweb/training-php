<?php
require 'Controller/Pagination.php';
require_once 'Controller/FactoryPattern.php';
$factory = new FactoryPattern();
$product = $factory->make('product');
$products = $product->getData();
$result = $product->getSPNew();
//=================================================================
$keyword = '';
if (!empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $Search = $product->Search($keyword);
    //var_dump($Search);
}
include_once("view/header.php");
$totalRow = $product->getTotalRow();
var_dump($totalRow);
$perPage = 3;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$pageLinks = Pagination::createPageLinks($totalRow, $perPage, $page);
$productID = $product->getID();
//var_dump($result);
//var_dump($total_rows);

if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "prductID");
        if (in_array($_POST['productID'], $item_array_id)) {
            echo "<script>alert('Sản phẩm đã tồn tại trong giỏ hàng !!!')</script>";
        } else {
            $count      = count($_SESSION['cart']);
            $id = $_POST['productID'];
            $item_array = ['prductID' => $id];
            //var_dump($_POST);
            $_SESSION['cart'][$count] = $item_array;
            $_SESSION['quanlity'][$id] =1;
        }
        echo "<script>window.location='index.php'</script>";
    } else {
        $id = $_POST['productID'];
        $item_array          = ['prductID' => $id];
        $_SESSION['cart'][0] = $item_array;
        $_SESSION['quanlity'][$id] =1;
    }

}

?>

<!-- header -->
<?php
        if (!isset($_GET['mod'])) {
            include_once("view/slider.php");
        }
        if(isset($_GET['mod'])) {
            $a = ucfirst($_GET['mod']);
            $b = ucfirst($_GET['act']);

            include_once("view/".$a."/".$b.".php");
        }
    ?>
<!-- Hiển thị sp mới nhất -->
<?php include_once("view/product/spMoinhat.php"); ?>
<!-- logo -->
<?php include_once("view/manufactures/logo.php"); ?>
<!-- product_widget -->
<?php include_once("view/product/product_widget.php"); ?>
<!-- footer -->
<?php include_once("view/footer.php");?>

<?php
    ob_end_flush();
?>