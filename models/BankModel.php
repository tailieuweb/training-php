<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{

    public function findBankById($id)
    {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $banks = $this->select($sql);

        return $banks;
    }


    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $id = $this->$input['id'];
        $sql = 'UPDATE `banks` SET 
                 user_id = "' . $input['user_id'] . '", 
                  cost="' . $input['cost'] . '"
                WHERE id = ' . $id;
        $user = $this->update($sql);
        var_dump($input['id']);
        var_dump($input['user_id']);
        var_dump($input['cost']);
        return $user;
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

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $banks = $this->select($sql);
        }

        return $banks;
    }
    // Decrypt id
    private function decryptID($md5Id)
    {
        $banks = $this->getBanks();
        foreach ($banks as $banks) {
            if (md5($banks['id'] . 'TeamJ-TDC') == $md5Id) {
                return $banks['id'];
            }
        }
        return NULL;
    }
}
