<?php

namespace SmartWeb;

class Category extends Model
{
    private static Category $_instance;

    //Phuong thuc lay data manufactures va chuyen tu object thanh array 
    public static function getInstance()
    {
        if (empty($_instance)) {
            self::$_instance = new self(new DBMYSQL);
        }
        return self::$_instance;
    }
    function getCategory()
    {
        return $sql = $this->db->select("SELECT * FROM categories");
    }
    function getCategoryByID($cateID)
    {
        return  $sql = $this->db->select("SELECT * FROM categories WHERE CategoryID = $cateID");
    }
    function getCateName($cateID)
    {
        return $sql =  $this->db->select("SELECT * FROM categories WHERE CategoryID = $cateID");
    }
}
