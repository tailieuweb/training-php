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
    
    
    
    //Viet phuong thêm 1 Manufacture
    //Viet phuong thuc xóa 1 manufacture
    

    //Viet phuong thuc sua sp
    function updateManu($id,$name){
        $query = self::$connection->prepare("UPDATE manufactures SET manu_name = ? WHERE manu_id = ?");
        $query->bind_param("si",$name,$id);
         //return an object	 
        return $query->execute(); //return an array
    }

    //Lay san bang id
    function getManuID($id){
        $query = self::$connection->prepare("SELECT *   FROM manufactures WHERE manu_id = ?");
        $query->bind_param("i",$id);
        $query->execute(); //return an object	 
        $items = array();
        $items = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array	   
    }
}
