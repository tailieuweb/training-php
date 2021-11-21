<?php

namespace SmartWeb;

class Phone extends Model
{
    private static Phone $_instance;

    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self(new DBMYSQL);
        }

        return self::$_instance;
    }
    function getDataDuaVaoID($id)
    {
        return $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         WHERE ProductID = $id");
    }
    public function getProductsByPrice($type)
    {
        if ($type == "asc") {
            $result = $this->db->select("SELECT * FROM products 
            INNER JOIN property ON products.ProductID = property.ProductID
             order by Price");
        } else {
            $result = $this->db->select("SELECT * FROM products 
            INNER JOIN property ON products.ProductID = property.ProductID
             order by Price DESC");
        }
        return $result;
    }
    function getDienThoai()
    {
        return  $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         WHERE CategoryID = 3 LIMIT 1"); //return an array
    }
    function getLaptop()
    {
        return $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         WHERE CategoryID = 6 LIMIT 1"); //return an array
    }
    function getUsb()
    {
        return $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         WHERE CategoryID = 2 LIMIT 1"); //return an array
    }
    function getSPNoiBat()
    {
        return $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
          WHERE feature = 1"); //return an array
    }
    function getSPNew()
    {
        return  $this->db->select("SELECT * FROM products
        INNER JOIN property ON products.ProductID = property.ProductID 
        ORDER BY products.ProductID DESC limit 6");; //return an array
    }
    function get3SPNew()
    {
        return $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         ORDER BY products.ProductID DESC LIMIT 3"); //return an array
    }
    function getProductsByCateID($cateID)
    {
        return  $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         WHERE CategoryID = $cateID");; //return an array
    }
    function getProductsByManuID($manuID)
    {
        return  $this->db->select("SELECT * FROM products 
         INNER JOIN property
         ON products.ProductID = property.ProductID
         WHERE ManufacturerID = $manuID"); //return an array
    }

    public function getTotalRow()
    {
        $result = $this->db->select("SELECT COUNT(products.ProductID)  FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID");
        return  $result[0]['COUNT(products.ProductID)'];
    }
    function getAllProducts($page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $start = $perPage * ($page - 1);
        $params =  ['ii', &$start, &$perPage];
        //2. Viết câu SQL
        $result = $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
        LIMIT ?, ?", $params);
        return $result;
    }
    //Viet phuong th`
    function getData()
    {
        $result = $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID");
        return $result; //return an array
    }
    function paginate($url, $total, $page, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) $link = $link . "<a href='$url?page=$j'> $j </a>";
        return $link;
    }
    /**
     * Check lai ham nay.
     */
    function getTotal()
    {
        $idUser = $_SESSION['id_user'];
        $items = $this->db->select("SELECT * FROM `orders` 
        INNER JOIN products on products.ProductID = orders.id_product  
        WHERE orders.id_user = $idUser");
        $total = 0;
        $count = 0;

        foreach ($items as $key => $value) {
            $count += 1;
            $total = $total + $items[$key]['quantity'] * $items[$key]['Price'];
        }
        return [$total, $count];
    }

    //==================
    function Search($keyword)
    {
        $key = "%$keyword%";
        //var_dump(self::$conn);
        $params = ['s',&$key];
        $result = $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
         LIKE  ? ", $params);
        //var_dump($items);
        return $result; //return an array

    }


    /**
     * can than loi o ham nay.
     * !!!!!!!!!!!!!!!!!!!!1
     */
    public function countAll()
    {
        $sql = "SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID";
        $result = $this->db->select($sql);
        return $result->num_rows;
    }

    function Search_Paginate($start, $litmit, $keyword)
    {
        $key = "%$keyword%";
        $params = ['s' => $keyword];
        $result =  $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID
        WHERE ProductName  LIKE  ? 
        LIMIT $start,$litmit", $params);
        return $result; //return an array
    }
    public function getID()
    {
        $result = $this->db->select("SELECT * FROM products 
        INNER JOIN property ON products.ProductID = property.ProductID");
        return $result; //return an array

    }
    public function getUsers()
    {
        $result = $this->db->select("SELECT * FROM `users`");
        return $result; //return an array

    }

    public function getCon()
    {
        return $this->con;
    }
}
