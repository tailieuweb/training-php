<?php
use PHPUnit\Framework\TestCase;
class updateUserIdBankModelTest extends TestCase{

    /**
     * Test case Ok
     */
    public function testUpdateUserIdBankOk()
    {
        $bankModel = new BankModel();
        $bank = array(
            'id' => 53,
            'user_id' => 17,
            'cost' => 5555
        );
        $expected = true;
        $actual = $bankModel->updateUser_id($bank);
        $this->assertEquals($actual, $expected);
    }
    /**
     * Test Ng
     */
    public function testUpdateUserIdBankNg()
    {
        $bankModel = new BankModel();
        $bank = array(
            'id' => 53,
            'user_id' => 'dfgdf',
            'cost' => 'qwert'
        );
        $bankModel->updateUser_id($bank);
        if (is_numeric($bank['user_id']) == true && is_numeric($bank['cost']) == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test null
     */
    public function testUpdateUserIdBankNull()
    {
        $bankModel = new BankModel();
        $bank = array(
            'id' => 53,
            'user_id' => NULL,
            'cost' => NULL
        );
        $expected = false;
        $actual = $bankModel->updateUser_id($bank);
        $this->assertEquals($expected, $actual);
        if (!empty($bank['user_id']) && !empty($bank['cost'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test double
     */
    public function testUpdateUserIdBankDouble()
    {
        $bankModel = new BankModel();
        $bank = array(
            'id' => 53,
            'user_id' => 5.5,
            'cost' => '5555'
        );
        $bankModel->updateUser_id($bank);
        if (is_double($bank['user_id']) || is_double($bank['cost'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test Ob
     */
    public function testUpdateUserIdBankOb()
    {
        $bankModel = new BankModel();
        $obj = (object)'53';
        $bank = array(
            'id' => 53,
            'user_id' => $obj,
            'cost' => '5555'
        );

        if (is_object($bank['user_id']) || is_object($bank['cost'])) {
            $bank['user_id'] = null;
            $bankModel->updateUser_id($bank);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test bool
     */
    public function testUpdateUserIdBankBoolean()
    {
        $bankModel = new BankModel();
        $bank = array(
            'id' => 53,
            'user_id' => true,
            'cost' => '5555'
        );
        $bankModel->updateUser_id($bank);
        if (is_bool($bank['user_id']) || is_bool($bank['cost'])) {

            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

}