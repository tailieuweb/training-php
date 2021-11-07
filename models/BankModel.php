<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
               user_id = "'.$input['user_id'].'",
                cost = "'.$input['cost'].'"
                WHERE id = ' . $input['id'];
        //var_dump($sql); die();
        $bank = $this->update($sql);
        return $bank;
    }
        
        
    

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
        "'" . $input['user_id'] . "', '"
        . $input['cost']. "')";
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

    public function deleteBankByUserId($user_id) {
      
        $sql = 'DELETE FROM banks WHERE user_id = '.$user_id;
        return $this->delete($sql);

    }
    // public static function getInstance() {
    //     if (self::$_instance !== null){
    //         return self::$_instance;
    //     }
    //     self::$_instance = new self();
    //     return self::$_instance;
    // }
}