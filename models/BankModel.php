<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    protected static $_instance;

    public function getUserID()
    {
        return $this->user_id;
    }
    public function getCost()
    {
        return $this->cost = 1000;
    }
    public function insertUserDecorator($data, $banks)
    {
        echo "bankModel";
    }

    public function findBankById($id)
    {
        $sql1 = 'SELECT id FROM banks';
        $allUser = $this->select($sql1);
        $user = null;
        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $id && !is_bool($id)) {
                $sql = 'SELECT banks.id as bank_id,users.name,users.email,banks.cost,users.type,users.id,banks.user_id,banks.version 
                FROM `banks`,`users` 
                WHERE banks.user_id = users.id AND banks.id = ' . $key['id'];
                $user = $this->select($sql);
            }
        }
        return $user;
    }
    // Find id banks pass design pattern
    public function findBankByIdVersionTwo($id)
    {
        if (is_string($id) || !is_numeric($id)) {
            return 'Not invalid';
        } else {
            $sql = 'SELECT * FROM banks WHERE id = ' . $id;
            $bank = $this->select($sql);
            return $bank;
        }
    }
    // Find user_id trong table banks
    public function findUserByIdTableBank($user_id)
    {
        if(is_object($user_id)){
            return false;
        }
        elseif(is_array($user_id)){
            return false;
        }
        else{
        $sql = 'SELECT * FROM banks WHERE user_id = ' . $user_id;
        $bank = $this->select($sql);
        return $bank;
        }
    }

    // Get id user new : 
    public function getUserByIdNew()
    {
        $sql = "SELECT MAX(id) as user_id FROM users";
        $user = $this->select($sql);
        return $user;
    }
    // Insers banks khi create user : 
    public function insertUserAndBanks()
    {
        $user = $this->getUserByIdNew();
        $sql = "INSERT INTO `php_web1`.`banks` (`user_id`, `cost` ) VALUES (" .
            "'" . $user[0]['user_id'] . "','" . 500 . "')";
        $bank = $this->insert($sql);
        return $bank;
    }
    public function updateBank2($input)
    {
        $tong = $input['cost'] - 100;

        $user = $this->getUserByIdNew();
        $sql = 'UPDATE banks SET 
            user_id = "' . $user[0]['user_id'] . '", 
            cost = "' . $tong . '", 
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
        $sql1 = 'SELECT id FROM banks';
        $allUser = $this->select($sql1);

        // $_id = $id;
        // $id_start = substr($_id, 3);
        // $id_end = substr($id_start, 0, -3);

        if (is_object($id)) {
            return false;
        }
         else {
            foreach ($allUser as $key) {
                $md5 = md5($key['id'] . "chuyen-de-web-1");
                if ($md5 == $id) {
                    $sql = 'DELETE FROM banks WHERE id = ' . $key['id'];
                    return $this->delete($sql);
                }
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
        $userById = null;

        $_id = $input['id'];
        $id_start = substr($_id, 3);
        $id_end = substr($id_start, 0, -3);

        foreach ($allUser as $key) {
            $a = md5($key['id'] . "chuyen-de-web-1");
            if ($a == $id_end) {
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
            $bank = $this->update($sql);
            return $bank;
        }
    }

    public function insertBanks($input)
    {
        $sql = "INSERT INTO `php_web1`.`banks` (`user_id`, `cost` ) VALUES (" .
            "'" . $input['user_id'] . "','" . $input['cost'] . "')";
        $bank = $this->insert($sql);
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
    function getAll()
    {
        $sql = 'SELECT * FROM banks ';
        $banks = $this->select($sql);
        return $banks;
    }
    function getAllBanks($user_id)
    {
        $sql = 'SELECT * FROM banks Where user_id = ' . $user_id;
        $banks = $this->select($sql);
        return $banks;
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
