<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase {

//    //test function getUser
////    public function testGetUsers(){
////        $userModel = new UserModel();
////    }
//    //ok
//    public function testFindUserByIdOk(){
//        $userModel = new UserModel();
//        $userId = 18;
//        $userName = 'admin';
//
//        $user = $userModel->findUserById($userId);
//        $actual = $user[0]['name'];
//
//        $this->assertEquals($userName,$actual);
//
//    }
//    // //fail
//    // public function testFindUserByIdStr() {
//    //     $userModel = new UserModel();
//
//    //     $id = 'asdf';
//
//
//    //     $expected = 'error';
//    //     $actual = $userModel->findUserById($id);
//
//    //     $this->assertEquals($expected, $actual);
//
//    //     }
//    //     //fail
//    // public function testFindUserByIdNull() {
//    //     $userModel = new UserModel();
//    //     $id = '';
//    //     $expected = 'error';
//    //     $actual = $userModel->findUserById($id);
//
//    //     // $this->assertEquals($expected, $actual);
//    //     if(empty($id)){
//
//    //         $this->assertTrue(true);
//    //     }else{
//    //         $this->assertTrue(false);
//    //     }
//
//    // }
//    // //fail
//    // public function testFindUserByIdObject() {
//    //     $userModel = new UserModel();
//
//    //     $id = new stdClass();
//    //     $expected = 'error';
//    //     $actual = $userModel->findUserById($id);
//
//    //     $this->assertEquals($expected, $actual);
//
//    //     }
//        //ok
//    public function testFindUserByIdNg(){
//        $userModel = new UserModel();
//        $userId = 9999;
//        $userName = 'asdf';
//
//        $user = $userModel->findUserById($userId);
//
//        if(empty($user)){
//
//            $this->assertTrue(true);
//        }else{
//            $this->assertTrue(false);
//        }
//
//    }
//    //fail
//    // public function testString()
//    // {
//    //     $userModel = new UserModel();
//    //     $a = 1;
//    //     $b = 'a';
//
//    //     //number + string
//    //     //number
//    //     //numberstring
//
//    //     $expected = 'error';
//    //     $actual = $userModel->sumb($a, $b);
//
//    //     $this->assertEquals($expected, $actual);
//
//    // }
//
//    //fail
//    // public function testTwoString()
//    // {
//    //     $userModel = new UserModel();
//    //     $a = 'a';
//    //     $b = 'b';
//
//    //     //number + string
//    //     //number
//    //     //numberstring
//
//    //     $expected = 'error';
//    //     $actual = $userModel->sumb($a, $b);
//
//    //     $this->assertEquals($expected, $actual);
//    // }
//
//    public function testSumNotgood()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//
//        $actual = $userModel->sumb($a,$b);
//
//        if ($actual != 3) {
//            $this->assertTrue(false);
//        } else {
//            $this->assertTrue(true);
//        }
//    }
//    public function testSumOk()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//        $expected = 3;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//    public function testSumNg()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//        $expected = 3;
//
//        $actual = $userModel->sumb($a, $b);
//        if ($actual != 3) {
//            $this->assertTrue(false);
//        } else {
//            $this->assertTrue(true);
//        }
//    }
//    public function testTwoPositiveInt()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//        $expected = 3;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testTwoNegativeInt()
//    {
//        $userModel = new UserModel();
//        $a = -1;
//        $b = -2;
//        $expected = -3;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testNegativePositiveInt()
//    {
//        $userModel = new UserModel();
//        $a = -1;
//        $b = 2;
//        $expected = 1;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testSumFloat()
//    {
//        $userModel = new UserModel();
//        $a = 1.5;
//        $b = 2.33;
//        $expected = 3.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testSumPositiveFloat()
//    {
//        $userModel = new UserModel();
//        $a = 1.5;
//        $b = 2.33;
//        $expected = 3.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//
//    public function testSumNegativeFloat()
//    {
//        $userModel = new UserModel();
//        $a = -1.5;
//        $b = -2.33;
//        $expected = -3.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testNegativePositiveFloat()
//    {
//        $userModel = new UserModel();
//        $a = -1.5;
//        $b = 2.33;
//        $expected = 0.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//    public function testadd(){
//        $userModel = new UserModel();
//        $result = $userModel->add(4,5);
//        $actual = $result;
//        $expected = 9;
//        $this->assertEquals($expected,$actual);
//    }

    // TEST GETUSERS
    public function testGetCountUsers() {
        $user             = new UserModel();
        $param["keyword"] = "a";
        $actual           = count($user->getUsers($param));
        $expected         = 2;
        $this->assertEquals($expected, $actual);
    }

    public function testGetCountNoUser() {
        $user             = new UserModel();
        $param["keyword"] = "l";
        $actual           = empty($user->getUsers($param)) ? "User not found!" : "";
        $expected         = "User not found!";
        $this->assertEquals($expected, $actual);
    }

    public function testSpecialCharacters() {
        $user             = new UserModel();
        $param["keyword"] = "??";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }

    public function testGetUserNg() {
        $user             = new UserModel();
        $param["keyword"] = "dsdsdsd";
        $actual           = count($user->getUsers($param));
        if ($actual != 0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetUserGood() {
        $user             = new UserModel();
        $param["keyword"] = "admin";
        $actual           = count($user->getUsers($param));
        if ($actual != 1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testLongCharacters() {
        $user             = new UserModel();
        $param["keyword"] = "Loren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artist";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }

    public function testNumber() {
        $user             = new UserModel();
        $param["keyword"] = "45646546546";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }

    public function testNullValue() {
        $user             = new UserModel();
        $param["keyword"] = "";
        $actual           = count($user->getUsers($param));
        $expected         = 3;
        $this->assertEquals($expected, $actual);
    }

    public function testSpace() {
        $user             = new UserModel();
        $param["keyword"] = "          ";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }
    public function testTrue() {
        $user             = new UserModel();
        $param["keyword"] = "admin";
        $stringActual          = $user->getUsers($param);
        $actual = $stringActual[0]["name"];
        $expected         = "admin";
        $this->assertEquals($expected, $actual);
    }
    

//    public function testSQLInjection() {
//        $user             = new UserModel();
//        $param["keyword"] = 'abcef%'.'"'.';TRUNCATE banks;##';
//        $actual           = count($user->getUsers($param));
//        $expected         = 0;
//        $this->assertEquals($expected, $actual);
//
//    }

}