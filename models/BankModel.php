<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{

    public function findBankById($id)
    {
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }

    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        $subString = substr($id, 36, -38);
        $result = base64_decode($subString);
        $sql = "DELETE FROM banks WHERE MD5(banks.id) = '" . md5($result) . "'";
        return $this->delete($sql);
    }
    /**
     * Update bank
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $sql = "UPDATE `banks` SET `user_id` = " . "'" . $input['user_id'] . "', cost = " . "'" . $input['cost'] . "' WHERE id = " . "'" . $input['id'] . "'";
        $bank = $this->update($sql);
        return $bank;
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`,`cost`) VALUES (" . "'" . $input['user_id'] . "', '" . $input['cost'] . "')";

        $bank = $this->insert($sql);

        return $bank;
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
            if (is_object($params['keyword'])) {
                return false;
            }
            $params['keyword'] = str_replace(
                array(
                    ',', ';', '#', '/', '%', 'select', 'update', 'insert', 'delete', 'truncate',
                    'union', 'or', '"', "'", 'SELECT', 'UPDATE', 'INSERT', 'DELETE', 'TRUNCATE', 'UNION', 'OR'
                ),
                array(''),
                $params['keyword']
            );

            $sql = 'SELECT * FROM banks WHERE cost LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT banks.id as bank_id,users.name,users.fullname,users.email,banks.cost,users.type,users.id,banks.user_id
            FROM `banks`,`users` 
            WHERE banks.user_id = users.id';
            $banks = $this->select($sql);
        }
        return $banks;
    }
}
