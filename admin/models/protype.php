<?php
class Protype extends Db
{
    //Viet phuong thuc lay ra tat ca Protype
    function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProtypeByPage($page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu  
        $firstLink = ($page - 1) * $perPage;
        //Dùng LIMIT để giới hạn số lượng hiển thị 1 trang 
        $sql = self::$connection->prepare("SELECT * 
        FROM protypes 
        ORDER BY `type_id`
        LIMIT $firstLink, $perPage");
        $sql->execute(); //return an object	 
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array	   
    }

    //Viet phuong thêm 1 protype
    function addNewProtype($type_name)
    {
        $input=mysqli_escape_string(self::$connection,$type_name);
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`) 
        VALUES (?)");
        $sql->bind_param("s", $input);
        $sql->execute(); //return an object
    }

    //Viet phuong thuc xóa 1 protype
    function delProtype($type_id)
    {
        $sql = self::$connection->prepare("DELETE
    FROM protypes
    WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
    }
    //lay id 
    function getProtypeID($id){
        $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id = ?");
            $sql->bind_param("i", $id);
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
    //update protype
    function updateProtype($id,$typeName){
        $query = self::$connection->prepare("UPDATE protypes SET type_name = ? WHERE type_id = ?");
        $query->bind_param("si",$typeName,$id);
        return $query->execute();
    }
    
    
}
?>
