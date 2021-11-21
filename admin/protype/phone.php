<?php

namespace SmartWeb\Models;

class Phone extends Product
{
    private static Phone $phone;

    public static function getInstance()
    {
        if (empty($phone)) {
            self::$phone = new self(self::$db);
        }

        return self::$phone;
    }

    public function getMaxID()
    {
        $sql = "SELECT MAX(ProductID) ProductID FROM products";
        $id_current_product = $this->db->select($sql);
        $id_product = $id_current_product[0]['ProductID'];
        return $id_product;
    }

    public function getProductID($id)
    {
       
        $sql = "SELECT property.*, products.* 
        FROM products INNER JOIN property ON products.ProductID = property.ProductID 
        WHERE products.ProductID=:ProductID";

        $params['ProductID'] = $id;
        $result = $this->db->select($sql, $params);
        return $result;
    }

    public function getProduct()
    {
        $sql = "SELECT property.*, products.* FROM products INNER JOIN property ON products.ProductID = property.ProductID";
        $result = $this->db->select($sql);
        return $result;
    }

    public function insert(array $param)
    {
        $sql = "INSERT INTO products(ProductName,CategoryID,ManufacturerID) 
        VALUES(:ProductName, :CategoryID, :ManufacturerID)";

        $is_finished =  $this->db->notSelect($sql, $param);
        return $is_finished;
    }

    public function delete($params)
    {

        $sql = "DELETE FROM products WHERE ProductID = :ProductID";
        $is_finished =  $this->db->notSelect($sql, $params);
        return $is_finished;
    }

    public function update($params)
    {
        $sql = "UPDATE products 
        SET ProductName=:ProductName, CategoryID=:CategoryID, ManufacturerID=:ManufacturerID
        WHERE ProductID = :ProductID";
        
        $is_finished =  $this->db->notSelect($sql, $params);
        return $is_finished;
    }
}
