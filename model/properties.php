<?php

namespace SmartWeb;

class Property  extends Model
{
    private static Property $property;
    public static function getInstance(DB $db)
    {
        if (empty($property)) {
            self::$property = new self($db);
        }
        return self::$property;
    }
    public function select($sql, array $param = null)
    {
        return $this->db->select($sql, $param);
    }

    public function insert(array $param)
    {


        $sql = "INSERT INTO property(ProductID,ImageUrl,Price,Quantity,Description) 
        VALUES(:ProductID, :ImageUrl, :Price, :Quantity, :Description)";

        $is_finished =  $this->db->notSelect($sql, $param);
        return $is_finished;
    }

    public function delete($params)
    {
        $sql = "DELETE FROM property WHERE ProductID = :ProductID";
        $is_finished =  $this->db->notSelect($sql, $params);
        return $is_finished;
    }

    public function update($params)
    {
        $sql = "";
        if (empty($params['ImageUrl'])) {
            $sql = "UPDATE property
            SET Price=:Price, Quantity=:Quantity, Description=:Description
            WHERE ProductID =:ProductID";
            //remove
            unset($params['ImageUrl']);
        } else {
            $sql = "UPDATE property 
            SET ImageUrl=:ImageUrl, Price=:Price, Quantity=:Quantity, Description=:Description
            WHERE ProductID =:ProductID";
        }
        $is_finished =  $this->db->notSelect($sql, $params);
        return $is_finished;
    }
}
