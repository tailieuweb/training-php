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
            return 1;
        }
        if (!isset($params["user_id"])) {
            return 2;
        }
        if (is_object($params["user_id"]) || is_null($params["user_id"]) || is_array($params["user_id"]) || empty($params["user_id"])) {
            return 3;
        }
        if (is_bool($params["user_id"])) {
            return 4;
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
        if (is_string($input["id"])) {
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
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
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
         $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }

    public function findBankInfoByUserID($user_id)
    {
       
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
        if (is_string($input["id"]) || is_string($input["cost"])) {
            return [];
        }
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
        if (is_string($input["user_id"]) || is_string($input["cost"])) {
            return [];
        }
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

        $bank = $this->insert($sql);

        return $bank;
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