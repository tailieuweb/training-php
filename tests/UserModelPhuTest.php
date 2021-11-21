<?php

use PHPUnit\Framework\TestCase;

class UserModelPhuTest extends TestCase
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
     * Test case strvsstr
     */
    public function testChuoivsChuoi()
    {
        $userModel = new UserModel();
        $a = 'bb';
        $b = 'aa';

        $expected = 'bbaa';
        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test find user
     */
    // public function testfindUserByIdOk()
    // {
    //     $userModel = new UserModel();
    //     $userId = 2;
    //     $userName = 'Phu';

    //     $user = $userModel->findUserById($userId);
    //     $actual = $user[0]['name'];

    //     $this->assertEquals($userName, $actual);
    // }
    // public function testInsertUserOk()
    // {
    //     $userModel = new UserModel();
    //     $user = array(
    //         'id' => 14,
    //         'name' => 'abc',
    //         'fullname' => 'vitcon',
    //         'type' => 'admin',
    //         'email' => 'hhhhh@gmail.com',
    //         'password' => '123456'
    //     );
    //     $actual = $userModel->insertUser($user);
    //     if ($actual == true) {
    //         $this->assertTrue(true);
    //     } else {
    //         $this->assertTrue(false);
    //     }
    // }
    public function testUpdateUserOk()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => 19,
            'name' => 'abcd',
            'fullname' => 'hoangphu',
            'type' => 'admin',
            'email' => 'hhhpppp@gmail.com',
            'password' => '1234567'
        );
        $actual = $userModel->updateUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testUpdateUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => [],
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => ''
        );
        $actual = $userModel->updateUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    // public function testGetUserOk()
    // {
    //     $userModel = new UserModel();

    //     $count_array = 6;
    //     $actual = $userModel->getUsers();

    //     $this->assertEquals($count_array, count($actual));
    // }
    // public function testGetUserbyKeyWordOk()
    // {
    //     $userModel = new UserModel();
    //     $params= [];
    //     $params['keyword'] = '321';
    //     $count_array = 6;
    //     $actual = $userModel->getUsers( $params);

    //     $this->assertEquals($count_array,count($actual));
    // }
    // public function testDeleteUserByIdNg()
    // {
    //     $userModel = new UserModel();
    //     $id = 20;


    //     $actual = $userModel->deleteUserById($id);


    //     // $this->assertEquals($userModel->findUserById($id),$actual);
    //     if ($actual == true) {
    //         $this->assertTrue(true);
    //     } else {
    //         $this->assertTrue(false);
    //     }
    // }
}
