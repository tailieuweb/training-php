<?php
require_once "../models/BaseAdminModel.php";



class ChartOrderModel extends BaseAdminModel
{
    
    public function getAllOrderByMonth($month)
    {
        $sql = "SELECT * 
        FROM checkouts  
        WHERE MONTH(addedDate) = $month;";
        $id = $this->select($sql);
        return $id;
    }
   
    public function getUserByMonthInactive($month)
    {
        
        if (!is_numeric($month) || $month < 0 || is_double($month)) {
            return 'Not invalid';
        } else {
            $sql = "SELECT * from users where MONTH(date) = $month AND action = 0";
            $id = $this->select($sql);
            return $id;
        }
    }
    public function getUserByMonthActive($month)
    {
        if (!is_numeric($month) || $month < 0 || is_double($month)) {
            return 'Not invalid';
        } else {
            $sql = "SELECT * from users where MONTH(date) = $month AND action = 1";
            $id = $this->select($sql);
            return $id;
        }
    }
    // Đếm products:
    public function countProducts()
    {
        $sql = "SELECT * from products order by id desc";
        $id = $this->select($sql);
        return $id;
    }
     // Đếm manufactures:
     public function countManufactures()
     {
         $sql = "SELECT * from manufactures order by manu_id desc";
         $id = $this->select($sql);
         return $id;
     }
    // Đếm manufactures:
    public function countOrders()
    {
        $sql = "SELECT * from checkouts  order by id desc";
        $id = $this->select($sql);
        return $id;
    }
    public function sumTotal()
    {
        $sql = "SELECT sum from checkouts where status = 1";
        $id = $this->select($sql);
        return $id;
    }
}