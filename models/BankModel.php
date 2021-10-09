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
}