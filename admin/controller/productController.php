<?php

namespace SmartWeb\Controller;


use SmartWeb\Models\ObjectAssembler;
use SmartWeb\Models\Phone;
use SmartWeb\Repository\ProductRepository;
use SmartWeb\File\Upload;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
include_once("{$base_dir}include{$ds}function.php");
include_once("{$base_dir}model{$ds}update-file.php");
include("{$base_dir}repository{$ds}product-repository.php");

class ProductController
{
    private Phone $phone;
    public function __construct(string $conf)
    {
        $assembler = new ObjectAssembler($conf);
        $this->phone = $assembler->getComponent(Phone::class);
    }
    public function display_products()
    {
        //initialize
        $result = $this->phone->getProduct();
        $ds = DIRECTORY_SEPARATOR;
        $base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;

        //C:\Users\Administrator\Desktop\web1\pictures
        $body_table = <<< Gryphon
        <thead>
            <tr>
                <th class="product_remove">ID</th>
                <th class="product_thumb">Image</th>
                <th class="product_name">Product</th>
                <th class="product-price">Price</th>
                <th class="product_quantity">Quantity</th>
                <th class="product_total">Handle</th>
            </tr>
        </thead> <!-- End Cart Table Head -->
        <tbody>
        Gryphon;
        foreach ($result as $key => $value) {

            $encode = encodeID($value['ProductID']);
            $body_table .= <<< Gryphon

            <!-- Start Cart Single Item-->
            <tr>
                <td class="product-price">{$encode}</td>
                <td class="product_thumb"><a href="product-details-default.html"><img src="../pictures/Upload/{$value['ImageUrl']}" alt=""></a></td>
                <td class="product_name">{$value['ProductName']}</td>
                <td class="product-price">{$value['Price']}</td>
                <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="{$value['Quantity']}" type="number"></td>
                <td class="product_remove">
                <a href="{$_SERVER['PHP_SELF']}?ProductID={$encode}&handle=delete"><i class="fa fa-trash-o 1"></i></a>
                <button id="{$encode}" onclick="editProduct({$encode})" type="button" class="edit-data" data-toggle="modal" data-target="#myModel">
                <i class="fa fa-edit"></i>
                </button>
                </td>
            </tr> <!-- End Cart Single Item-->
            <!-- Start Cart Single Item-->
      
            Gryphon;
        }
        $body_table .= <<< Gryphon
        </tbody>
        Gryphon;
        return $body_table;
    }

    public function delete()
    {
        if (isset($_GET) && !empty($_GET['ProductID'])) {
            #check current page.
            $currentPage = 'index.php';
            if ($currentPage !== htmlentities(basename($_SERVER['PHP_SELF']))) {
                header('Location: http://web1.local/admin/manager/product/information.php');
                exit;
            }
            if ($_GET && $_GET['handle'] == 'delete') {
                #decryption id
                $id = $_GET['ProductID'];
                $id = decryptionID($id);
                #delete product.
                $result = ProductRepository::delete($id);
                if ($result === true) {
                    #thong bao sang form
                } else {
                    #thong bao sang form
                }
            }
        }
    }

    public function insert()
    {
        if (empty($_POST['ProductID']) && isset($_POST) && count($_POST) > 1) {
            //list expected fields
            $expected = ['ProductName',  'ManufacturerID', 'CategoryID', 'Description', 'Quantity', 'Price'];
            //set required fields
            $required = ['ProductName', 'ManufacturerID', 'CategoryID', 'Description', 'Quantity', 'Price'];
            //require processform.php
            $ds = DIRECTORY_SEPARATOR;
            $base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;

            require  "{$base_dir}include{$ds}processform.php";

            if ($_FILES &&  !empty($_FILES['ImageUrl'])) {
                $root = $_SERVER['DOCUMENT_ROOT'];
                $path = "{$root}{$ds}pictures{$ds}Upload{$ds}";
                $file = new Upload($path);
                $file->upload("ImageUrl");
            }
            ProductRepository::insert($_POST);
        }
    }

    public function send_data_from()
    {
        if (isset($_POST['ProductID']) && !empty($_POST['ProductID']) && count($_POST) == 1) {
            $id = decryptionID($_POST['ProductID']);
            $product = $this->phone->getProductID($id)[0];
            echo json_encode($product);
            exit;
        }
    }

    public function update()
    {

        if (!empty($_POST['ProductID']) && count($_POST) > 1) {
            //list expected fields  
            $expected = ['ProductName',  'ManufacturerID', 'CategoryID', 'Description', 'Quantity', 'Price'];
            //set required fields
            $required = ['ProductName', 'ManufacturerID', 'CategoryID', 'Description', 'Quantity', 'Price'];
            //require processform.php
            $ds = DIRECTORY_SEPARATOR;
            $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
            require  "{$base_dir}include{$ds}processform.php";

            if ($_FILES &&  !empty($_FILES['ImageUrl'])) {
                $path = "../../pictures{$ds}Upload{$ds}";
                $file = new Upload($path);
                $file->upload("ImageUrl");
            }

            ProductRepository::update($_POST);
        }
    }
}
