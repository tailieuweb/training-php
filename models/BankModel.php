<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
    //singuleton pattern bank
    public static function getInstance(){
        if(self::$_bank_instance  != null){
            return self::$_bank_instance;
        }
        self::$_bank_instance = new self;
        return self::$_bank_instance;
    }

    // find bank id
    public function findBankById($id) {
        $sql = 'SELECT * FROM banks WHERE user_id = '.$id;
        $bank = $this->select($sql);

        return $bank;
    }
    // public function findBankById($id) {
    //     $sql = 'SELECT * FROM banks WHERE id = '.$id;
    //     $user = $this->select($sql);

    //     return $user;
    // }
    //get user
    public function getUsers($params = []) {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);

        return $user;
    }
    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }


       /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id) {
      
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }



    /**
     * Update Bank
     * @param $input
     * @return mixed
     */
   
    public function updateBank($input) {
        $sql = 'UPDATE banks SET user_id ="'.$input['user_id'].'", cost = "'.$input['cost'].'" WHERE id = "'.$input['id'].'"';  
        $bank = $this->update($sql);
        return $bank;
    }   
    /**
     * Insert Bank
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
           
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $banks = self::$_connection->multi_query($sql);
            $banks = $this->select($sql);
            
        } else {
            //$sql = 'SELECT * FROM banks';
            $sql = 'SELECT * FROM banks join users on banks.user_id = users.id';
            $banks = $this->select($sql);
        }
        return $banks;
       
    }
}