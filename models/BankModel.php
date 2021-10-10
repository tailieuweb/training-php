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
     * Search users
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] . '%"';
        } else {
            $sql = 'SELECT * FROM banks';
        }

        $users = $this->select($sql);

        return $users;
    }
}
