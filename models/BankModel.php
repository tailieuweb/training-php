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
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }

    public function findBankInfoById($id)
    { 
         $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
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
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
            "'" . $input['user_id'] . "', '" . $input['cost'] . "')";

        $bank = $this->insert($sql);

        return $bank;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    // public function getBanksInfo($params = [])
    // {
    //     //Keyword
    //     if (!empty($params['user_id'])) {
    //         $sql = 'SELECT * FROM banks 
    //         WHERE user_id = ' . $params['user_id'];
    //         $items = $this->select($sql);
    //     } else {
    //         $sql = 'SELECT * FROM banks';
    //         $items = $this->select($sql);
    //     }

    //     return $items;
    // }
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

}