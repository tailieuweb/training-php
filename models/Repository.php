<?php
require_once 'BaseModel.php';
class Repository extends BaseModel{

    /**
     * Create function insert full information of user
     * @param $sql
     */
    public function createFullUser($input) {
        $sql = "INSERT INTO `users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '".$input['fullname']."', '".$input['email']."', '".$input['type']."', '".$input['password']."')";


        $user = $this->insert($sql);
        
        if(!empty($input['cost'])){
            //Get id of user
            $sqlID = "SELECT `id` FROM `users` ORDER BY `id` DESC LIMIT 1;";
            $getID = $this->select($sqlID);
            //Insert for table bank
            $sqlBank = "INSERT INTO `banks` (`user_id`,`cost`) VALUES (" .
            "'" . $getID[0]['id'] . "', '".$input['cost']."')";

            $banks = $this->insert($sqlBank);

            return $banks;
        }
        return $user;
    }

}