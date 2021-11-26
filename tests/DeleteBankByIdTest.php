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
        $bankid = md5(3 . "chuyen-de-web-1");
        $bankModel->starTransaction();
        $actual = $bankModel->deleteBankById($bankid);
        $bankModel->rollback();
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testDeleteBankByIdString() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = md5("56" . "chuyen-de-web-1");
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
     /**
     * Test case Not good
     */
    public function  testDeleteBankByIdNg() {
        $bankModel = new BankModel();
        $userId = 999;
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userId);
        $bankModel->rollback();
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
        $bankModel = new BankModel();
        $expected = false;
        $userid = md5(999 . "chuyen-de-web-1");
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case object
     */
    public function  testDeleteBankByIdobject() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = new stdClass();
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case double
     */
    public function  testDeleteBankByIdDouble() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = md5(2.5 . "chuyen-de-web-1");
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case mảng rỗng
     */
    public function  testDeleteBankByIdArrayNull() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = [];
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case mảng rỗng
     */
    public function  testDeleteBankByIdNull() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = null;
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case số âm
     */
    public function  testDeleteBankByIdNegative() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = md5(-5 . "chuyen-de-web-1");
        $bankModel->starTransaction();
        $user = $bankModel->deleteBankById($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
}