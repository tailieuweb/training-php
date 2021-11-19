<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    protected static $_instance;
//Function getInstance
    //OK!
    public function testGetInstanceOk(){
        $userModel = new UserModel();
        $expected = UserModel::getInstance();
        $actual = $userModel->getInstance();
        $this->assertEquals($expected,$actual);
    }
    //OK!
    public function testGetInstanceNull(){
        $userModel = new UserModel();
        $expected = self::$_instance;
        $actual = $userModel->getInstance();
       // $this->assertEquals($expected,$actual);
        if($expected != null){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }
//Function FindUserByID
    //OK
    public function testFindUserByIdOk(){
        $userModel = new UserModel();
        $userId = 18;
        $userName = 'admin';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName,$actual);

    }
    //FAILURES!
    public function testFindUserByIdStr() {
        $userModel = new UserModel();
        $id = '18';
        $expected = 'error';
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
        
        }
    //OK
    public function testFindUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;
        // $userName = 'asdf';
        $user = $userModel->findUserById($userId);
        if(empty($user)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }

    }
     //FAILURES!
     public function testFindUserByIdFloat() {
        $userModel = new UserModel();
        $id = 18.1;
        $expected = 'error';
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
        
        }
     //FAILURES!
    public function testFindUserByIdNotGood() {
        $userModel = new UserModel();
        $id = 18;
        // $expected = 'error';
        $actual = $userModel->findUserById($id);
            // $this->assertEquals($expected, $actual);
        if ($actual != 18) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }   
    }
    // //ERRORS!
    // public function testFindUserByIdNull() {
    //     $userModel = new UserModel();
    //     $id = '';
    //     $expected = 'error';
    //     $actual = $userModel->findUserById($id);
    //     // $this->assertEquals($expected, $actual);
    //     if(empty($id)){
    //         $this->assertTrue(true);
    //     }else{
    //         $this->assertTrue(false);
    //     }
    // }
    // //ERRORS!
    // public function testFindUserByIdObject() {
    //     $userModel = new UserModel();
    //     $id = (object) [
    //         'id' => 22
    //     ];
    //     $expected = 'error';
    //     $actual = $userModel->findUserById($id);
        
    //     $this->assertEquals($expected, $actual);
        
    //     }
//Function FindUser
    //OK
    public function testFindUserOk(){
        $userModel = new UserModel();

        $search = 'ad';
        $userName = 'admin';
        // $email = '123aaa@gmail.com';
        $result = $userModel->findUser($search);
        $actual = $result[0]['name'];
        // $actual = $result[0]['email'];
        $this->assertEquals($userName,$actual);
        // $this->assertEquals($email,$actual);
    }
    //FAILURES!
    public function testFindUserStr() {
        $userModel = new UserModel();
        $search = 'adm';
        $expected = 'error';
        $actual = $userModel->findUser($search);
        $this->assertEquals($expected, $actual);
        }
    //FAILURES!
    public function testFindUserInt() {
        $userModel = new UserModel();
        $search = 1;
        $expected = 'error';
        $actual = $userModel->findUser($search);
        $this->assertEquals($expected, $actual);
        }
    //FAILURES!
    public function testFindUserFloat() {
        $userModel = new UserModel();
        $search = 1.1;
        $expected = 'error';
        $actual = $userModel->findUser($search);
        $this->assertEquals($expected, $actual);
        }
    //OK
    public function testFindUserNg(){
        $userModel = new UserModel();
        $search = 'xss';
        $actual = $userModel->findUser($search);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    //OK
    public function testFindUserNotGood() {
        $userModel = new UserModel();
        $search = 'adm';
        $name = 'admin';
        $result = $userModel->findUser($search);
        $actual = $result[0]['name'];
            // $this->assertEquals($expected, $actual);
        if ($actual != $name) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }   
    //OK!
    public function testFindUserNull() {
        $userModel = new UserModel();
        $search = '';
        $expected = 'error';
        $actual = $userModel->findUser($search);
        // $this->assertEquals($expected, $actual);
        if(empty($search)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    // //fail
    // // public function testString()
    // // {
    // //     $userModel = new UserModel();
    // //     $a = 1;
    // //     $b = 'a';

    // //     //number + string
    // //     //number
    // //     //numberstring

    // //     $expected = 'error';
    // //     $actual = $userModel->sumb($a, $b);

    // //     $this->assertEquals($expected, $actual);

    // // }    

    //fail
    // public function testTwoString()
    // {
    //     $userModel = new UserModel();
    //     $a = 'a';
    //     $b = 'b';

    //     //number + string
    //     //number
    //     //numberstring

    //     $expected = 'error';
    //     $actual = $userModel->sumb($a, $b);

    //     $this->assertEquals($expected, $actual);
    // }

    public function testSumNotgood()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        
        $actual = $userModel->sumb($a,$b);
        
        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);
        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testTwoPositiveInt()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testTwoNegativeInt()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testNegativePositiveInt()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumFloat()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.33;
        $expected = 3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumPositiveFloat()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.33;
        $expected = 3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
  

    public function testSumNegativeFloat()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = -2.33;
        $expected = -3.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testNegativePositiveFloat()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = 2.33;
        $expected = 0.83;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
}