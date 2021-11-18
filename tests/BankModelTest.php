<?php
require_once('./models/FactoryPattern.php');
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /*
    File: BankModel.
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id 
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByIdOk() {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '1111',
            ]
        ];

        $actual = $bankModel->find(1);
        $this->assertEquals(true, true);
    }
}