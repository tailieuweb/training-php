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
        if (empty($result)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test DeleteBankById Function in BankModel - 'Danh' do this
     */
    // Test case testDeleteBankById
    public function testDeleteBankById()
    {
        $bankModel = new BankModel();
        $id = -1;
        $bankModel->insertBankWithId($id, "Danh", 1000);
        $check = $bankModel->deleteBankById($id);
        $findUser = $bankModel->getBankById($id);
        if (
            $check == true && count($findUser)==0
        ){
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
