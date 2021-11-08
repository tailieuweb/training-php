<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    protected static $_instance;
  
    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    

    public function findBankByUserId($id) {
        $sql = 'SELECT * FROM banks WHERE user_id = '.$id;
        $bank = $this->select($sql);
        return $bank;
    }

    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);
        return $bank;
    }

    public function insertBank($input) {

        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
                "'" . $input['user_id'] . "', '".$input['cost']. "')";

        $bank = $this->insert($sql);

        return $bank;
    }
    
    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
                 cost = "'. $input['cost'] .'",
                 user_id = "' . $input['user_id']. '"
                 WHERE user_id = ' . $input['user_id'];
                 $bank = $this->update($sql);
              return $bank;
           }
           
    public function deleteBankById($id) {
        $sql = 'DELETE FROM banks WHERE user_id = '.$id;
        return $this->delete($sql);

    }

   
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE id LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }

        return $banks;
    }

    public static function getInstance(){
        if(self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}