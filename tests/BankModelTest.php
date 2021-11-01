<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test updateBank Function in BankModel - 'Lập' do this
     */
    // Test case testUpdateBankOk
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();
        $id = -1;
        $bankModel->deleteBankById($id);
        $bankModel->insertBankWithId($id, 3, 3);
        $bank = $bankModel->getBankById($id);
        $bankVersion = $bank[0]['version'];
        $input = [
            "id" => $id,
            "user_id" => 4,
            "cost" => 4,
            "version" => $bankVersion
        ];
        $bankUpdate = $bankModel->updateBank($input);
        $check = false;
        if (
            $bankUpdate->isSuccess == true &&
            $bankUpdate->data == "Đã update thành công" &&
            $bankUpdate->error == NULL
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case testUpdateBankNg Not good
    public function testUpdateBankNg()
    {
        $bankModel = new BankModel();
        $id = "abc";
        $input = [
            "id" => $id,
            "cost" => 4,
        ];
        $bankUpdate = $bankModel->updateBank($input);
        if (
            $bankUpdate->isSuccess == false &&
            $bankUpdate->data == NULL &&
            $bankUpdate->error == "Không tìm thấy id của bank"
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }

    /**
     * Test insertUserWithIdOk Function in BankModel - 'Lập' do this
     */
    // Test case insertUserWithIdOk 
    public function testInsertBankWithIdOk()
    {
        $bankModel = new BankModel();
        $id = -1;
        $bankModel->deleteBankById($id);
        $bankModel->insertBankWithId($id, 3, 4);
        $bank = $bankModel->getBankById($id);
        $mongDoiCost = '4';
        $this->assertEquals($mongDoiCost, $bank[0]['cost']);
    }
    // Test case insertUserWithIdNg Not good
    public function testInsertBankWithIdStr()
    {
        $bankModel = new BankModel();
        $id = "acb";
        $bankModel->deleteBankById($id);
        $result = $bankModel->insertBankWithId($id, 3, 3);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case insertUserWithIdNull
    public function testInsertBankWithIdNull()
    {
        $bankModel = new BankModel();
        $id = null;
        $bankModel->deleteBankById($id);
        $result = $bankModel->insertBankWithId($id, 3, 3);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertBankWithIdObject
    public function testInsertBankWithIdObject()
    {
        $bankModel = new BankModel();
        $id = new ResultClass();
        $bankModel->deleteBankById($id);
        $result = $bankModel->insertBankWithId($id, 3, 3);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertBankWithIdNg
    public function testInsertBankWithIdNg()
    {
        $bankModel = new BankModel();
        $id = -99999;
        $bankModel->deleteBankById($id);
        $result = $bankModel->insertBankWithId($id, 3, 3);
        $check = false;
        $this->assertEquals($check, $result);
    }

    /**
     * Test getBanks Function in BankModel - 'Hiếu Cao' do this
     */
    // Test case Get All Banks Ok 
    public function testGetAllBanksOk()
    {
        $bankModel = new BankModel();
        $id = -1;

        $bankModel->insertBankWithId($id, 3, 3);
        $users = $bankModel->getBanks();
        $bankModel->deleteBankById($id);

        $check = !empty($users);
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get All Banks Not Good 
    public function testGetAllBanksNg()
    {
        $bankModel = new BankModel();
        $id = -1;

        $bankModel->insertBankWithId($id, 3, 3);
        $users = $bankModel->getBanks();
        $bankModel->deleteBankById($id);

        $check = empty($users);
        $actual = false;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id Ok 
    public function testGetBanksByUserIdOk()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();
        $userId = -1;
        $param = ['user-id' => $userId];

        $userModel->insertUserWithId($userId, 'UserName', 'UserFullName', 'UserEmail@gmail.com', 'admin', '123');
        $bankModel->insertBankWithId(-1, $userId, 123);
        $bankModel->insertBankWithId(-2, $userId, 456);
        $bankModel->insertBankWithId(-3, $userId, 789);
        $usersByUser = $bankModel->getBanks($param);
        $bankModel->deleteBankById(-1);
        $bankModel->deleteBankById(-2);
        $bankModel->deleteBankById(-3);

        $check = is_array($usersByUser);
        if ($check) {
            if (count($usersByUser) >= 3) {
                foreach ($usersByUser as $user) {
                    if ($user['user_id'] !=  $userId) {
                        $check = false;
                        var_dump('Here');
                        break;
                    }
                }
            } else {
                $check = false;
            }
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id String 
    public function testGetBanksByUserIdString()
    {
        $bankModel = new BankModel();
        $param = ['user-id' => 'abc'];

        $usersByUser = $bankModel->getBanks($param);
        $allUser = $bankModel->getBanks();

        $check = true;
        if(count($usersByUser) == count($allUser)){
            for ($i=0; $i < count($usersByUser); $i++) { 
                if($usersByUser[$i] !== $allUser[$i]){
                    $check = false;
                    break;
                }
            }
        }else{
            $check = false;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id Null 
    public function testGetBanksByUserIdNull()
    {
        $bankModel = new BankModel();
        $param = ['user-id' => NULL];

        $usersByUser = $bankModel->getBanks($param);
        $allUser = $bankModel->getBanks();

        $check = true;
        if(count($usersByUser) == count($allUser)){
            for ($i=0; $i < count($usersByUser); $i++) { 
                if($usersByUser[$i] !== $allUser[$i]){
                    $check = false;
                    break;
                }
            }
        }else{
            $check = false;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id Object 
    public function testGetBanksByUserIdObject()
    {
        $bankModel = new BankModel();
        $result = new ResultClass();
        $param = ['user-id' => $result];

        $usersByUser = $bankModel->getBanks($param);
        $allUser = $bankModel->getBanks();

        $check = true;
        if(count($usersByUser) == count($allUser)){
            for ($i=0; $i < count($usersByUser); $i++) { 
                if($usersByUser[$i] !== $allUser[$i]){
                    $check = false;
                    break;
                }
            }
        }else{
            $check = false;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id True 
    public function testGetBanksByUserIdTrue()
    {
        $bankModel = new BankModel();
        $param = ['user-id' => true];

        $usersByUser = $bankModel->getBanks($param);
        $allUser = $bankModel->getBanks();

        $check = true;
        if(count($usersByUser) == count($allUser)){
            for ($i=0; $i < count($usersByUser); $i++) { 
                if($usersByUser[$i] !== $allUser[$i]){
                    $check = false;
                    break;
                }
            }
        }else{
            $check = false;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id False 
    public function testGetBanksByUserIdFalse()
    {
        $bankModel = new BankModel();
        $param = ['user-id' => false];

        $usersByUser = $bankModel->getBanks($param);
        $allUser = $bankModel->getBanks();

        $check = true;
        if(count($usersByUser) == count($allUser)){
            for ($i=0; $i < count($usersByUser); $i++) { 
                if($usersByUser[$i] !== $allUser[$i]){
                    $check = false;
                    break;
                }
            }
        }else{
            $check = false;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
}
