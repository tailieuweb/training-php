<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    private static $_bank_instance;

    // Singleton pattern:
    public static function getInstance()
    {
        if (self::$_bank_instance !== null) {
            return self::$_bank_instance;
        }
        self::$_bank_instance = new self();
        return self::$_bank_instance;
    }

    /**
     * Get bank accounts
     * @param array $params
     * @return array
     */
    public function getBankAccounts($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT users.*, banks.id AS bank_id, banks.cost AS cost 
                FROM users 
                INNER JOIN banks 
                ON banks.user_id = users.id 
                WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"'
                . ' ORDER BY id ASC';
            $banks = $this->select($sql);
        } else {
            $sql = "SELECT users.*, banks.id AS bank_id, banks.cost AS cost 
                FROM users 
                INNER JOIN banks 
                ON banks.user_id = users.id 
                ORDER BY id ASC";
            $banks = $this->select($sql);
        }
        return $banks;
    }

    /**
     * Get bank account by user id
     * @param array $user_id
     * @return array
     */
    public function getBankAccountByUserID($user_id)
    {
        //Keyword
        $sql = 'SELECT users.*, banks.id AS bank_id, banks.cost AS cost 
            FROM users 
            INNER JOIN banks 
            ON banks.user_id = users.id 
            WHERE users.id LIKE ' . $user_id
            . ' ORDER BY id ASC';
        $banks = $this->select($sql);
        return $banks;
    }

    /**
     * Delete bank account balance
     * @param $id
     * @return mixed
     */
    public function deleteBalanceByUserId($id)
    {
        if(!isset($id)){
            return false;
        }
        if(!is_numeric($id)){
            return false;
        }
        if(!is_int($id)){
            return false;
        }
      if($id <= 0){
          return false;
      }
        $sql = 'UPDATE `banks` SET `cost`="0" WHERE `user_id` ='  . $id;
        return $this->update($sql);
    }

    /**
     * Get bank account info by bank id:
     * @param $id
     * @return mixed
     */
    public function findBankInfoById($id)
    {
        if(!isset($id)){
            return false;
        }
        if(!is_numeric($id)){
            return false;
        }
        if(!is_int($id)){
            return false;
        }
      if($id <= 0){
          return false;
      }
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $items = $this->select($sql);

        return $items;
    }

    /**
     * Get bank account info by user id:
     * @param $id
     * @return mixed
     */
    public function findBankInfoByUserID($user_id)
    {
        if(!isset($user_id)){
            return false;
        }
        if(!is_numeric($user_id)){
            return false;
        }
        if(!is_int($user_id)){
            return false;
        }
      if($user_id <= 0){
          return false;
      }
        $sql = 'SELECT * FROM banks WHERE user_id = ' . $user_id;
        $items = $this->select($sql);

        return $items;
    }

    /**
     * Update bank account info
     * @param $input
     * @return mixed
     */
    public function updateBankInfo($input)
    {
        $sql = 'UPDATE banks SET 
                 cost = "' . $input['cost']  . '"
                WHERE id = ' . ($input['id']);
        $item = $this->update($sql);

        return $item;
    }

    /**
     * Insert bank account
     * @param $input
     * @return mixed
     */
    public function insertBankInfo($input)
    {
        $sql = "INSERT INTO `banks` VALUES (" .
            0 . ", "
            . $input['user_id'] . ", "
            . $input['cost']
            . ")";

        $item = $this->insert($sql);

        return $item;
    }
}
