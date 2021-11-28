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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = 12;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals(true, $actual);
    }
    public function testDeleteUserByIdStr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = 'Hen';
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserEmpty()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = "";
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = null;
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByIdNE()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = 99;
        $user = $userModel->findUserById($id);
        $expected = null;
        if($user){
            $expected = false;
        }else{
            $expected = true;
        }
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByArray()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = [];
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteUserByObject()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = new UserModel();;
        $expected = "error";
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($expected, $actual);
    }

    // public function testFindUserOk()
    // {
    //     $userModel = new UserModel();
    //     $keyword = "H";
    //     $actual1 = $userModel->findUser($keyword);
    //     $this->assertEquals(strtolower($keyword), strtolower($actual1['name']['email']));
    // }

    public function testFindUserByIdOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = 9;
        $MDUsername = 'Hen';

        $user = $userModel->findUserById($id);

        $this->assertEquals($MDUsername, $user[0]['name']);
    }
    public function testFindUserByIdNE()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

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
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $id = 'Hen';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdEmpty()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = '';
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $id = null;
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdObject()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $id = new stdClass();
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdArray()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $id = [];
        $expected = 'error';
        $actual = $userModel->findUserById($id);

        $this->assertEquals($expected, $actual);
    }
}
