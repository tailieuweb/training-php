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
        $bankAfterUpdate = $bankModel->getBankById($bankId);
        $bankModel->rollBack();
        $this->assertTrue(
            $bankInsert == true &&
                $bankAfterUpdate != false &&
                $bankAfterUpdate['id'] = $bankId &&
                $bankAfterUpdate['user_id'] = $userId &&
                $bankAfterUpdate['cost'] = $bankCost
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
        $this->assertTrue($bankInsert == false);
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
        $bankAfterUpdate = $bankModel->getBankById($bankId);
        $bankModel->rollBack();
        $this->assertTrue(
            $bankInsert == true &&
                $bankAfterUpdate != false &&
                $bankAfterUpdate['id'] = $bankId &&
                $bankAfterUpdate['user_id'] = $userId &&
                $bankAfterUpdate['cost'] = $bankCost
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
}
