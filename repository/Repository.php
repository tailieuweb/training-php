<?php
require_once 'models/BaseModel.php';
require_once './repository/UserRepository.php';
require_once './repository/BankRepository.php';


class Repository extends BaseModel{
    //khởi tạo 
    use UserRepository;
    use BankRepository;
    /*
    Tạo mới user đồng thời tặng 500 vào bank
    */
    public function createUser($user){
        $sqlUser = $this->insertU($user);
        $this->insert($sqlUser);//tạo mới user
        $id = $this->select( $this->getID())[0]['id'];//lấy id của user vừa tạo
        $sqlAddBank = $this->addBank($id,500);
        $this->insert($sqlAddBank);//tặng 500 vào bank cho user vừa tạo

    }
    /*
    Xóa user và bank
    */
    public function delUser($id){
        $sqlDelUser = $this->del($id);
        $this->delete($sqlDelUser);//xóa user theo id
        $sqlDelBank = $this->delBankById($id);
        $this->delete($sqlDelBank);//xóa bank theo user_id
    }
}