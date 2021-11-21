<?php

use SmartWeb\DataBase\Product\Model;

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}model{$ds}db.php");

use SmartWeb\DataBase\DB;

class Category extends Model
{
    private static Category $cate;
    public static function getInstance(DB $db)
    {
        if (empty($cate)) {
            self::$cate = new self($db);
        }
        return self::$cate;
    }
    public function select($sql, array $param = null)
    {
        return $this->db->select($sql, $param);
    }

    public function delete($sql, array $param = null)
    {
        return $this->db->select($sql, $param);
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM Category";
        return $this->db->select($sql);
    }
}
