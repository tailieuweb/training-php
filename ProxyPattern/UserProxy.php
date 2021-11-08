<?php
require_once 'models/UserModel.php';
require_once 'models/BankModel.php';

class UserProxy implements User{
    private $realUser; 
	
    public function UserProxy(){
        $this->realUser = new RealUser();
    }
     function insertUserandBank($input){
        if($this->realUser == null)
        {
            $userModel = new UserModel();
            $bankModel = new BankModel();
            $id = $userModel->getUserId();

            $info = array(
                'user_id' => $id + 1,
                'cost' => $input['cost']
            );
    
            $userModel->insertUser($input);
            $bankModel->insertBank($info);
        }
    }
    
   function updateUserandBank($input){
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $info = array(
            'user_id' => $input['user_id'],
            'cost' => $input['cost']
        );

        $userModel->updateUser($input);
        $bankModel->updateBank($info);
   }

   
   function deleteUserandBank($id){
    $userModel = new UserModel();
    $bankModel = new BankModel();

    $userModel->deleteUserById($id);
    $bankModel->deleteBankById($id);
   }

}