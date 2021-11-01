<?php
require_once 'models/FactoryPattent.php';
require_once 'models/BaseModel.php';

class Repository extends BaseModel {
    
    public function createAppUser($data)
    {
        //Application pass Factory
        $factory = new FactoryPattent();
        $insertUser = $factory->make('user')->insertUser($data);
        // Check cost rong khong.
        // Neu rong thì them vao khi tao user moi
        if(empty($data['cost'])) {
            $user = $factory->make('user')->insertUserAndBanks();
        }
        return $insertUser;
    }
    
}