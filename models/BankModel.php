<?php

require_once 'BaseModel.php';


class BankModel extends BaseModel
{
    protected static $_instance;
    /**
     *  Get Bank By Id
     */
    public function getBankById($id)
    {
        // if(!$this->_error){
        //     return false;
        // }
        $id = is_numeric($id) ? $id : NULL;
        if ($id == null) {
            return false;
        }
        $sql = 'SELECT * FROM `banks` WHERE `id` = ' . $id;
        $bank = $this->select($sql);
        return isset($bank[0]) ? $bank[0] : false;
    }
    /**
     *  Get Bank By User Id
     */
    public function getBankByUserId($userId)
    {
        $userId = is_numeric($userId) ? $userId : NULL;
        if($userId==null){
            return false;
        }
        $sql = 'SELECT `banks`.*
        FROM `users`,`banks` 
        WHERE `users`.`id` = `banks`.`user_id` 
        AND `users`.`id` = ' . $userId;
        $bank = $this->select($sql);
        return isset($bank[0]) ? $bank[0] : false;
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($userId, $cost)
    {
        if (is_numeric($userId) && is_numeric($cost)) {
            // SQL
            $sql = "INSERT INTO `banks`(`user_id`, `cost`) 
                    VALUES ('" . $this->BlockSQLInjection($userId) . "','" . $this->BlockSQLInjection($cost) . "')";
            $bank = $this->insert($sql);
            return $bank;
        }
        return false;
    }

    /**
     * Insert bank with id
     * @param $input
     * @return mixed
     */
    public function insertBankWithId($bankId, $userId, $cost)
    {
        if (is_numeric($bankId) && is_numeric($userId) && is_numeric($cost)) {
            $sql = "INSERT INTO `banks`(`id`, `user_id`, `cost`) 
            VALUES ('" . $this->BlockSQLInjection($bankId) . "','" . $this->BlockSQLInjection($userId) . "','" . $this->BlockSQLInjection($cost) . "')";
            $bank = $this->insert($sql);
            return $bank;
        }
        return false;
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($userId,$cost)
    {
        if ( is_numeric($userId) && is_numeric($cost)) {
            $bank = $this->getBankByUserId($userId);
            if ($bank) {
                $sql = 'UPDATE `banks`
                        SET `cost` = "' . $cost . '"
                        WHERE `user_id` = ' . $userId;
                 return $this->update($sql);
            }
        }
        return false;
    }


    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankByUserId($id)
    {
        $id = is_numeric($id);
        if($id==null){
            return false;
        }
        $sql = 'DELETE FROM `banks` WHERE `user_id` = ' . $id;
        return $this->delete($sql);
    }
    /**
     * Get all Banks
     */
    public function getBanks()
    {
        $sql = 'SELECT * FROM `banks`';
        $banks = $this->select($sql);
        return $banks;
    }

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
