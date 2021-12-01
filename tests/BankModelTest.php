<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test DeleteBankById Function in BankModel - 'Danh' do this
     */
    // Test case testDeleteBankById
    public function testDeleteBankByIdOK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $id = -1;
        $bankModel->insertBank($id, '12345');
        $check = $bankModel->deleteBankByUserId($id);
        $findUser = $bankModel->getBankByUserId($id);
        $bankModel->rollBack();
        if (
            $check == true &&
            ($findUser) == false
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
       // $bankModel->deleteBankByUserId($id);
    }
    // Test case testDeleteBankByIdString
    public function testDeleteBankByIdString()
    {
        $bankModel = new BankModel();
        $id = "a";
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankNotId
    public function testDeleteBankNotId()
    {
        $bankModel = new BankModel();
        $id = "";
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankBool
    public function testDeleteBankBool()
    {
        $bankModel = new BankModel();
        $id = true;
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankObject
    public function testDeleteBankObject()
    {
        $bankModel = new BankModel();
        $id = new UserModel;
        $check = $bankModel->deleteBankByUserId($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteBankExpectedandActual
    public function testDeleteBankExpectedandActual()
    {
        $bankModel = new BankModel();
        $id = -1;
        $expected = $bankModel->deleteBankByUserId($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test getBankByUserId Function in BankModel - 'Danh' do this
     */
    // Test case testDeleteBankById
    public function testGetBankByUserIdOk()
    {
        $bankModel = new BankModel();
        $userModel = new UserModel();
        $bankModel->startTransaction();
        $userId = -1;
        $userModel->insertUserWithId($userId, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $bankModel->insertBank($userId, '12345');
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank != false &&
            $getBank['user_id'] == $userId &&
            $getBank['cost'] == '12345';
             $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetBankByUserIdUserIdFloat
    public function testGetBankByUserIdUserIdFloat()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $userId = -1.4;
        $getBank = $bankModel->getBankByUserId($userId);
        $check = $getBank == false;
        $bankModel->rollBack();
        if ($check === true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     // Test case testGetBankByUserIdUserIdSpecial
     public function testGetBankByUserIdUserIdSpecial()
     {
         $bankModel = new BankModel();
         $bankModel->startTransaction();
         $userId = '#$#@#';
         $getBank = $bankModel->getBankByUserId($userId);
         $check = $getBank == false;
         $bankModel->rollBack();
         if ($check === true) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
     // Test case testGetBankByUserIdUserIdString
     public function testGetBankByUserIdUserIdString()
     {
         $bankModel = new BankModel();
         $bankModel->startTransaction();
         $userId = 'Danh';
         $getBank = $bankModel->getBankByUserId($userId);
         $check = $getBank == false;
         $bankModel->rollBack();
         if ($check === true) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
      // Test case testGetBankByUserIdUserIdObject
      public function testGetBankByUserIdUserIdObject()
      {
          $bankModel = new BankModel();
          $bankModel->startTransaction();
          $userId = new UserRepository;
          $getBank = $bankModel->getBankByUserId($userId);
          $check = $getBank == false;
          $bankModel->rollBack();
          if ($check === true) {
              $this->assertTrue(true);
          } else {
              $this->assertTrue(false);
          }
      }
       // Test case testGetBankByUserIdUserIdNull
       public function testGetBankByUserIdUserIdNull()
       {
           $bankModel = new BankModel();
           $bankModel->startTransaction();
           $userId = null;
           $getBank = $bankModel->getBankByUserId($userId);
           $check = $getBank == false;
           $bankModel->rollBack();
           if ($check === true) {
               $this->assertTrue(true);
           } else {
               $this->assertTrue(false);
           }
       }

     /**
     * Test getBanks function, 'Hiếu Cao' do this
     * */
    // Test case Get Banks Pass
    public function testGetBanksPass()
    {
        $bankModel = new BankModel();
        $bankId = $userId = -1;
        $cost = 100;

        $bankModel->insertBankWithId($bankId, $userId, $cost);
        $listBank = $bankModel->getBanks();

        $expected = true;
        $actual = is_array($listBank) && count($listBank) > 0;
        // Delete new Bank After test
        $bankModel->deleteBankByUserId($userId);

        $this->assertEquals($expected, $actual);
    }
    // Test case Get Banks Fail
    public function testGetBanksFail()
    {
        $bankModel = new BankModel();
        $bankId = $userId = -1;
        $cost = 100;

        $bankModel->insertBankWithId($bankId, $userId, $cost);
        $listBank = $bankModel->getBanks();

        $actual = !is_array($listBank) || !count($listBank) > 0 ? false : true;
        // Delete new Bank After test
        $bankModel->deleteBankByUserId($userId);

        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test get bank by id
     * */
    // Test get bank by id ok
    public function testBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = -1;

        $bankModel->startTransaction();

        $bankModel->insertBankWithId($bankId, -1, 123);

        $findBank = $bankModel->getBankById($bankId);
        $actual = $findBank != false &&
            $findBank["id"] == $bankId &&
            $findBank["cost"] == 123 &&
            $findBank["user_id"] == -1;

        $bankModel->rollBack();
        $this->assertTrue($actual ? true : false);
    }
    // Test get bank by id float
    public function testBankByIdFloat()
    {
        $bankModel = new BankModel();
        $bankId = 1.23;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id String
    public function testBankByIdString()
    {
        $bankModel = new BankModel();
        $bankId = "abc";

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Null
    public function testBankByIdNull()
    {
        $bankModel = new BankModel();
        $bankId = null;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Object
    public function testBankByIdObject()
    {
        $bankModel = new BankModel();
        $bankId = new BankModel();

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Bool true
    public function testBankByIdBoolTrue()
    {
        $bankModel = new BankModel();
        $bankId = true;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
    // Test get bank by id Bool false
    public function testBankByIdBoolFalse()
    {
        $bankModel = new BankModel();
        $bankId = false;

        $bankModel->startTransaction();

        $findBank = $bankModel->getBankById($bankId);

        $bankModel->rollBack();
        $this->assertTrue($findBank ? false : true);
    }
     // Test get bank by id Array
     public function testBankByIdArray()
     {
         $bankModel = new BankModel();
         $bankId = [1,2,3];
 
         $bankModel->startTransaction();
 
         $findBank = $bankModel->getBankById($bankId);
 
         $bankModel->rollBack();
         $this->assertTrue($findBank ? false : true);
     }
}
