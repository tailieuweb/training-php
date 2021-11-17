<?php
    if (isset($_POST['addProduct'])) {
        $name = $_POST['name'];
        $manu_id = $_POST['manu_id'];
        $type_id = $_POST['type_id'];
        $price = $_POST['price'];
        $pro_image = $_FILES['fileUpload']['name'];
        $description = $_POST['description'];
        $feature = $_POST['feature'];
        $created_at  = date("Y-m-d h:m:s");
        $path = "../images/" . basename($pro_image);
        //Kiểm tra ảnh có hợp k
        if(getimagesize($_FILES['fileUpload']['tmp_name'])){
            if(!file_exists($path)){
                if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$path)){
                    $product->addNewProduct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $created_at);
                    echo "<script>alert('Thêm thành công');window.location.href='index.php'</script>";
                }
            }
            else{
                echo "<script>alert('Tên ảnh đã tồn tại');window.location.href='form.php?value=product'</script>";
            }
        }
        else{
            echo "<script>alert('File được chọn không phải là ảnh')";
        }
       // header("location:index.php");
    } if (isset($_POST['addManufacture'])) {

        $manu_name = $_POST['name'];
        $manufacture->addNewManufacture($manu_name);
        echo "<script>alert('Thêm thành công');window.location.href='manufactures.php'</script>";
    } if (isset($_POST['addProtype'])) {

        $type_name = $_POST['name'];
        $protype->addNewProtype($type_name);
        echo "<script>alert('Thêm thành công');window.location.href='protypes.php'</script>";
    }