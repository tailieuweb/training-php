<?php
    if(isset($_POST['submitEditProduct'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $manu = $_POST['manu_id'];
        $type = $_POST['type_id'];
        $price = $_POST['price'];
        $image = $_FILES['fileUpload']['name'];
        $path = "../images/" . basename($_FILES['fileUpload']['name']);
        $description = $_POST['description'];
        $feature = $_POST['feature'];
        $date = date('Y-m-d H:i:s');
        if($image != ""){
            if(getimagesize($_FILES['fileUpload']['tmp_name'])){
                foreach($product->getProductId($id) as $value){
                    $pathOld = "../images/" . $value['pro_image'] ;
                    if(file_exists($pathOld)){
                        unlink($pathOld);
                    }
                        if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$path)){
                        if($product->updateProduct($name,$manu,$type,$price,$image,$description,$feature,$date,$id)){
                            echo "<script>alert('Đã sửa');window.location.href='index.php'</script>";
                        }
                        else{
                            echo "Sửa không thành công";
                        }
                    }
                }
        }        
            else{
                echo "<script>alert('Ảnh không hợp lệ')</script>";
            }
        }
        else{
            foreach($product->getAllProducts() as $value){
                if($id == $value['id']){
                    
                    $image = $_FILES['fileUpload']['name'];
                    $image = $value['pro_image'];
                    if($product->updateProduct($name,$manu,$type,$price,$image,$description,$feature,$date,$id)){
                        echo "<script>alert('Đã sửa');window.location.href='index.php'</script>";
                    }
                    else{
                        echo "Sửa không thành công";
                    }
                }
            }
        }
    }
    if(isset($_POST['editManu'])){
        $id = $_POST['id'];
        $manu_name = $_POST['name'];
        if($manufacture->updateManu($id,$manu_name)){
            echo "<script>alert('Đã sửa');window.location.href='manufactures.php'</script>";
        }
    }
    if(isset($_POST['editProtype'])){
        $id = $_POST['id'];
        $type_name = $_POST['name'];
        if($protype->updateProtype($id,$type_name)){
            echo "<script>alert('Đã sửa');window.location.href='protypes.php'</script>";
        }
    }

    if(isset($_POST['editUser'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        if($user->updateUser($id,$name,$password,$role)){
            echo "<script>alert('Sửa thành công');window.location.href='users.php'</script>";
        }
    }
?>