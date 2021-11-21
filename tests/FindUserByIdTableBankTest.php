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
        $expected = 43;
        $bankid = 43;
        $user = $bankModel->findUserByIdTableBank($bankid);
        $actual = $user[0]['user_id'];
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testFindUserByIdTableBankString() {
        $userModel = new BankModel();
        $expected = [];
        $userid = "abc";
        $user = $userModel->findUserByIdTableBank($userid);
        // $actual = $user['user_id'];
        // var_dump($user);die();
        $this->assertEquals($expected, $user);
       
    }
     /**
     * Test case Not good
     */
    public function  testFindUserByIdTableBankNg() {
        $userModel = new BankModel();
        $userId = 999;

        $user = $userModel->findUserByIdTableBank($userId);

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
        $userModel = new BankModel();
        $expected = [];
        $userid = 999;
        $user = $userModel->findUserByIdTableBank($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case object
     */
    public function  testFindUserByIdTableBankobject() {
        $userModel = new BankModel();
        $expected = false;
        $userid = new stdClass();
        $user = $userModel->findUserByIdTableBank($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case double
     */
    public function  testFindUserByIdTableBankDouble() {
        $userModel = new BankModel();
        $expected = [];
        $userid = 2.5;
        $user = $userModel->findUserByIdTableBank($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case mảng rỗng
     */
    public function  testFindUserByIdTableBankArrayNull() {
        $userModel = new BankModel();
        $expected = false;
        $userid = [];
        $user = $userModel->findUserByIdTableBank($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case mảng rỗng
     */
    public function  testFindUserByIdTableBankNull() {
        $userModel = new BankModel();
        $expected = [];
        $userid = null;
        $user = $userModel->findUserByIdTableBank($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case số âm
     */
    public function  testFindUserByIdTableBankNegative() {
        $userModel = new BankModel();
        $expected = [];
        $userid = -5;
        $user = $userModel->findUserByIdTableBank($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
}