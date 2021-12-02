<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
 
    public function findBankById($id) {
<<<<<<< HEAD
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);

        return $bank;
    }
    public function findBankNew() {
        $sql = 'SELECT MAX(id) FROM `bank`';
        $bank = $this->select($sql);
        return $bank;
    } 

    /**
     * Authentication bank
     * @param $bankName
     * @param $password
     * @return array
     */

    /**
=======
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
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-GetBank
     * Delete bank by id
     * @param $id
     * @return mixed
     */
<<<<<<< HEAD
    public function deletebankById($id) {
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

=======
    public function deleteBankById($id) {
        if(is_int($id)==true||is_string($id)==true){
            $sql = 'DELETE FROM banks WHERE id = '.'$id';
            return $this->delete($sql);      
        }
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-GetBank
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
<<<<<<< HEAD
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }

        return $banks;
=======
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
>>>>>>> 2-php-202109/2-groups/3-C/2-32-Tram-phpunit-GetBank
    }
}