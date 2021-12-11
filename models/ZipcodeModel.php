<?php
require_once 'BaseTwoAdmin.php'; 

class ZipCodeModel extends BaseTwoAdmin {
    
    // Lay danh sach: 
    public function getZipCode()
    {
        $sql = 'SELECT * FROM zipcode';
        $users = $this->select($sql);
        return $users;
    }
    public function getZipCodeById($id)
    {
        $sql = 'SELECT * FROM `zipcode`WHERE  zipcode.id =  '.$id;
        $users = $this->select($sql);
        return $users;
    }
    public function getUserByIdZipCode($id)
    {
        $sql = 'SELECT users.username FROM `zipcode`,`users` WHERE `zipcode`.`user_id` = `users`.`id` AND zipcode.user_id =  '.$id;
        $users = $this->select($sql);
        return $users;
    }
    public function getUser()
    {
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);
        return $users;
    }
    public function insertZipcode($input)
    {
        if(!empty($input['user_id']) && !empty($input['discount']) && !empty($input['status'])){
            $sql = "INSERT INTO `webbanhkem`.`zipcode` (`zipcode`, `user_id` ,`discount`,`status`)
            VALUES (" .
            "'" . $this->getToken(8) 
            . "','" . $input['user_id'] 
            . "','" . $input['discount'] 
            . "','" . $input['status'] . "')";
           $bank = $this->insert($sql);
           return $bank;
        }else{
            return false;
        }
        
    }
    public function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }
    public function deleteZipcode($id)
    {
        $sql = "DELETE FROM zipcode WHERE id =  " . $id ;
        $bank = $this->delete($sql);
        return $bank;
    }
    public function updateZipcode($input)
    {
        if(!empty($input['user_id']) && !empty($input['discount']) && !empty($input['status'])){
            $sql = 'UPDATE zipcode SET 
            user_id = "' . $input['user_id'] . '", 
            discount = "' . $input['discount'] . '", 
            status = "' . $input['status'] . '"
            WHERE id = ' . $input['id'];
            $bank = $this->update($sql);
            return $bank;
        }else{
            return false;
        }
    }
}