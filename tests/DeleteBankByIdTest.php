<?php
require_once 'models/BankModel.php';

use PHPUnit\Framework\TestCase;

class DeleteBankByIdTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testDeleteBankByIdOk() {
        $bankModel = new BankModel();
        $expected = true;
        $bankid = md5(12 . "chuyen-de-web-1");
        $actual = $bankModel->deleteBankById($bankid);
        
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testDeleteBankByIdString() {
        $userModel = new BankModel();
        $expected = false;
        $userid = md5("53" . "chuyen-de-web-1");
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
     /**
     * Test case Not good
     */
    public function  testDeleteBankByIdNg() {
        $userModel = new BankModel();
        $userId = 999;

        $user = $userModel->deleteBankById($userId);

        if(empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case empty
     */
    public function  testDeleteBankByIdEmpty() {
        $userModel = new BankModel();
        $expected = false;
        $userid = md5(999 . "chuyen-de-web-1");
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case object
     */
    public function  testDeleteBankByIdobject() {
        $userModel = new BankModel();
        $expected = false;
        $userid = new stdClass();
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case double
     */
    public function  testDeleteBankByIdDouble() {
        $userModel = new BankModel();
        $expected = false;
        $userid = md5(2.5 . "chuyen-de-web-1");
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case mảng rỗng
     */
    public function  testDeleteBankByIdArrayNull() {
        $userModel = new BankModel();
        $expected = false;
        $userid = [];
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case mảng rỗng
     */
    public function  testDeleteBankByIdNull() {
        $userModel = new BankModel();
        $expected = false;
        $userid = null;
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case số âm
     */
    public function  testDeleteBankByIdNegative() {
        $userModel = new BankModel();
        $expected = false;
        $userid = md5(-5 . "chuyen-de-web-1");
        $user = $userModel->deleteBankById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
}