<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Ok
     */
    public function testInsertBankOk()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => 0,
            "cost" => "0",
            "ver" => "",
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
}
   