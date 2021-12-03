<?php
use PHPUnit\Framework\TestCase;

class CaoTrungHieu_BankModelTest extends TestCase
{
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
}
