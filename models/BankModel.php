<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public function getBanks($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $users = $this->select($sql);
        }

        return $users;
    }
    
    public function findBankById($id)
    {
        if(!is_numeric($id)) return 'error';
        
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }
    /**
     * Update bank
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $sql = 'UPDATE banks SET 
                 user_id = "' . mysqli_real_escape_string(self::$_connection, $input['user_id']) . '", 
                 cost="' . $input['cost'] . '"
                WHERE id = ' . $input['id'];

        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
            "'" . $input['user_id'] . "', '" . $input['cost'] . "')";

        $bank = $this->insert($sql);

        return $bank;
    }

    /**
     * Delete banks by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        if(is_string($id) || is_array($id) || is_object($id) || $id == null || $id == ''){
            return null;
        }
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}