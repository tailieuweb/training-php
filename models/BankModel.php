<?php 
require_once 'BaseModel.php';
class BankModel extends BaseModel {
    public function getAll() {
        $sql = 'SELECT * FROM banks';
        $user = $this->select($sql);
        return $user;
    }

    // Singleton pattern:
    public static function getInstance() {
        if (self::$bankInstance !== null) {
            return self::$bankInstance;
        }
        self::$bankInstance = new self();
        return self::$bankInstance;
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
        if (is_object($id) || is_null($id) || is_array($id)) {
            return [];
        }
        $sql = 'SELECT * FROM banks WHERE id = ' . mysqli_real_escape_string(self::$_connection, $id);
        $items = $this->getData_With_Multi_Query($sql);

        return $items;
    }

    public function findBankInfoByUserID($user_id)
    {
        if (is_object($user_id) || is_null($user_id) || is_array($user_id)) {
            return [];
        }
        $sql = 'SELECT * FROM banks WHERE user_id = ' . mysqli_real_escape_string(self::$_connection, $user_id);
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
                WHERE id = ' . ($input['id']);
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
        $sql = "INSERT INTO `banks` VALUES (" . 
            0 . ", "
            . $input['user_id'] . ", "
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
            $sql = 'SELECT * FROM banks 
            WHERE user_id = ' . mysqli_real_escape_string(self::$_connection, $params['user_id']);
            $items = $this->getData_With_Multi_Query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $items = $this->select($sql);
        }

        return $items;
    }
}