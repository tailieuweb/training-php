<?php
use PHPUnit\Framework\TestCase;
class DeleteUserByIdTest extends TestCase{

    /**
     * Test case Okie
     */
    public function testDeleteUserByIdOk() {
        $userModel = new UserModel();
        $expected = true;
        $userid = 11;
        $actual = $userModel->deleteUserById($userid);
        $this->assertEquals($expected, $actual);
    }

   
    /**
     * Test case Not good
     */
    //chuỗi
    public function  testDeleteUserByIdString() {
        $userModel = new UserModel();
        $expected = false;
        $userid = "1s1";
        $user = $userModel->deleteUserById($userid);
        $actual = $user;
        $this->assertEquals($expected, $actual);
       
    }
    //k có
    public function  testDeleteUserByIdNg() {
        $userModel = new UserModel();
        $userId = 9999;

        $user = $userModel->deleteUserById($userId);

        if(empty($user)) {
            $this->assertFalse(true);
        } else {
            $this->assertFalse(false);
        }
    }
    //null
    public function  testDeleteUserByIdNull() {
        $userModel = new UserModel();
        $expected = false;
        $userid = null ;
        $user = $userModel->deleteUserById($userid);
        $actual = $user;
        $this->assertEquals($expected, $actual);
       
    }
 
    //số thực
    public function  testDeleteUserByIdDouble() {
        $userModel = new UserModel();
        $expected = true;
        $userid = 5.5;
        $user = $userModel->deleteUserById($userid);
        $actual = $user;
        $this->assertEquals($expected, $actual);
       
    }
    //số âm
    public function  testDeleteUserByIdSoAm() {
        $userModel = new UserModel();
        $expected = true;
        $userid = -11;
        $user = $userModel->deleteUserById($userid);
        $actual = $user;
        $this->assertEquals($expected, $actual);
       
    }


}