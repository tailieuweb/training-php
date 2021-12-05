<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function findBankById($id) {
        if(!is_numeric($id)) return'error';


        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findBank($keyword) {
        $sql = 'SELECT * FROM banks WHERE user_id LIKE %'.$keyword.'%' ;
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
        if(!is_numeric($id)) return'error';
        if(is_double($id)) return 'error';
      
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }



    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        if($input['user_id'] > 0 && $input['cost'] > 0 ){
            $sql = "UPDATE `banks` SET `user_id` = " . "'" . $input['user_id'] . "', cost = " . "'" . $input['cost'] . "' WHERE id = " . "'" . $input['id'] . "'";
            $bank = $this->update($sql);
            return $bank;
        }
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        if($input['user_id'] > 0 && $input['cost'] > 0 ){
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`,`cost`) VALUES (" . "'" . $input['user_id'] . "', '" . $input['cost'] . "')";
        $bank = $this->insert($sql);
        return $bank;
        }
    }
   /**
     * Search banks
     * @param array $param
     * @return array
     */
    public function getBanks($params = []) {
        //Keyword
       
        if (!empty($params['keyword'])) {
           
            $sql = 'SELECT * FROM banks WHERE user_id LIKE "%' . $params['keyword'] .'%"';

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