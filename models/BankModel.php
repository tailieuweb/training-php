<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public function getAll()
    {
        $sql = "SELECT * FROM `banks`";
        $banks = $this->select($sql);
        return $banks;
    }
    /**
     * Get bank account
     * @param array $params
     * @return array
     */
    public function getBank($params = [])
    {
        $sql = "SELECT * FROM `banks` INNER JOIN users ON banks.user_id=users.id";
        $banks = $this->select($sql);
        return $banks;
    }
    /**
     * Delete bank account balance
     * @param $id
     * @return mixed
     */
    public function deleteBalanceById($id)
    {
        $sql = 'UPDATE `banks` SET `cost`="0" WHERE `user_id` ='  . $id;
        return $this->update($sql);
    }

    public function findBankInfoById($id)
    {
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $items = $this->select($sql);

        return $items;
    }

    public function findBankInfoByUserID($user_id)
    {
        $sql = 'SELECT * FROM banks WHERE user_id = ' . $user_id;
        $items = $this->select($sql);

        return $items;
    }

    /**
     * Update bank info
     * @param $input
     * @return mixed
     */
    public function updateBankInfo($input)
    {
        $sql = 'UPDATE banks SET 
                 cost = "' . $input['cost']  . '"
                WHERE user_id = ' . ($input['id']);
        $item = $this->update($sql);

        return $item;
    }

    /**
     * Insert bank info
     * @param $input
     * @return mixed
     */
    public function insertBankInfo($input)
    {
        $sql = "INSERT INTO `banks`(`user_id`,`cost`) VALUES ("
            . $input['id'] . ", "
            . $input['cost']
         . ")";

        $item = $this->insert($sql);

        return $item;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getBanksInfo($params = [])
    {
        //Keyword
        if (!empty($params['user_id'])) {
            $sql = 'SELECT * FROM banks as b JOIN users as u
            ON b.user_id = u.id
            WHERE user_id = ' . $params['user_id'];
            $items = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $items = $this->select($sql);
        }

        return $items;
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}