<?php
class Manufacture extends Db{
    //Phương thức lấy ra tất cả manufactures
    function getAllManufactures(){
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Phân trang manu
    function paginateManu($url, $total, $page, $perPage,$manu_id)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<a style='padding:20px;' href='$url?page=$j&manu_id=$manu_id'> $j </a>";
        }
        return $link;
    }
}