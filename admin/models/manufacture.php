<?php
class Manufacture extends Db
{
    //Phương thức lấy ra tất cả sản phẩm
    function getAllManufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Viet phuong thuc lay ra tat ca manufacture trong 1 trang
    function getAllManufactureByPage($page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu  
        $firstLink = ($page - 1) * $perPage;
        //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang 
        $sql = self::$connection->prepare("SELECT * 
        FROM manufactures
        ORDER BY manu_id 
        LIMIT $firstLink, $perPage");
        $sql->execute(); //return an object	 
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array	   
    }


    //Viet phuong thêm 1 Manufacture
    function addNewManufacture($manu_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`) 
        VALUES (?)");
        $sql->bind_param("s", $manu_name);
        $sql->execute();
    }
    //Viet phuong thuc xóa 1 manufacture
    function delManufactuere($manu_id)
    {
        $sql = self::$connection->prepare("DELETE
    FROM manufactures
    WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
    }
    //Viet phuong thuc sua sp
    function updateManu($id, $name)
    {
        $query = self::$connection->prepare("UPDATE manufactures SET manu_name = ? WHERE manu_id = ?");
        $query->bind_param("si", $name, $id);
        //return an object	 
        return $query->execute(); //return an array
    }

    //Lay san bang id
    function getManuID($id)
    {
        $query = self::$connection->prepare("SELECT *   FROM manufactures WHERE manu_id = ?");
        $query->bind_param("i", $id);
        $query->execute(); //return an object	 
        $items = array();
        $items = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array	   
    }
}
