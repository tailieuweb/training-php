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
            $banks = self::$_connection->multi_query($sql);
        } else {
            // SELECT DISTINCT users.id, banks.id,users.name, users.fullname, 
            // users.email, banks.cost FROM banks, users where users.id = banks.user_id
            $sql = 'SELECT DISTINCT users.id as user_id, banks.id as bank_id,users.name, users.fullname,users.email, banks.cost FROM banks, users where users.id = banks.user_id' ;
            $banks = $this->select($sql);
        }

        return $banks;
    }
}
