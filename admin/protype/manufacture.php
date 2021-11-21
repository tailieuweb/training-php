<?php

namespace SmartWeb\Models;

class Manufacture extends Product
{
    private static Manufacture $manu;

    public static function getInstance()
    {
        if (empty($manu)) {
            self::$manu = new self(self::$db);
        }
        return self::$manu;
    }

    public function getManu()
    {
        $sql = "SELECT * FROM manufacturers";
        $is_finished =  $this->db->select($sql);
        return $is_finished;
    }
}
