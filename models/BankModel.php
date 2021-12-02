<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
 
    public function findBankById($id) { 
        if (is_int($id)==true||is_string($id)==true){
            $sql = 'SELECT * FROM banks WHERE id = '.$id;
            $bank = $this->select($sql);
            if($bank!=null){
                return $bank;
            }
            return $bank='error';
        }
        else{
            return $bank='error';
        }   
    }
    public function findBank($keyword) {
        if (is_int($keyword)==true||is_string($keyword)==true){
            $sql = 'SELECT * FROM banks WHERE user_id LIKE "%'.$keyword.'%"';
            $bank = $this->select($sql);
            if($bank!=null){
                return $bank;
            }
            return $bank='error';
        }
        else{
            return $bank='error';
        }  
    } 

    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id) {
        if(is_int($id)==true||is_string($id)==true){
            $sql = 'DELETE FROM banks WHERE id = '.'$id';
            return $this->delete($sql);      
        }
    }

    /**
     * Update bank
     * @param $input
     * @return mixed
     */
    public function updatebank($input) {
        $sql = 'UPDATE banks SET 
                 user_id = "' . $input['user_id'] .'", 
                 cost ="' . $input['cost'] .'",                 
                 version = version + 0.1
                WHERE id = ' . $input['id'];
        $bank = $this->update($sql);
        return $bank;
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertbank($input) {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
        "'" . $input['user_id'] ."', '".($input['cost'])."')";

        $bank = $this->insert($sql);

        return $bank;
    }

    /**
     * Search banks
     * @param array $params
     * @return array
     */
        public function getBanks($params = []) {  
        if (isset($params['keyword'])) {
            if(is_int($params['keyword'])==true||is_string($params['keyword'])==true){
                $sql = 'SELECT * FROM banks WHERE user_id LIKE "%' . $params['keyword'] .'%"';
                $bank = $this->select($sql);
                if($bank!=null){
                    return $bank;
                }            
                return $bank='error';
            }
            return $bank='error';
            
        } else {
            $sql = 'SELECT * FROM banks';
            $bank = $this->select($sql);
        }
        return $bank;
    }
}