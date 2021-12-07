<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public function getBanks($params = [])
    {
        if (!empty($params['keyword'])) {
            $key = str_replace('"', '', $params['keyword']);
            $sql = 'SELECT * FROM banks WHERE cost LIKE "%' . $key . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {

            $sql = 'SELECT * FROM banks join users on users.id = banks.user_id';
            $banks = $this->select($sql);
        }

        return $banks;
    }

    public function findBankById($id)
    {
        if (!is_numeric($id)) return 'error';

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
        if (
            $input['id'] == null || !is_numeric($input['id']) || empty($input['id']) || is_object($input['id'])
            || is_array($input['id']) || is_bool($input['id']) || $input['id'] == '' || $input['id'] <= 0
            || empty($input) || $input['user_id'] == null || is_array($input['user_id'])||!is_numeric($input['user_id'])
            || is_object($input['user_id']) || is_double($input['user_id']) || $input['user_id'] <= 0
            || empty($input['user_id']) || $input['user_id'] == 0 || $input['user_id'] == '' || is_bool($input['user_id'])
            || $input['cost'] == null || is_array($input['cost']) || is_object($input['cost'])
            || $input['cost'] == '' || empty($input['cost']) || is_bool($input['cost'])||!is_numeric($input['cost'])

        ) {
            return "error";
        }
        $sql = "INSERT INTO `banks`(`id`, `user_id`, `cost`) VALUES ('" . $input['id'] . "','" . $input['user_id'] . "','" . $input['cost'] . "')";

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
}
