<?php
require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    public function insertBank($input)
    {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
            "'" . $input['user_id'] . "', '" . $input['cost'] . "')";

        $user = $this->insert($sql);

        return $user;
    }
    public static function getInstance(){
        if(self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
