<?php

namespace SmartWeb\DataBase\Product;
use SmartWeb\DataBase\DB;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}model{$ds}product.php");
class Property extends Model
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

    public function insert($sql, array $param = null)
    {
        return $this->db->insert($sql, $param);
    }


    public function delete($sql, array $param = null)
    {
        return $this->db->delete($sql, $param);
    }

    public function update($sql, array $param = null)
    {
        return $this->db->update($sql, $param);
    }
}
