<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    //ok
    public function testFindUserByIdOk(){
        $userModel = new UserModel();
        $userId = 18;
        $userName = 'admin';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName,$actual);

    }
    // //fail
    // public function testFindUserByIdStr() {
    //     $userModel = new UserModel();
        
    //     $id = 'asdf';
        
        
    //     $expected = 'error';
    //     $actual = $userModel->findUserById($id);
        
    //     $this->assertEquals($expected, $actual);
        
    //     }
    //     //fail
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
    // //fail
    // public function testFindUserByIdObject() {
    //     $userModel = new UserModel();
        
    //     $id = new stdClass();
    //     $expected = 'error';
    //     $actual = $userModel->findUserById($id);
        
    //     $this->assertEquals($expected, $actual);
        
    //     }
        //ok
    public function testFindUserByIdNg(){
        $userModel = new UserModel();
        $userId = 9999;
        $userName = 'asdf';

        $user = $userModel->findUserById($userId);
        
        if(empty($user)){
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }

    }
    //fail
    // public function testString()
    // {
    //     $userModel = new UserModel();
    //     $a = 1;
    //     $b = 'a';

    //     //number + string
    //     //number
    //     //numberstring

    //     $expected = 'error';
    //     $actual = $userModel->sumb($a, $b);

    //     $this->assertEquals($expected, $actual);

    // }    

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


    // Test function in UserModel
    public function testgetUser(){

    }

}