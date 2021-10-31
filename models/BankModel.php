<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{

    public function findBankById($id)
    {
        $sql1 = 'SELECT id FROM banks';
        $allUser = $this->select($sql1);
        $user = null;
        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $id) {
                $sql = 'SELECT banks.id as bank_id,users.name,users.email,banks.cost,users.type,users.id,banks.user_id,banks.version 
                FROM `banks`,`users` 
                WHERE banks.user_id = users.id AND banks.id = ' . $key['id'];
                $user = $this->select($sql);
            }
        }
        return $user;
    }

    public function findUser($keyword)
    {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $user = $this->select($sql);

        return $user;
    }

    public function auth($userName, $password)
    {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $md5Password . '"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        //Lấy id của tất cả user 
        $sql1 = 'SELECT id FROM banks';
        $allUser = $this->select($sql1);

        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $id) {
                $sql = 'DELETE FROM banks WHERE id = ' . $key['id'];
                return $this->delete($sql);
            }
        }
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */


    public function updateBank($input, $version)
    {
        $sql1 = 'SELECT id FROM banks';
        $error = false;
        $allUser = $this->select($sql1);
        $id = 0;
        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $input['id']) {
                $id = $key['id'];
                $sql = 'SELECT * FROM banks WHERE id = ' . $key['id'];
                $userById = $this->select($sql);
            }
        }
        $oldTime = $userById[0]['version'] . "chuyen-de-web-1";
        if (md5($oldTime) == $version) {
            $time1 = (int)$oldTime + 1;
            $sql = 'UPDATE banks SET 
            user_id = "' . $input['user_id'] . '", 
            cost = "' . $input['cost'] . '", 
            version = "' . $time1 . '"
            WHERE id = ' . $id;
            $user = $this->update($sql);
            return $user;
        } else {
            return $error;
        }
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertBanks($input)
    {
        $allBanks = $this->getAllBanks($input['user_id']);
        if (empty($allBanks)) {
            $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost` ) VALUES (" .
                "'" . $input['user_id'] . "','" . $input['cost'] . "')";
                $bank = self::$_connection->multi_query($sql);
            // $users = self::$_connection->multi_query($sql);
            return $bank;
        } else {
            $cost = $allBanks[0]['cost'] + $input['cost'];
            $sql = 'UPDATE banks SET 
            cost = "' . $cost . '"
            WHERE id = ' . $allBanks[0]['id'];

            $user = $this->update($sql);
            return $user;
        }
        
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
            $sql = 'SELECT banks.id as bank_id,users.name,users.fullname,users.email,banks.cost,users.type,users.id,banks.user_id,banks.version 
            FROM `banks`,`users` 
            WHERE banks.user_id = users.id';
            $banks = $this->select($sql);
        }
        return $banks;
    }
    function getAllBanks($user_id)
    {
        $sql = 'SELECT * FROM banks Where user_id = ' . $user_id;
        $banks = $this->select($sql);
        return $banks;
    }
}
