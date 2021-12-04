<?php

use PHPUnit\Framework\TestCase;

class TranVanLap_BankModelTest extends TestCase
{
    /**
     * Test insertBankWithId function, 'Lập' do this 
     * */
    // Test case insertBankWithId Ok
    public function testInsertBankWithIdOk()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $userModel->insertUserWithId($userId, 'Trần Văn Lập', 'userFullName', 'testEmail@gmail.com', 'admin', 'tranvanlap123');
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankAfterInsert = $bankModel->getBankById($bankId);
        $bankModel->rollBack();
        $this->assertTrue(
            $bankInsert == true &&
                $bankAfterInsert != false &&
                $bankAfterInsert['id'] = $bankId &&
                $bankAfterInsert['user_id'] = $userId &&
                $bankAfterInsert['cost'] = $bankCost
        );
    }
    // Test case insertBankWithId With Bank id is Float 
    public function testInsertBankWithIdWithBankIdFloat()
    {
        $bankModel = new BankModel();
        $bankId = 2.23;
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is String 
    public function testInsertBankWithIdWithBankIdString()
    {
        $bankModel = new BankModel();
        $bankId = 'This is String';
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is Null,  
    public function testInsertBankWithIdWithBankIdNull()
    {
        $bankModel = new BankModel();
        $bankId = null;
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is Object  
    public function testInsertBankWithIdWithBankIdObject()
    {
        $bankModel = new BankModel();
        $bankId = new ResultClass();
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is True  
    public function testInsertBankWithIdWithBankIdTrue()
    {
        $bankModel = new BankModel();
        $bankId = true;
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is false  
    public function testInsertBankWithIdWithBankIdFalse()
    {
        $bankModel = new BankModel();
        $bankId = false;
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is empty array  
    public function testInsertBankWithIdWithBankIdEmptyArray()
    {
        $bankModel = new BankModel();
        $bankId = [];
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With Bank id is array  
    public function testInsertBankWithIdWithBankIdArray()
    {
        $bankModel = new BankModel();
        $bankId = [1, 2, 3];
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is not Exist  
    public function testInsertBankWithIdWithUserIdNotExist()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == true);
    }
    // Test case insertBankWithId With User id is float  
    public function testInsertBankWithIdWithUserIdFloat()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = 1.23;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is String  
    public function testInsertBankWithIdWithUserIdString()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = 'This is string';
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is Null  
    public function testInsertBankWithIdWithUserIdNull()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = null;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is Object  
    public function testInsertBankWithIdWithUserIdObject()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = new ResultClass();
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is true  
    public function testInsertBankWithIdWithUserIdTrue()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = true;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is false  
    public function testInsertBankWithIdWithUserIdFalse()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = false;
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is empty array
    public function testInsertBankWithIdWithUserIdEmptyArray()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = [];
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With User id is array
    public function testInsertBankWithIdWithUserIdArray()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = [1, 2, 3];
        $bankCost = 123;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost Float
    public function testInsertBankWithIdWithCostFloat()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = 1.23;
        $bankModel->startTransaction();
        $userModel->insertUserWithId($userId, 'Trần Văn Lập', 'userFullName', 'testEmail@gmail.com', 'admin', 'tranvanlap123');
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankAfterInsert = $bankModel->getBankById($bankId);
        $bankModel->rollBack();
        $this->assertTrue(
            $bankInsert == true &&
                $bankAfterInsert != false &&
                $bankAfterInsert['id'] = $bankId &&
                $bankAfterInsert['user_id'] = $userId &&
                $bankAfterInsert['cost'] = $bankCost
        );
    }
    // Test case insertBankWithId With cost String
    public function testInsertBankWithIdWithCostString()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = 'This is String';
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost null
    public function testInsertBankWithIdWithCostNull()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = NULL;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost Object
    public function testInsertBankWithIdWithCostObject()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = new ResultClass();
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost true
    public function testInsertBankWithIdWithCostTrue()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = true;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost false
    public function testInsertBankWithIdWithCostFalse()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = false;
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost is empty array
    public function testInsertBankWithIdWithCostEmptyArray()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = [];
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }
    // Test case insertBankWithId With cost is array
    public function testInsertBankWithIdWithCostArray()
    {
        $bankModel = new BankModel();
        $bankId = -1;
        $userId = -1;
        $bankCost = [1, 2, 3];
        $bankModel->startTransaction();
        $bankInsert = $bankModel->insertBankWithId($bankId, $userId, $bankCost);
        $bankModel->rollBack();
        $this->assertTrue($bankInsert == false);
    }

    /**
     * Test updateBank function, 'Lập' do this 
     * */
    // Test case updateBank Ok
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankApterUpdate = $bankModel->getBankByUserId($userId);
        $bankModel->rollBack();
        $this->assertTrue(
            $bankUpdate == true &&
                $bankApterUpdate != false &&
                $bankApterUpdate['user_id'] == $userId &&
                $bankApterUpdate['cost'] == $newCost
        );
    }
    // Test case updateBank with User id not exist
    public function testUpdateBankWithUserIdNotExist()
    {
        $bankModel = new BankModel();
        $userId = -1;
        $newCost = 8888;
        $bankModel->startTransaction();
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is float
    public function testUpdateBankWithUserIdFloat()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = 1.23;
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is string
    public function testUpdateBankWithUserIdString()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = 'This is string';
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is Null
    public function testUpdateBankWithUserIdNull()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = null;
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is Object
    public function testUpdateBankWithUserIdObject()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = new ResultClass();
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is True
    public function testUpdateBankWithUserIdTrue()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = true;
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is False
    public function testUpdateBankWithUserIdFalse()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = false;
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is empty array
    public function testUpdateBankWithUserIdEmptyArray()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = [];
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with User Id is array
    public function testUpdateBankWithUserIdArray()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = [1, 2, 3];
        $newCost = 8888;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is negative number
    public function testUpdateBankWithCostNegativeNumber()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = -100;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == true);
    }
    // Test case updateBank with cost is float number
    public function testUpdateBankWithCostFloat()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = 1.23;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankApterUpdate = $bankModel->getBankByUserId($userId);
        $bankModel->rollBack();
        $this->assertTrue(
            $bankUpdate == true &&
                $bankApterUpdate != false &&
                $bankApterUpdate['user_id'] == $userId &&
                $bankApterUpdate['cost'] == $newCost
        );
    }
    // Test case updateBank with cost is string
    public function testUpdateBankWithCostString()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = 'This is String';
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is null
    public function testUpdateBankWithCostNull()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = null;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is object
    public function testUpdateBankWithCostObject()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = new ResultClass();
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is true
    public function testUpdateBankWithCostTrue()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = true;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is false
    public function testUpdateBankWithCostFalse()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = false;
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is empty array
    public function testUpdateBankWithCostEmptyArray()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = [];
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }
    // Test case updateBank with cost is array
    public function testUpdateBankWithCostArray()
    {
        $bankModel = new BankModel();
        $userRepository = new UserRepository();
        $userId = -1;
        $newCost = [1, 2, 3];
        $userInsertInput = [
            'id' => $userId,
            'name' => 'tranvanlap',
            'fullname' => 'Trần Văn Lập',
            'email' => 'tranvanlap_testEmail@gmail.com',
            'type' => 'admin',
            'password' => 'tranvanlap'
        ];
        $bankModel->startTransaction();
        $userRepository->insertUserWithId($userInsertInput);
        $bankUpdate = $bankModel->updateBank($userId, $newCost);
        $bankModel->rollBack();
        $this->assertTrue($bankUpdate == false);
    }

    /**
     * Test getInstance function, 'Lập' do this 
     * */
    // Test case getInstance Ok
    public function testGetInstanceOk()
    {
        $bankModelSingleton = BankModel::getInstance();
        $bankModel = new BankModel();
        $this->assertEquals($bankModelSingleton, $bankModel);
    }
    // Test case getInstance with multi class
    public function testGetInstanceWithMultiClass()
    {
        $bankModelSingleton1 = BankModel::getInstance();
        $bankModelSingleton2 = BankModel::getInstance();
        $bankModel = new BankModel();
        $this->assertTrue(
            $bankModelSingleton1 == $bankModel &&
                $bankModelSingleton1 == $bankModelSingleton2 &&
                $bankModelSingleton2 == $bankModel
        );
    }
}
