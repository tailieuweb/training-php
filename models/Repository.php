<?php
require_once 'models/FactoryPattent.php';
require_once 'models/BaseModel.php';

class Repository extends BaseModel {
    
    public function insertRepository($data)
    {
        //Application pass Factory
        $factory = new FactoryPattent();
        $insertUser = $factory->make('user')->insertUser($data);
        // Check cost rong khong.
        // Neu rong thì them vao khi tao user moi
        if(empty($data['cost'])) {
            $user = $factory->make('bank')->insertUserAndBanks();
        }
        return $insertUser;
    }
    // Just update user , just update bank
    public function updateRepositoty($data)
    {
        //Application pass Factory
        $factory = new FactoryPattent();
        $upUser = $factory->make('user')->updateUser($data);

        // Check cost rong khong.
        // Neu rong thì chỉ thay doi username bên bank và giu nguyen cost = 500
        if(empty($data['cost'])) {
            $user = $factory->make('bank')->updateBank($data);
        }
        return $upUser;
    }
    // Just find user , just find bank
    public function findRepository($id)
    {
        //Application pass Factory
        $factory = new FactoryPattent();
        // Find user_id in table banks
        $findUser = $factory->make('user')->findUserById($id);

        if($findUser != null) {
            $findBank = $factory->make('bank')->findUserByIdTableBank($id);
        }else {
            $findUser = $factory->make('user')->findTwoTable($id);
        }
        return $findUser;
    }
}