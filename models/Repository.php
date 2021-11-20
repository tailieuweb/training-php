<?php
require_once 'models/FactoryPattern.php';
require_once 'models/BaseModel.php';

class Repository extends BaseModel {
    
    public function insertRepository($data)
    {
        //Application pass Factory
        $factory = new FactoryPattern();
        $insertUser = $factory->make('user')->insertUser($data);
        // Check cost rong khong.
        // Neu rong thì them vao khi tao user moi
        
        if(empty($data['cost'])) {
            $user = $factory->make('bank')->insertUserAndBanks($data);
        }
        return $insertUser;
    }
  
      // Just find user , just find bank
      public function findRepository($id)
      {
          //Application pass Factory
          $factory = new FactoryPattern();
          // Find user_id in table banks
          $findUser = $factory->make('user')->findUserByIdNew($id);
  
          if($findUser != null) {
              $factory->make('bank')->findUserByIdTableBank($id);
          }else {
              $findUser = $factory->make('user')->findTwoTable($id);
          }
          return $findUser;
      }
}