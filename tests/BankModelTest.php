<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /**
     * Test case testUpdateBankOk
     */
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

    /**
     * Test case testUpdateBankNg Not good
     */
    public function testUpdateBankNg()
    {
        $bankModel = new BankModel();
        $id = "abc";
        $input = [
            "id" => $id,
            "cost" => 4,
        ];
        $bankUpdate = $bankModel->updateBank($input);
        var_dump($bankUpdate);
        // die();
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
     * Test case insertUserWithIdOk 
     */
    public function testInsertBankWithIdOk()
    {
        $bankModel = new BankModel();
        $id = -1;
        $bankModel->deleteBankById($id);
        $result = $bankModel->insertBankWithId($id, 3, 3);
        $actual = true;
        $this->assertEquals($result, $actual);
    }

    /**
     * Test case insertUserWithIdNg Not good
     */
    public function testInsertBankWithIdNg()
    {
        $bankModel = new BankModel();
        $id = "acb";
        $bankModel->deleteBankById($id);
        $result = $bankModel->insertBankWithId($id, 3, 3);
        $actual = false;
        $this->assertEquals($result, $actual);
    }
}
