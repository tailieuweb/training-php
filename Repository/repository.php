<?php
require_once "./models/UserModel.php";
require_once "./models/BaseModel.php";
require_once "./models/BankModel.php";
class Repository{
    /*
    Tạo mới user đồng thời tặng 500 vào bank
    */ 
    public function createUser($user){
        $baseModel = new BaseModel();
        $bankModel = BankModel::getInstance();
        $userModel = new UserModel();
        
        $user = $userModel->insertUser($user,$bankModel);//tạo mới user
        $id = $baseModel->getID()[0]['id'];//lấy id vừa mới tạo
        $bank = array(
            'user_id' => $id,
            'cost' => 500
        );
        $bankModel->insertBank($bank);//tặng 500 vào user vừa tạo
        return $user;
    }
}