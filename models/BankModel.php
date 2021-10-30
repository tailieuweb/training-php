<?php

require_once 'BaseModel.php';
require_once 'UserModel.php';


class BankModel extends BaseModel
{
    
    protected static $_instance;
    // get Bank by id($id)
    //get all
    public function getAll()
    {
        $sql = 'SELECT * FROM `banks`';
        $bank = $this->select($sql);

        return $bank;
    }
    public function getBankById($id)
    {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM `users` INNER JOIN `banks` WHERE `users`.`id` = `banks`.`user_id` AND `banks`.`id` = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }
    /**
     * Get Banks follow User Id
     * Get all Banks
     */
    public function getBanks($params = [])
    {
        if (!empty($params['user-id'])) {
            $userModel = new UserModel();
            $user = $userModel->findUserById($this -> BlockSQLInjection($params['user-id']));
            $userId = NULL;
            if (!empty($user)) {
                $userId = $user[0]['id'];
            }
            $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id` AND `banks`.`user_id` = ' . $userId;
            $banks = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id`';
            $banks = $this->select($sql);
        }
        return $banks;
    }
        /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        // SQL
        $sql = "INSERT INTO `banks`(`user_id`, `cost`) 
        VALUES ('" . $this -> BlockSQLInjection($input['user_id']) . "','" . $this -> BlockSQLInjection($input['cost']) . "')";
        $bank = $this->insert($sql);

        return $bank;
    }
    // Decrypt id
    private function decryptID($md5Id)
    {
        $banks = $this->getBanks();
        foreach ($banks as $bank) {
            if (md5($bank['id'] . 'TeamB-TDC') == $md5Id) {
                return $bank['id'];
            }
        }
        return NULL;
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    private function BlockSQLInjection($str) {
        return str_replace(array("'", '"', "''"),array('&quot;','&quot;'),$str);
    }
}