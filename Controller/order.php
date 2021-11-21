<?php
// session_start();
// require "./model/config.php";
// require "./model/mysqli_con.php";
use SmartWeb\Model;

class Order extends Model
{
    private static Order $_instance;
    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self(self::$db);
        return self::$_instance;
    }
    function getDataOrder()
    {
        $idUser = $_SESSION['id_user'];
        var_dump($idUser);
        $item = $this->con->select("SELECT * FROM `orders`
        INNER JOIN products on products.ProductID = orders.id_product  
        WHERE orders.id_user = $idUser");
        return $item; //return an array
    }

    function changeQuantity($number, $id)
    {
        $sql = $this->con->noSelect("UPDATE `orders` SET `quantity`= $number WHERE  `orders`.`id`= $id");
    }

    function deleteOrder($id)
    {
        $sql = $this->con->noSelect("DELETE FROM `orders` WHERE `orders`.`id`= $id");
    }

    function addOrder($id)
    {
        $idUser = $_SESSION['id_user'];
        $sql    = $this->con->noSelect("SELECT * FROM `orders` INNER JOIN products on products.ProductID = orders.id_product  WHERE orders.id_user = $idUser");
        $sql->execute(); //return an object
        $items    = [];
        $items    = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        $check    = 0;
        $number   = 0;
        $id_order = 0;
        foreach ($items as $key => $value) {
            if ($items[$key]['id_product'] == $id) {
                $check    = 1;
                $number   = $items[$key]['quantity'] + 1;
                $id_order = $items[$key]['id'];
            }
        }
        if ($check == 1) {
            $sql = $this->con->noSelect("UPDATE `orders` SET `quantity`= $number WHERE  `orders`.`id`= $id_order");
        } else {
            $sql = $this->con->noSelect("INSERT INTO `orders`(`id_user`, `id_product`, `quantity`) VALUES ( $idUser, $id, 1)");
        }
    }

    function getTotal()
    {
        $idUser = $_SESSION['id_user'];
        $items    = $this->con->select("SELECT * FROM `orders` 
        INNER JOIN products on products.ProductID = orders.id_product  
        WHERE orders.id_user = $idUser");
        $total = 0;

        foreach ($items as $key => $value) {
            $total = $total + $items[$key]['quantity'] * $items[$key]['Price'];
        }

        return $total;
    }

    function getData()
    {
        $items = $this->con->select("SELECT * FROM products");
        return $items; //return an array
    }

    function insertOder()
    {
        if (isset($_POST['checkout'])) {
            $id_user = $_SESSION['user'][0]['UserID'];
            $name    = $_POST['name'];
            $email   = $_POST['email'];
            $sdt     = $_POST['sdt'];
            $diachi  = $_POST['diachi'];
            $status = 0;
            $total = $_SESSION['total'];

            $sql = $this->con->select("INSERT INTO `orders`( `UserID`, `Ten`, `Address`, `Phone`, `mail`, `Status`, `total`)
    VALUES ('$id_user', '$name', '$diachi', '$sdt','$email', '$status', '$total')");
            return $sql;
        }
    }

    function getDataOder()
    {
        $sql =  $this->con->select("SELECT * FROM orders");
        $sql->execute(); //return an object
        $items = [];
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
