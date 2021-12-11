<?php
require_once 'BaseTwoAdmin.php'; 
class OrderModel extends BaseTwoAdmin {
    protected static $_instance;

    public function getOrders()
    {
        $sql = 'SELECT checkouts.id , checkouts.user_id,checkouts.firstname,checkouts.lastname,checkouts.addedDate,checkouts.address,checkouts.address,checkouts.phone,checkouts.notes,checkouts.sum,checkouts.status,users.username FROM checkouts JOIN users ON checkouts.user_id = users.id';
        $user = $this->select($sql);
        return $user;
    }
    public function getOrderItemById($id)
    {
        $sql = 'SELECT carts.pro_id , products.name , products.price, carts.quantity FROM carts INNER JOIN products ON carts.pro_id = products.id WHERE carts.order_id = '.$id;
        $user = $this->select($sql);
        return $user;
    }
    public function getCheckoutById($id)
    {
        $checkout = 'SELECT id FROM checkouts';
        $checkouts = $this->select($checkout);
        $check = null;
        foreach($checkouts as $idproty){
            $md5 = md5($idproty['id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'SELECT * FROM checkouts WHERE id = ' . $idproty['id'];
                $check = $this->select($sql);
            }
        }
        return $check;
    
    }
    public function updateCheckout($input)
    {
        
        $checkout = 'SELECT * FROM checkouts';
        $checkouts = $this->select($checkout);
        $check = null;
        foreach($checkouts as $idprotys){
            $md5 = md5($idprotys['id'] . 'chuyen-de-web-2');
            if($md5 == $input['id'] ){
                if($input['version'] == md5($idprotys['version'].'chuyen-de-web-2')){
                    $versionNew = (int)$idprotys['version'] + 1;
                    $sql = 'UPDATE checkouts SET 
                    status = "' . $input['status'] . '",
                    version = "' . $versionNew. '"
                    WHERE id = ' . $idprotys['id'];
                    $check = $this->update($sql);
                }else{
                    return false;
                }
            }
        }
        return $check;
    }
    public function DeleteCheckouts($id) {
        $checkout = 'SELECT * FROM checkouts';
        $checkouts = $this->select($checkout);
        $check = null;
        
        foreach($checkouts as $idproty){
            $md5 = md5($idproty['id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'DELETE FROM checkouts WHERE id = '.$idproty['id'] ;
                $check = $this->delete($sql);
            }
        }
        return $check;
       
    }
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}