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
        $userid = md5(21 . "chuyen-de-web-1");
        $actual = $userModel->deleteUserById($userid);
        
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testDeleteUserByIdString() {
        $userModel = new UserModel();
        $expected = false;
        $userid = md5("53" . "chuyen-de-web-1");
        $user = $userModel->deleteUserById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
     /**
     * Test case Not good
     */
    public function  testDeleteUserByIdNg() {
        $userModel = new UserModel();
        $userId = 999;

        $user = $userModel->deleteUserById($userId);

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
        $user = $userModel->deleteUserById($userid);
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
        $user = $userModel->deleteUserById($userid);
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
        $user = $userModel->deleteUserById($userid);
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
        $user = $userModel->deleteUserById($userid);
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
        $user = $userModel->deleteUserById($userid);
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
        $user = $userModel->deleteUserById($userid);
        $actual = $user;
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
       
    }
}