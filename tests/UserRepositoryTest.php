<?php

use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /**
     * Test testUpdateUserOk Function in Factoryrepository - 'Lập' do this
     */
    /**
     * Test case testUpdateBankOk
     */
    public function testUpdateUserOk()
    {
        $repository = new Repository();
        $id = -1;
        $repository->deleteUserById($id);
        $repository->insertUserWithId($id, "testName1", "testFullName", "testEmail", "testType", "testPassword");
        $user = $repository->findUserById($id);
        $userVersion = $user[0]['version'];
        $input = [
            "id" => $id,
            "name" => "nameUpdate",
            "fullname" => "fullnameUpdate",
            "email" => "emailUpdate",
            "type" => "typeUpdate",
            "password" => "passwordUpdate",
            "version" => $userVersion
        ];
        $userUpdate = $repository->updateUser($input);
        $check = false;
        if (
            $userUpdate->isSuccess == true &&
            $userUpdate->data == "Đã update thành công" &&
            $userUpdate->error == NULL
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }

    // Test case testUpdateUserNg Not good
    public function testUpdateUserNg()
    {
        $repository = new Repository();
        $id = "abc";
        $input = [
            "id" => $id
        ];
        $userUpdate = $repository->updateUser($input);
        if (
            $userUpdate->isSuccess == false &&
            $userUpdate->data == NULL &&
            $userUpdate->error == "Không tìm thấy id của user"
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }

    /**
     * Test insertUserWithId Function in repository - 'Lập' do this
     */
    // Test case insertUserWithIdOk 
    public function testInsertUserWithIdOk()
    {
        $repository = new Repository();
        $id = -1;
        $password = "lap";
        $name = "Lap";
        $repository->deleteUserById($id);
        $repository->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        $result =  $repository->findUserById($id);
        $mongDoiName = 'Lap';
        $this->assertEquals($mongDoiName, $result[0]['name']);
    }
    // Test case insertUserWithIdNg Not good
    public function testInsertUserWithIdNg()
    {
        $repository = new repository();
        $id = -99999;
        $password = "lap";
        $name = "Lap";
        $repository->deleteUserById($id);
        $result =  $repository->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        $check = false;
        $this->assertEquals($check, $result);
    }
    // Test case testInsertUserWithIdStr
    public function testInsertUserWithIdStr()
    {
        $repository = new repository();
        $id = "abc";
        $password = "lap";
        $name = "Lap";
        $repository->deleteUserById($id);
        $result =  $repository->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertUserWithIdNull
    public function testInsertUserWithIdNull()
    {
        $repository = new repository();
        $id = null;
        $password = "lap";
        $name = "Lap";
        $repository->deleteUserById($id);
        $result =  $repository->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertUserWithIdObject
    public function testInsertUserWithIdObject()
    {
        $repository = new repository();
        $id = new ResultClass();
        $password = "lap";
        $name = "Lap";
        $repository->deleteUserById($id);
        $result =  $repository->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test auth Function in repository - 'Lập' do this
     */
    // Test case testUpdateUserNg Not good
    public function testAuthOk()
    {
        $repository = new Repository();
        $id = -1;
        $password = "lap";
        $name = "Lap";
        $repository->deleteUserById($id);
        $repository->insertUserWithId($id, $name, "testFullName", "testEmail", "testType", $password);
        $auth = $repository->auth($name, $password);
        $check = false;
        if (!empty($auth)) {
            if (
                isset($auth[0]['name']) &&
                isset($auth[0]['password'])
            ) {
                if (
                    $auth[0]['name'] == $name &&
                    $auth[0]['password'] == md5($password)
                ) {
                    $check = true;
                }
            }
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case testUpdateUserNg Not good
    public function testAuthNg()
    {
        $repository = new Repository();
        $password = md5("lap1");
        $name = "Lap1";
        $auth = $repository->auth($name, $password);
        $check = false;
        if (!empty($auth)) {
            if (
                isset($auth[0]['name']) &&
                isset($auth[0]['password'])
            ) {
                if (
                    $auth[0]['name'] == $name &&
                    $auth[0]['password'] == md5($password)
                ) {
                    $check = true;
                }
            }
        }
        $actual = false;
        $this->assertEquals($check, $actual);
    }

    /**
     * Test updateBank Function in repository - 'Lập' do this
     */
    // Test case testUpdateBankOk
    public function testUpdateBankOk()
    {
        $repository = new Repository();
        $id = -1;
        $repository->deleteBankById($id);
        $repository->insertBankWithId($id, 3, 3);
        $bank = $repository->getBankById($id);
        $bankVersion = $bank[0]['version'];
        $input = [
            "id" => $id,
            "user_id" => 4,
            "cost" => 4,
            "version" => $bankVersion
        ];
        $bankUpdate = $repository->updateBank($input);
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
        $repository = new Repository();
        $id = "abc";
        $input = [
            "id" => $id,
            "cost" => 4,
        ];
        $bankUpdate = $repository->updateBank($input);
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
     * Test insertUserWithIdOk Function in repository - 'Lập' do this
     */
    // Test case insertUserWithIdOk 
    public function testInsertBankWithIdOk()
    {
        $repository = new Repository();
        $id = -1;
        $repository->deleteBankById($id);
        $repository->insertBankWithId($id, 3, 4);
        $bank = $repository->getBankById($id);
        $mongDoiCost = '4';
        $this->assertEquals($mongDoiCost, $bank[0]['cost']);
    }
    // Test case insertUserWithIdNg Not good
    public function testInsertBankWithIdStr()
    {
        $repository = new Repository();
        $id = "acb";
        $repository->deleteBankById($id);
        $result = $repository->insertBankWithId($id, 3, 3);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case insertUserWithIdNull
    public function testInsertBankWithIdNull()
    {
        $repository = new Repository();
        $id = null;
        $repository->deleteBankById($id);
        $result = $repository->insertBankWithId($id, 3, 3);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertBankWithIdObject
    public function testInsertBankWithIdObject()
    {
        $repository = new Repository();
        $id = new ResultClass();
        $repository->deleteBankById($id);
        $result = $repository->insertBankWithId($id, 3, 3);
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testInsertBankWithIdNg
    public function testInsertBankWithIdNg()
    {
        $repository = new Repository();
        $id = -99999;
        $repository->deleteBankById($id);
        $result = $repository->insertBankWithId($id, 3, 3);
        $check = false;
        $this->assertEquals($check, $result);
    }
<<<<<<< HEAD:tests/FactoryPatternTest.php
    /**
     * Test DeleteUserById Function in Repository - 'Danh' do this
     */
    // Test case testDeleteUserByIdRepository
    public function testDeleteUserByIdRepository()
    {
        $repository = new Repository();
        $id = -1;
        $repository->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $check = $repository->deleteUserById($id);
        $findUser = $repository->findUserById($id);
        if (
            $check == true &&
            count($findUser) == 0
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByIdRepository1 Just Check
    public function testDeleteUserByIdRepository1()
    {
        $repository = new Repository();
        $id = -1;
        $repository->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $check = $repository->deleteUserById($id);
        if (
            $check == true
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test DeleteBankById Function in Repository - 'Danh' do this
     */
    // Test case testDeleteBankByIdRepository
    public function testDeleteBankByIdRepository()
    {
        $repository = new Repository();
        $id = -1;
        $repository->insertBankWithId($id, "Danh", 1000);
        $check = $repository->deleteBankById($id);
        $findUser = $repository->getBankById($id);
        if (
            $check == true && count($findUser)==0
        ){
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankByIdRepository1 Just Check
    public function testDeleteBankByIdRepository1()
    {
        $repository = new Repository();
        $id = -1;
        $repository->insertBankWithId($id, "Danh", 1000);
        $check = $repository->deleteBankById($id);
        if (
            $check == true
        ){
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
=======

    /**
     * Test getBanks Function in Repository - 'Hiếu Cao' do this
     */
    // Test case Get All Banks Ok 
    public function testGetAllBanksOk()
    {
        $repository = new Repository();
        $id = -1;

        $repository->insertBankWithId($id, 3, 3);
        $users = $repository->getBanks();
        $repository->deleteBankById($id);

        $check = !empty($users);
        $actual = true;
        $this->assertEquals($check, $actual);
    }
    // Test case Get All Banks Not Good 
    public function testGetAllBanksNg()
    {
        $repository = new Repository();
        $id = -1;

        $repository->insertBankWithId($id, 3, 3);
        $users = $repository->getBanks();
        $repository->deleteBankById($id);

        $check = empty($users);
        $actual = false;
        $this->assertEquals($check, $actual);
    }
    // Test case Get Banks By User Id Ok 
    public function testGetBanksByUserIdOk()
    {
        $repository = new Repository();
        $userId = -1;
        $param = ['user-id' => $userId];

        $repository->insertUserWithId($userId, 'UserName', 'UserFullName', 'UserEmail@gmail.com', 'admin', '123');
        $repository->insertBankWithId(-1, $userId, 123);
        $repository->insertBankWithId(-2, $userId, 456);
        $repository->insertBankWithId(-3, $userId, 789);
        $usersByUser = $repository->getBanks($param);
        $repository->deleteBankById(-1);
        $repository->deleteBankById(-2);
        $repository->deleteBankById(-3);

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
        $repository = new Repository();
        $param = ['user-id' => 'abc'];

        $usersByUser = $repository->getBanks($param);
        $allUser = $repository->getBanks();

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
        $repository = new Repository();
        $param = ['user-id' => NULL];

        $usersByUser = $repository->getBanks($param);
        $allUser = $repository->getBanks();

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
        $repository = new Repository();
        $result = new ResultClass();
        $param = ['user-id' => $result];

        $usersByUser = $repository->getBanks($param);
        $allUser = $repository->getBanks();

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
        $repository = new Repository();
        $param = ['user-id' => true];

        $usersByUser = $repository->getBanks($param);
        $allUser = $repository->getBanks();

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
        $repository = new Repository();
        $param = ['user-id' => false];

        $usersByUser = $repository->getBanks($param);
        $allUser = $repository->getBanks();

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
>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit:tests/UserRepositoryTest.php
    }
}
