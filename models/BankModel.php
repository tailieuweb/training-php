<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        $sql = 'UPDATE banks SET 
               user_id = "'.$input['user_id'].'",
                cost = "'.$input['cost'].'"
                WHERE id = ' . $input['id'];
        //var_dump($sql); die();
        $bank = $this->update($sql);
        return $bank;
    }
        
        
    

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
        "'" . $input['user_id'] . "', '"
        . $input['cost']. "')";
        $bank = $this->insert($sql);
      
        return $bank;
                
    }
}