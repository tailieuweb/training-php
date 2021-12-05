<?php

require_once 'BaseModel.php';
$ds       = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__).$ds.'..').$ds;
require_once("{$base_dir}models{$ds}IBank.php");
class BankModel extends BaseModel implements IBank
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
            // $banks = self::$_connection->multi_query($sql);
            $banks = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM bank';
            $banks = $this->select($sql);
        }

        return $banks;
    }

    public function insertUser_bank($input) {
        var_dump($input);
        $sql = "INSERT INTO `bank` (`name`, `fullname`, `sdt`, `email`, `stk`) VALUES (" .
            "'" . $input['name'] . "', '".$input['fullname']."','".$input['sdt']."', '".$input['email']."','".$input['stk']."')";

        $user = $this->insert_bank($sql);
        return $user;
    }
    protected function insert_bank($sql) {
        $result = $this->query($sql);
        return $result;
    }

    public function updateUser_bank($input) {
        $sql = 'UPDATE bank SET 
                 name = "' . $input['name'] .'", 
                 fullname = "'. $input['fullname'].'",
                 email = "' . $input['email'] .'", 
                 sdt = "' . $input['sdt'] .'", 
                 stk="'. $input['stk'].'"
                WHERE id = ' . $input['id'];
        $user = $this->update($sql);

        return $user;
    }
    //cost
    public function cost(){
        return $this->getBanks(null);
    }


}