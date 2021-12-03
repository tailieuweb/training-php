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

    public function testSumOkam()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumOkad()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testSumOkDouble()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.5;
        $expected = 4;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testStr()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 'a';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    public function testString()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'b';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case insertUser OK
     */
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $userId = 6;
        $input['name'] = 'le';
        $input['password']  = '1234';
        $input['fullname'] = 'lenguyentan';
        $input['email'] = 'tanle123@gmail.com';
        $input['type'] = 'admin';
        $userModel->insertUser($input);
        $expected = $userModel->findUserById($userId);
        $actual = $expected[4]['name']['password']['fullname']['email']['type'];
        //var_dump($actual); die();
        $this->assertEquals($input['name']['password']['fullname']['email']['type'], $actual);
    }

    /**
     * Test case insertUser Not good
     */
    public function testInsertUserNg()
    {
        $userModel = new UserModel();
        $input['name'] = 'tanle';
        $input['password']  = '12345';
        $input['fullname'] = 'nguyentanle';
        $input['email'] = 'tanle@gmail.com';
        $input['type'] = 'user';

        $user = $userModel->insertUser($input);
        $expected = $userModel->findUserById(6);
        if ($expected != null) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }
    //-------------------------------
    /**
     * Test function auth is right
     */
    public function testAuthOk()
    {
        $user = new UserModel();
        $name = "Trinh";
        $pass = "11111";

        $actual = $user->auth($name, $pass);

        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test function auth with name worng
     */
    public function testAuthNameNg()
    {
        $user = new UserModel();
        $name = "Trinh";
        $pass = "11111";

        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password worng
     */

   //TEST OF FUNCTION auth
   public function testAuthWithOK()
   {
      $userModel = new UserModel();
      $expected = [
          "id" => 63,
          "name" => "Trinh",
          "fullname" => "lemytrinh",
          "email" => "lemytrinh021@gmail.com",
          "type" => "admin",
          "password" => "b59c67bf196a4758191e42f76670ceba",
      ];
      $name = "Trinh";
      $password = "1111";
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual[0]);
   }
   //
   public function testAuthWithFailed()
   {
      $userModel = new UserModel();
      $expected = [];
      $name = "Trinh";
      $password = "123451232";
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsNumber()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = 1;
      $password = "123451232";
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsNumber()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "Trinh";
      $password = 11123;
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsNumber()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = 3004;
      $password = 1975;
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsArray()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = [];
      $password = "12345";
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsArray()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "pp6";
      $password = [];
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsArray()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = [];
      $password = [];
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsObject()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = new stdClass;
      $password = "12345";
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsObject()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "Trinh";
      $password = new stdClass;
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsObject()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = new stdClass;
      $password = new stdClass;
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsNull()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = null;
      $password = "12345";
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsNull()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "Trinh";
      $password = null;
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsNull()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = null;
      $password = null;
      $actual = $userModel->auth($name,$password);
      $this->assertEquals($expected, $actual);
   }
}