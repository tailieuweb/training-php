<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function findBankById($id) {  
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);    
        return $bank;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id) {
      
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }



    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
            
        $sql = 'UPDATE banks SET user_id ="'.$input['user_id'].'", cost = "'.$input['cost'].'" WHERE id = "'.$input['id'].'"';

        $bank = $this->update($sql);
        return $bank;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        $sql = 'INSERT INTO app_web1.banks (user_id,cost) VALUES ('.$input['user_id'].', '.$input['cost'].')';
        $bank = $this->insert($sql);
        return $bank;
        
                
    }

    /**
     * Search users
     * @param array $param
     * @return array
     */
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
           
            $sql = 'SELECT * FROM banks WHERE cost LIKE "%' . $params['keyword'] .'%"';
            $banks = $this->select($sql);
            
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }
        return $banks;
       
    }
}