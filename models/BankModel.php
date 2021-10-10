<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public function findBankById($id)
    {
        
        $sql = 'SELECT * FROM bank WHERE id = ' . $id;
        $banks = $this->select($sql);

        return $banks;
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
            $sql = 'SELECT * FROM bank WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM bank';
            $banks = $this->select($sql);
        }

        return $banks;
    }

    public function insertUser_bank($input) {
        $sql = "INSERT INTO `bank` (`name`, `fullname`, `sdt`, `email`, `stk`) VALUES (" .
            "'" . $input['name'] . "', '".$input['fullname']."','".$input['sdt']."', '".$input['email']."','".$input['stk']."')";

        $user = $this->insert_bank($sql);

        return $user;
    }
    protected function insert_bank($sql) {
        $result = $this->query($sql);
        return $result;
    }


}