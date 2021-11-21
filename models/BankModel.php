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

        $id = is_numeric($id) ? $id : NULL;
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
        $sql = 'SELECT `banks`.*
        FROM `users`,`banks` 
        WHERE `users`.`id` = `banks`.`user_id` 
        AND `users`.`id` = ' . $userId;
        $bank = $this->select($sql);
        return isset($bank[0]) ? $bank[0] : false;
    }
    /**
     *  Find User Id
     */
    public function findUserBankById($id)
    {
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
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
        VALUES ('" . $input['user_id'] . "','" . $input['cost'] . "')";
        $bank = $this->insert($sql);

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
                user_id = "' . $input['user_id']  . '",
                cost = "' . $input['cost']  . '"
                WHERE id = ' . ($input['id']);
        $bank = $this->update($sql);

        return $bank;
    }


    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }
    /**
     * Get all Banks
     */
    public function getBanks($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $keyword = $params['keyword'];
            $sql = 'SELECT * FROM banks WHERE id = ' . $keyword;
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##. $keyword1
            //$users = self::$_connection->multi_query($sql);
            $bank = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `banks` ORDER BY `id`';
            $bank = $this->select($sql);
        }

        return $bank;
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
