<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case so am
     */
    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case am duong
     */
    public function testSumAD()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case so thuc
     */
    public function testSumSoThuc()
    {
        $userModel = new UserModel();
        $a = 3.2;
        $b = 1.2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 4.4) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /**
     * Test case str
     */
    public function testStr()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 'a';

        $expected = 'error';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test findUserById Ok
     */
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userID = 3;
        $userName = 'hackerasfasf';

        $user = $userModel->findUserById($userID);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    /**
     * Test findUserById not good
     */
    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userID = 7;

        $user = $userModel->findUserById($userID);

       if(empty($user)){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }
    /**
     * Test findUserById null
     */
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $userID = null;

        $user = $userModel->findUserById($userID);

       if(empty($user)){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }
    /**
     * Test findUserById
     */
    public function testFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userID ='asd';

        $user = $userModel->findUserById($userID);

       if(empty($user)){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }
    /**
     * Test function testFindUserNg
     */
    public function testFindUserNg(){
        $user = new UserModel();
        $keyword = "3535353aaa";
        $expected = [];
        $actual = $user->findUser($keyword);
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function testFindUserNull
     */
    public function testFindUserNull(){
        $user = new UserModel();
        $keyword = null;
        $expected = [];
        $actual = $user->findUser($keyword);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function testFindUserOk
     */
    public function testFindUserOk()
    {
        $userModel = new UserModel();
        $keyword = "test2";

        $user = $userModel->findUser($keyword);

       if(empty($user)){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }
    /**
     * Test function testFindUser_KyTuDacBiet
     */
    public function testFindUser_KyTuDacBiet()
    {
        $userModel = new UserModel();
        $keyword = "!!!!";

        $user = $userModel->findUser($keyword);

       if(empty($user)){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }
}
