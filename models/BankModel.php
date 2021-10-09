<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public function findBankById($id)
    {
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $user;
    }

    public function findBank($keyword)
    {
        $sql = 'SELECT * FROM banks WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $bank = $this->select($sql);

        return $bank;
    }

    /**
     * Delete banks by id
     * @param $id
     * @return mixed
     */
    public function deleteBanksById($id)
    {
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }

     /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $sql = 'UPDATE banks SET 
                 user_ID = "' . mysqli_real_escape_string(self::$_connection, $input['user_ID']) .'", 
                 cost ="'. md5($input['cost']) .'"
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
            "'" . $input['user_id'] . "', '" . md5($input['cost']) . "')";

        $bank = $this->insert($sql);

        return $bank;
    }

}