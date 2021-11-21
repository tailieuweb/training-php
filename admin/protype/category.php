<?php

namespace SmartWeb\Models;

class Category extends Product
{
    private static Category $phone;

    public static function getInstance()
    {
        if (empty($phone)) {
            self::$phone = new self(self::$db);
        }
        return self::$phone;
    }

    public function getCategory()
    {
        $sql = "SELECT * FROM categories";
        $is_finished =  $this->db->select($sql);
        return $is_finished;
    }
}
