<?php
require_once 'FactoryPattent.php';
require_once 'BaseModel.php';

class Repository extends BaseModel {
    
    public function createAppUser($data)
    {
        //Application pass Factory
        $factory = new FactoryPattent();
        $insertUser = $factory->make('user')->insertUser($data);
        
        if(!empty($data['cost'])) {
            $user = $factory->make('user')->getUserByIdNew();
            //Insert banks
            $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost` ) VALUES (" .
            "'" . $user[0]['user_id'] . "','" . $input['cost'] . "')";

            $insertBank = $this->insert($sql);
            return $insertBank;
        }
        return $insertUser;
    }
    
}