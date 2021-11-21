<?php

namespace SmartWeb;

class Manufacture extends Model
{
    private static Manufacture $_instance;

    public static function getInstance()
    {
        if (empty(static::$_instance)) {
            self::$_instance = new self(new DBMYSQL);
        }
        return self::$_instance;
    }
    public function getManufactures()
    {
        return $this->db->select("SELECT * FROM manufacturers");
    }
    public function getManufacturesByID($ManuID)
    {
        return $this->db->select("SELECT * FROM manufacturers where ManufacturerID = $ManuID");
    }
    public function getManuName($ManuID)
    {
        return $this->db->select("SELECT * FROM manufacturers WHERE ManufacturerID = $ManuID");
    }
}
