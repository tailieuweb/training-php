<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}model{$ds}db.php");
require_once("{$base_dir}model{$ds}product.php");

use SmartWeb\DataBase\Product\Model;
use SmartWeb\DataBase\DB;
use SmartWeb\DataBase\DBPDO;

class Manufacture extends Model
{
    private static Manufacture $manu;
    public static function getInstance(DB $db)
    {
        if (empty($manu)) {
            self::$manu = new self($db);
        }
        return self::$manu;
    }

    public function select($sql, array $param = null)
    {
        return $this->db->select($sql, $param);
    }

    public function delete($sql, array $param = null)
    {
        return $this->db->delete($sql, $param);
    }
}
