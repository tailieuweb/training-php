<?php
require_once "./models/UserModel.php";
require_once "./models/BankModel.php";
class Repository{
    /*
    Tạo mới user đồng thời tặng 500 vào bank
    */ 
    public function createUser($user){
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $user = $userModel->insertUser($user);//tạo mới user
        $id = $userModel->getID()[0]['id'];//lấy id vừa mới tạo
        $bank = array(
            'user_id' => $id,
            'cost' => 500
        );
        $bankModel->insertBank($bank);//tặng 500 vào user vừa tạo
        return $user;
    }
}