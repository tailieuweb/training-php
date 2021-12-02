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

    /**
     * Các trường hợp cần test
     * truyền đúng u & p
     * truyền sai u
     * truyền sai pass
     * truyền sai u và p
     * truyền sai kiểu dữ liệu u (array, object)
     * truyền sai kiểu dữ liệu p (array, object)
     * truyền sai kiểu dữ liệu u & p (array, object)
     */
    public function testAuthPassGood()
    {
        $user = new UserModel();
        $name = "trinhnulo";
        $pass = "123";
        //Setup input for insert new user
        $input = [
            'name' => "trinhnulo",
            'password' => "123",
            'fullname' => "le my trinh",
            'email' => "123",
            'type' => "admin"
        ];
        //Start transaction
        $user->startTransaction();

        //Execute function insert user
        $user->insertUser($input);
        // $newUser = $user->findUserById(6);
        // var_dump($newUser);

        //Test
        $actual = $user->auth($name, $pass);
        $this->assertEquals($actual[0]['name'], "trinhnulo");
        $user->rollback();

        //Test

        // die();
        // $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        // $expected = true;
        // $this->assertEquals($expected, $actual);
    }
    //Test auth invalid input name
    public function testAuthInvalidUser()
    {
        $user = new UserModel();
        $name = "trinhnulo";
        $pass = "123";
        //Setup input for insert new user
        $input = [
            'name' => "trinhnulo",
            'password' => "123",
            'fullname' => "le my trinh",
            'email' => "123",
            'type' => "admin"
        ];
        //Start transaction
        $user->startTransaction();

        //Execute function insert user
        $user->insertUser($input);

        //Test
        $actual = $user->auth($name, $pass);
        if ($actual[0]['name'] == "trinhnulo") {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $user->rollback();
    }

    //Test auth invalid input pass
    public function testAuthPassNG()
    {
        $user = new UserModel();
        $name = "trinhnulo";
        $pass = "123";
        //Setup input for insert new user
        $input = [
            'name' => "trinhnulo",
            'password' => "123",
            'fullname' => "le my trinh",
            'email' => "123",
            'type' => "admin"
        ];
        //Start transaction
        $user->startTransaction();

        //Execute function insert user
        $user->insertUser($input);
        // $newUser = $user->findUserById(6);
        // var_dump($newUser);

        //Test
        $actual = $user->auth($name, $pass);
        $this->assertEquals($actual[0]['password'], (md5("123")));
        $user->rollback();
    }
    public function testAuthWithAllNull()
    {
        $user = new UserModel();
        $name = "trinhnulo";
        $pass = "123";
        //Setup input for insert new user
        $input = [
            'name' => "trinhnulo",
            'password' => "123",
            'fullname' => "le my trinh",
            'email' => "123",
            'type' => "admin"
        ];
        //Start transaction
        $user->startTransaction();

        //Execute function insert user
        $user->insertUser($input);
        // $newUser = $user->findUserById(6);
        // var_dump($newUser);

        //Test
        $actual = $user->auth($name, $pass);
        $this->assertEquals($actual[]['name'], "trinhnulo");
        $user->rollback();
    }
}