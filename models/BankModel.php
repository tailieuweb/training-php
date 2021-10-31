<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM banks WHERE cost LIKE %'.$keyword.'%'. ' OR user_id LIKE %'.$keyword.'%' ;
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
    public function updateUser($input) {
      
        $temp = 'SELECT version FROM users WHERE id = '.$input['id'].'';
        $newTemp = $this->select($temp);
        
        if($newTemp[0]['version'] == $input['version']){
            $newV = $input['version']+1;
             $sql = 'UPDATE users SET 
                 name = "' . $input['name'] .'", 
                 email = "'.$input['email'].'",
                 fullname = "'.$input['fullname'].'",
                 password="'. md5($input['password']) .'", type = "'.$input['type'].'", version = "'.$newV.'"
                WHERE id = ' . $input['id'] ;
            $user = $this->update($sql);  
            header('location: list_users.php?success');  
            return $user;         
        } 
        else{                
           header('location: list_users.php?err');  
        }
        
        
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
        "'" . $input['user_id'] . "', '"
        . $input['cost'] . "', '"
        . "')";
        $bank = $this->insert($sql);
      
        return $bank;
                
    }

    /**
     * Search banks
     * @param array $param
     * @return array
     */
    public function getBanks($params = []) {
        //Keyword
       
        if (!empty($params['keyword'])) {
           
            $sql = 'SELECT * FROM banks WHERE cost LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $banks = self::$_connection->multi_query($sql);
            $banks = $this->select($sql);
            
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }
        return $banks;
       
    }
}