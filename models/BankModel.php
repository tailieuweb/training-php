<?php 
require_once 'BaseModel.php';
class BankModel extends BaseModel {
    protected static $bankInstance;
    
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
        if (!is_array($params)) {
            return [];
        }
        if (!isset($params["user_id"])) {
            return [];
        }
        if (is_object($params["user_id"]) || is_null($params["user_id"]) || is_array($params["user_id"]) || empty($params["user_id"])) {
            return [];
        }
        if (is_bool($params["user_id"])) {
            return [];
        }
        if (!is_int($params["user_id"])) {
            return [];
        } else if ($params["user_id"] < 0){
            return [];
        }
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
        if (!is_array($id)) {
            return [];
        }
        if (!isset($id)) {
            return [];
        }
        if (is_object($id) || is_null($id) || is_array($id) || empty($id)) {
            return [];
        }
        if (is_bool($id)) {
            return [];
        }
        if (!is_int($id)) {
            return [];
        } else if ($id < 0){
            return [];
        }
        $sql = 'UPDATE `banks` SET `cost`="0" WHERE `user_id` ='  . $id;
        return $this->update($sql);
    }

    public function findBankInfoById($id)
    {
        if (!isset($id)) {
            return [];
        }
        if (is_object($id) || is_null($id) || is_array($id) || empty($id)) {
            return [];
        }
        if (is_bool($id)) {
            return [];
        }
        if (!is_int($id)) {
            return [];
        } else if ($id < 0){
            return [];
        }
        $sql = 'SELECT * FROM banks WHERE id = ' . mysqli_real_escape_string(self::$_connection, $id);
        $items = $this->getData_With_Multi_Query($sql);

        return $items;
    }

    public function findBankInfoByUserID($user_id)
    {
        if (!is_array($user_id)) {
            return [];
        }
        if (!isset($user_id)) {
            return [];
        }
        if (is_object($user_id) || is_null($user_id) || is_array($user_id) || empty($user_id)) {
            return [];
        }
        if (is_bool($user_id)) {
            return [];
        }
        if (!is_int($user_id)) {
            return [];
        } else if ($user_id < 0){
            return [];
        }
        $sql = 'SELECT * FROM banks WHERE user_id = ' . mysqli_real_escape_string(self::$_connection, $user_id);
        $items = $this->getData_With_Multi_Query($sql);

        return $items;
    }

    /**
     * Update bank info
     * @param $input
     * @return mixed
     */
    public function updateBankInfo($input)
    {
        if (!is_array($input)) {
            return [];
        }
        if (!isset($input)) {
            return [];
        }
        if (is_object($input["cost"]) || is_null($input["cost"]) || is_array($input["cost"]) || empty($input["cost"])) {
            return [];
        }
        if (is_object($input["id"]) || is_null($input["id"]) || is_array($input["id"]) || empty($input["id"])) {
            return [];
        }
        if (is_bool($input["cost"]) || is_bool($input["id"])  ) {
            return 5;
        }
        if (is_string($input["id"]) || is_string($input["cost"])) {
            return [];
        }
        if (!is_int($input["id"])) {
            return [];
        } else if ($input["id"] < 0 || $input["cost"] < 0){
            return [];
        }
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
        if (!is_array($input)) {
            return [];
        }
        if (!isset($input)) {
            return [];
        }
        if (is_object($input["cost"]) || is_null($input["cost"]) || is_array($input["cost"]) || empty($input["cost"])) {
            return [];
        }
        if (is_object($input["user_id"]) || is_null($input["user_id"]) || is_array($input["user_id"]) || empty($input["user_id"])) {
            return [];
        }
        if (is_bool($input["cost"]) || is_bool($input["user_id"])  ) {
            return [];
        }
        if (is_string($input["user_id"]) || is_string($input["cost"])) {
            return [];
        }
        if (!is_int($input["user_id"])) {
            return [];
        } else if ($input["user_id"] < 0 || $input["cost"] < 0){
            return [];
        }
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
        if (!is_array($params)) {
            return [];
        }
        if (is_object($params["user_id"]) || is_null($params["user_id"]) || is_array($params["user_id"]) || empty($params["user_id"])) {
            return [];
        }
        if (is_bool($params["user_id"])) {
            return [];
        }
        if (!is_int($params["user_id"])) {
            return [];
        } else if ($params["user_id"] < 0){
            return [];
        }
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