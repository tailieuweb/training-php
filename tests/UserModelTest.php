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
     * Test string
     */
    public function testString()
    {
        $userModel = new UserModel();
        $a = 'p';
        $b = 2;
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }


    /**
     * Test two string
     */
    public function testTwoString()
    {
        $userModel = new UserModel();
        $a = 'p';
        $b = 'ư';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findUserById
     */
    public function testFindUserById()
    {
        $userModel = new UserModel();
        $userID = 4;
        $userName = 'hacker1';

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
        $userID = 1;

        $user = $userModel->findUserById($userID);

       if(empty($user)){
           $this->assertTrue(true);
       }
       else{
        $this->assertTrue(false);
       }
    }
    //Test findUserById
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();

        $id = md5(56 . "app_web1");
        $expected  = 'test1';

        $bank = $userModel->findUserById($id);
        $this->assertEquals($expected, $bank[0]['name']);
    }
    public function testFindUserByIdString()
    {
        $userModel = new UserModel();

        $id = md5("qwe" . "app_web1");
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = md5("" . "app_web1");
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();
        $id = new stdClass();
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdBool()
    {
        $userModel = new UserModel();
        $id = true;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();
        $id = ['id' => 124];
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
//TEST GET USER
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
}
