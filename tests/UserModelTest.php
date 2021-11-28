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
     * Test case Okie
     */
    public function testSum2()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSum3()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSum4()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.1;
        $expected = 3.6;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSum5()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = "2";
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Okie
     */
    public function testSum6()
    {
        $userModel = new UserModel();
        $a = "1";
        $b = "2";
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $id = 7;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals(true, $actual);
    }
    public function testDeleteUserByIdStr()
    {
        $userModel = new UserModel();
        $id = 'Hen';
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals(false, $actual);
    }
    public function testDeleteUserEmpty()
    {
        $userModel = new UserModel();
        $id = "";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals(false, $actual);
    }
    public function testDeleteUserNull()
    {
        $userModel = new UserModel();
        $id = null;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals(false, $actual);
    }
    public function testDeleteUserByIdNE()
    {
        $userModel = new UserModel();
        $id = 99;
        $user = $userModel->findUserById($id);
        $expected = null;
        if($user){
            $expected = true;
        }else{
            $expected = false;
        }
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByArray()
    {
        $userModel = new UserModel();
        $id = [];
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByObject()
    {
        $userModel = new UserModel();
        $id = new UserModel();;
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserOk()
    {
        $userModel = new UserModel();
        $keyword = "H";
        $actual1 = $userModel->findUser($keyword);
        $this->assertEquals(strtolower($keyword), strtolower($actual1['name']['email']));
    }

    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();

        $id = 9;
        $MDUsername = 'Hen';

        $user = $userModel->findUserById($id);

        $this->assertEquals($MDUsername, $user[0]['name']);
    }
    public function testFindUserByIdNE()
    {
        $userModel = new UserModel();

        $id = 10;


        $user = $userModel->findUserById($id);

        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFindUserByIdStr()
    {
        $userModel = new UserModel();

        $id = 'Hen';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = '';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();

        $id = new stdClass();
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();

        $id = [];
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
}
