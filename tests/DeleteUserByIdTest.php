<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class DeleteUserByIdTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testDeleteUserByIdOk() {
        $userModel = new UserModel();
        $expected = true;
        $userid = md5(51 . "chuyen-de-web-1");
        $userModel->starTransaction();
        $actual = $userModel->deleteUserById($userid);
        $userModel->rollback();
        // var_dump($userid);die();
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testDeleteUserByIdString() {
        $userModel = new UserModel();
        $expected = false;
        $userid = md5("aaaa" . "chuyen-de-web-1");
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($userid);die();
        $this->assertEquals($expected, $actual);
       
    }
     /**
     * Test case Not good
     */
    public function  testDeleteUserByIdNg() {
        $userModel = new UserModel();
        $userId = 999;
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userId);
        $userModel->rollback();
        if(empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case empty
     */
    public function  testDeleteUserByIdEmpty() {
        $userModel = new UserModel();
        $expected = false;
        $userid = md5(999 . "chuyen-de-web-1");
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case object
     */
    public function  testDeleteUserByIdobject() {
        $userModel = new UserModel();
        $expected = false;
        $userid = new stdClass();
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case double
     */
    public function  testDeleteUserByIdDouble() {
        $userModel = new UserModel();
        $expected = false;
        $userid = md5(2.5 . "chuyen-de-web-1");
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case mảng rỗng
     */
    public function  testDeleteUserByIdArrayNull() {
        $userModel = new UserModel();
        $expected = false;
        $userid = [];
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
    /**
     * Test case mảng rỗng
     */
    public function  testDeleteUserByIdNull() {
        $userModel = new UserModel();
        $expected = false;
        $userid = null;
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }

    /**
     * Test case số âm
     */
    public function  testDeleteUserByIdNegative() {
        $userModel = new UserModel();
        $expected = false;
        $userid = md5(-5 . "chuyen-de-web-1");
        $userModel->starTransaction();
        $user = $userModel->deleteUserById($userid);
        $userModel->rollback();
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
}