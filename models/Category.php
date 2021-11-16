<?php

// Category
class Category extends Database
{
    protected static $_instance;

    public function getAll(){
        $sql = self::$connect->prepare("SELECT * FROM category");
        $sql->execute();

        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}