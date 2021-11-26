<?php
require_once 'models/BankModel.php';

use PHPUnit\Framework\TestCase;

class FindUserByIdTableBankTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testFindUserByIdTableBankOk() {
        $bankModel = new BankModel();
        $expected = 56;
        $bankid = 56;
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($bankid);
        $bankModel->rollback();
        $actual = $user[0]['user_id'];
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testFindUserByIdTableBankString() {
        $bankModel = new BankModel();
        $expected = [];
        $userid = "abc";
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        // $actual = $user['user_id'];
        // var_dump($user);die();
        $this->assertEquals($expected, $user);
       
    }
     /**
     * Test case Not good
     */
    public function  testFindUserByIdTableBankNg() {
        $bankModel = new BankModel();
        $userId = 999;
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userId);
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
    public function  testFindUserByIdTableBankEmpty() {
        $bankModel = new BankModel();
        $expected = [];
        $userid = 999;
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case object
     */
    public function  testFindUserByIdTableBankobject() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = new stdClass();
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case double
     */
    public function  testFindUserByIdTableBankDouble() {
        $bankModel = new BankModel();
        $expected = [];
        $userid = 2.5;
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case mảng rỗng
     */
    public function  testFindUserByIdTableBankArrayNull() {
        $bankModel = new BankModel();
        $expected = false;
        $userid = [];
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case mảng rỗng
     */
    public function  testFindUserByIdTableBankNull() {
        $bankModel = new BankModel();
        $expected = [];
        $userid = null;
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case số âm
     */
    public function  testFindUserByIdTableBankNegative() {
        $bankModel = new BankModel();
        $expected = [];
        $userid = -5;
        $bankModel->starTransaction();
        $user = $bankModel->findUserByIdTableBank($userid);
        $bankModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
}