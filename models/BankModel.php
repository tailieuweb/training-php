<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public static function getInstance()
    {
        if(self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
    
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
}