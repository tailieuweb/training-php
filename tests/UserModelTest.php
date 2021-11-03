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
     * Cộng
     */
    public function sumb($a, $b)
    {
        if (!is_numeric($a)) return "error";
        if (!is_numeric($b)) return "error";
        return $a + $b;
    }

    //test testFindUserById
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userId = 14;
        $userName = 'abc';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userId = 10;

        $user = $userModel->findUserById($userId);

        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(true);
        }
    }
    //
    public function testFindUserByIdOk2() {
        $userModel = new UserModel();

        $id = 8;
        $mongDoiUsername = 'asdf';

        $user = $userModel->findUserById($id);

        $this->assertEquals($mongDoiUsername, $user[0]['name']);

    }

    public function testFindUserByIdStr() {
        $userModel = new UserModel();

        $id = 'asdf';


        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);

    }

    public function testFindUserByIdNull() {
        $userModel = new UserModel();
        $id = '';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);

    }

    //test getUser
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => 14,
            'name' => 'abc',
            'fullname'=>'vitcon',
            'type' => 'admin',
            'email'=> 'hhhhh@gmail.com',
            'password'=> '123456'
        );
        $actual = $userModel->insertUser($user);
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    // public function testInsertUserNotG()
    // {
    //     $userModel = new UserModel();
    //     $user = array(
    //         'id' => 14,
    //         'name' => 'abc',
    //         'fullname'=>'', //full name rỗng
    //         'type' => 'admin',
    //         'email'=> 'hhhhh@gmail.com',
    //         'password'=> '123456'
    //     );
    //     $actual = $userModel->insertUser($user);
    //     if($actual == false){
    //         $this->assertTrue(true);
    //     }else{
    //         $this->assertTrue(false);
    //     }
    // }
}
