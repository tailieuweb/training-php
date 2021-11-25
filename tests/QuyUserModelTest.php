<?php

use PHPUnit\Framework\TestCase;

class QuyUserModelTest extends TestCase
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
    
    // public function testInsertUserOk()
    // {
    //     $userModel = new UserModel();
    //     $user = array(
    //         'id' => 2,
    //         'name' => 'test2',
    //         'fullname' => '',
    //         'type' => '',
    //         'email' => '',
    //         'password' => ''
    //     );
    //     $actual = $userModel->insertUser($user);
    //     if ($actual == true) {
    //         $this->assertTrue(true);
    //     } else {
    //         $this->assertTrue(false);
    //     }
    // }
    

    public function testGetUserOk()
    {
        $userModel = new UserModel();

        $count_array = 4;
        $actual = $userModel->getUsers();

        $this->assertEquals($count_array, count($actual));
    }
    //test getUser khi khong co du lieu oke
    public function testGetUserNullOK()
    {
        $userModel = new UserModel();

        $actual = $userModel->getUsers();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
      //test getUser khi khong co du lieu false
      public function testGetUserNullF()
    {
        $userModel = new UserModel();
        $actual = null;
        $actual = $userModel->getUsers();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
      //test getUser khi strNull ok
      public function testGetUserStrNullOke()
     {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => null,
        );
        $actual = $userModel->getUsers($keyword);

        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
     }
     //test getUser khi strNull F
     public function testGetUserStrNullF()
     {
        $userModel = new UserModel();

        $keyword = array(
            'keyword' => 'id',
            'keyword' => 'Username'
        );
        $actual = $userModel->getUsers($keyword);

        if ($actual != []) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
     }
    // public function testGetUserbyKeyWordOk()
    // {
    //     $userModel = new UserModel();
    //     $params= [];
    //     $params['keyword'] = '321';
    //     $count_array = 3;
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
    /**
     * Test findUserById Ok
     */
}
