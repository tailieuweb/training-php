<?php

//require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    private static $_instance;

    private function __clone()
    {
    }
    private function __wakeup()
    {
    }
    private function __construct()
    {
    }

    public static function getInstance() {
        if(self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function findBankByUserId($user_id)
    {
        $sql = "SELECT * FROM banks WHERE user_id = $user_id; ";
        $user = $this->select($sql);

        return $user;
    }

    public function findBankById($id)
    {
        $sql = "SELECT * FROM banks WHERE id = $id; ";
        $user = $this->select($sql);

        return $user;
    }


    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankByID($id)
    {
        $sql = "DELETE FROM banks WHERE id = $id; ";
        return $this->delete($sql);
    }

    /**
     * Update bank
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $user_id = $input['user_id'];
        $cost = $input['cost'];
        $id = $input['id'];

        $sql =
            "UPDATE `banks` 
        SET `user_id` = '$user_id'
        , `cost` = $cost
        WHERE `id` = $id; ";

        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        $user_id = $input['user_id'];
        $cost = $input['cost'];

        $sql = "INSERT INTO `banks` (`user_id`, `cost`)
                VALUES ($user_id, $cost);";

        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Search banks
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            // $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            // $banks = $this->select($sql);
        }
        $banks = $this->select($sql);
        return $banks;
    }
}
