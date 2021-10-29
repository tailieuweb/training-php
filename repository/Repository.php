<?php
class Repository{
    /*
    Tạo mới user đồng thời tặng 500 vào bank
    */ 
    public function createUser($user){
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $userModel->insertUser($user);//tạo mới user
        $id = $userModel->getID()[0]['id'];//lấy id vừa mới tạo
        $bank = array(
            'user_id' => $id,
            'cost' => 500
        );
        $bankModel->insertBank($bank);//tặng 500 vào user vừa tạo
    }
    /*
        Xóa user và bank tương ứng
    */ 
    public function deleteUser($id){
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $userModel->deleteUserById($id);
        $bankModel->deleteBankByUserId($id);
    }
}