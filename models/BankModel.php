<?php
require_once 'models/BaseModel.php';
class BankModel extends BaseModel
{
    public function insertBank($input)
    {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
            "'" . $input['user_id'] . "', '" . $input['cost'] . "')";

        $user = $this->insert($sql);

        return $user;
    }

    public function updateBank($input)
    {
        $sql = 'UPDATE banks SET 
                 user_id = ' . $input['user_id'] . ', 
                 cost = ' . $input['cost'] . '
                WHERE id = ' . $input['id'];

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

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function findBankById($id)
    {
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {
        if($params === null) {
            return "error";
        }
        if(!is_array($params)) {
            return "error";
        }
        if(!is_string($params['keyword'])) {
            return "error";
        }
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE user_id LIKE "%' . $params['keyword'] . '%"';
        } else {
            $sql = 'SELECT * FROM banks';
        }

        $users = $this->select($sql);

        return $users;
    }
}
