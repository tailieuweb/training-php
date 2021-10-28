<?php
class Repository{
    /*
    Tạo mới user đồng thời tặng 500 vào bank
    */ 
    public function createUser($user){
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $userModel->insertUser($user);
        $id = $userModel->getID()[0]['id'];
        $bank = array(
            'user_id' => $id,
            'cost' => 500
        );
        $bankModel->insertBank($bank);
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