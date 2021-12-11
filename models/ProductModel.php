<?php

require_once 'BaseTwoAdmin.php';

class ProductModel extends BaseTwoAdmin
{
    public function insertProduct($input)
    {
        if (isset($input) && is_array($input)) {
                $url = 'http://localhost:8080/PHP-Web2-Ck-V1/public/img/product/';
                $name = $url . $_FILES["image"]['name'];
                $sql = "INSERT INTO `webbanhkem`.`products` (`name`, `manu_id` ,`type_id`,`price`, `pro_image`,`feature`,`description`  ) VALUES (" .
                    "'" . $input['name'] . "','" . $input['manufacture'] . "','" . $input['protype'] . "','" . $input['price'] 
                    . "','" . $name
                    . "','" . $input['feature']
                    . "','" . $input['description'] . "')";
                $bank = $this->insert($sql);
                return $bank;
        }
        return false;
    }
    public function updateProduct($input)
    {
        $versionOld = null;
        $idNew= null;
        $id = $input['id'];
        $id_start = substr($id,3);
        $id_end=substr($id_start,0,-3);
        $allProduct = $this->getProducts();
        foreach ($allProduct as  $value) {
            if(md5($value['id'].'chuyen-de-web-2') == $id_end){
                $idNew = $value['id'];
                $versionOld = $value['version'];
               
            }
        }
        if(md5($versionOld.'chuyen-de-web-2') == $input['version']){
            if (isset($input) && is_array($input)) {

                if($_FILES["image"]['type'] == "image/jpeg" || $_FILES["image"]['type'] == "image/jpg" 
                || $_FILES["image"]['type'] =="image/png"){
                    $url = 'http://localhost:8080/PHP-Web2-Ck-V1/public/img/product/';
                    $name = $url . $_FILES["image"]['name'];
                    $time1 = (int)$versionOld + 1;
                    $sql = 'UPDATE products SET 
                        name = "' . $input['name'] . '", 
                        manu_id = "' . $input['manufacture'] . '", 
                        type_id = "' . $input['protype'] . '", 
                        price = "' . $input['price']. '",  
                        pro_image = "' . $name. '", 
                        feature="' .  $input['feature'] . '",
                        version="' .  $time1 . '",
                        description = "' . $input['description']. '"
                        WHERE id = ' . $idNew;
                    $bank = $this->update($sql);
                    return $bank;
                }else{
                    $time1 = (int)$versionOld + 1;
                    $sql = 'UPDATE products SET 
                        name = "' . $input['name'] . '", 
                        manu_id = "' . $input['manufacture'] . '", 
                        type_id = "' . $input['protype'] . '", 
                        price = "' . $input['price']. '",  
                        feature="' .  $input['feature'] . '",
                        version="' .  $time1 . '",
                        description = "' . $input['description']. '"
                        WHERE id = ' . $idNew;
                $bank = $this->update($sql);
                return $bank;
            }
                
        }
       }
        
    return false;
    }
    public function trashProduct($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $allProduct = $this->getProducts();
        $now =  strftime('%Y-%m-%d');
        foreach ($allProduct as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                var_dump($id);
                var_dump($md5);
                $sql = "UPDATE `products` SET `detele_at`= CURTIME() WHERE id = " . $value['id'] ;
                $bank = $this->update($sql);
                return $bank;
             }
        }
      return false;
    }
    public function rehibilitate($id)
    {
        $allProduct = $this->getAllTrashProduct();
        $now =  strftime('%Y-%m-%d');
        foreach ($allProduct as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "UPDATE `products` SET `detele_at`= NULL WHERE id = " . $value['id'] ;
                $bank = $this->update($sql);
                return $bank;
             }
        }
      return false;
    }
    public function deleteProduct($id)
    {
        $allProduct = $this->getAllProducts();
        foreach ($allProduct as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "DELETE FROM products WHERE id =  " . $value['id'] ;
                $bank = $this->delete($sql);
                return $bank;
             }
        }
      return false;
    }
    public function getAllTrashProduct()
    {
        $sql = 'SELECT * FROM `products` WHERE detele_at IS NOT NULL ORDER BY `id` DESC;';
        $products = $this->select($sql);
        return $products;
    }
    public function getProducts($params = [])
    {
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM products 
            WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"';
            $products = $this->select($sql);
        }else {
            $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY `id` DESC;';
            $products = $this->select($sql);
        }   
        return $products;
    }
    public function getAllProducts()
    {
        $sql = 'SELECT * FROM `products` ORDER BY `id` DESC;';
        $products = $this->select($sql);
        return $products;
    }
    public function getManufacture()
    {
        $sql = 'SELECT * FROM manufactures  ORDER BY `manu_id` DESC';
        $manufactures = $this->select($sql);
        return $manufactures;
    }
    public function getProtypes()
    {
        $sql = 'SELECT * FROM protypes  ORDER BY `type_id` DESC';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getManuByProductId($id)
    {
        $sql = 'SELECT manu_name FROM manufactures WHERE manu_id = '.$id;
        $manu = $this->select($sql);
        return $manu;
    }
    public function getByProductId($id)
    {
        $allProduct = $this->getProducts();

        foreach ($allProduct as $value) {
            if(md5($value['id'].'chuyen-de-web-2') == $id){
                $sql = 'SELECT * FROM products WHERE id = '.$value['id'];
                $products = $this->select($sql);
                return $products;
            }
        }
    }
    public function getProTypeByProductId($id)
    {
        $sql = 'SELECT type_name FROM protypes WHERE type_id = '.$id;
        $manu = $this->select($sql);
        return $manu;
    }

    protected static $_instance;
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}