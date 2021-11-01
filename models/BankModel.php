<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    protected static $_instance;

    public function findBankById($id)
    {
        $sql1 = 'SELECT id FROM banks';
        $allUser = $this->select($sql1);
        $user = null;
        foreach ($allUser as $key) {
            $md5 = md5($key['id'] . "chuyen-de-web-1");
            if ($md5 == $id) {
                $sql = 'SELECT banks.id as bank_id,users.name,users.email,banks.cost,users.type,users.id,banks.user_id
                FROM `banks`,`users` 
                WHERE banks.user_id = users.id AND banks.id = ' . $key['id'];
                $user = $this->select($sql);
            }
        }
        return $user;
    }
    // Find id banks pass design pattern
    public function findBankByIdVersionTwo($id) {
        $sql = 'SELECT * FROM banks WHERE id = '.$id;
        $bank = $this->select($sql);

        return $bank;
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


    public function updateBank($input)
    {
        $sql = 'UPDATE banks SET 
            user_id = "' . $input['user_id'] . '", 
            cost = "' . $input['cost'] . '", 
            WHERE id = ' . $input['id'];
        $bank = $this->update($sql);
        return $bank;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    // function getAllBanks($user_id)
    // {
    //     $sql = 'SELECT * FROM banks Where user_id = ' . $user_id;
    //     $banks = $this->select($sql);
    //     return $banks;
    // }
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
            $sql = 'SELECT banks.id as bank_id,users.name,users.email,banks.cost,users.type,users.id,banks.user_id
            FROM `banks`,`users` 
            WHERE banks.user_id = users.id';
            $banks = $this->select($sql);
        }
        return $banks;
    }
    
    public static function getInstance(){
        if(self::$_instance != null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}