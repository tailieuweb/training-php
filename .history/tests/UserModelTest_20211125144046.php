<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test function findUserById
     */
    public function testFindUserByIdOk()
    {
        $user = new UserModel();
        $userId = 2;

        $expected = "test2";
        $actual = $user->findUserById($userId);
        $this->assertEquals($expected, $actual[0]['name']);
    }
    /**
     * Test function findUserById with id not exits
     */
    public function testFindUserByIdNg()
    {
        $user = new UserModel();
        $userId = 1;

        $actual = $user->findUserById($userId);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUserById with id is string
     */
    public function testFindUserByIdStr()
    {
        $userModel = new UserModel();
        $id = 'asdf';

        $actual = $userModel->findUserById($id);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUserById with id is float
     */
    public function testFindUserByIdFloat()
    {
        $userModel = new UserModel();
        $id = 11.5;

        $actual = $userModel->findUserById($id);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUserById with id null
     */
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();

        $id = null;

        $actual = $userModel->findUserById($id);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUserById with id is array
     */
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();

        $id = [
            'name', 'email'
        ];

        $actual = $userModel->findUserById($id);
        // $this->assertEquals($expected, $actual);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUserById with id is object
     */
    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();

        $id = new BankModel();

        $actual = $userModel->findUserById($id);
        // $this->assertEquals($expected, $actual);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test function findUser
     */
    public function testFindUsersOk()
    {
        $user = new UserModel();
        $keys = "a";
        // $expected = "LE VAN LAM";
        $actual = $user->findUser($keys);
        //  var_dump($actual);die();
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test function findUser with key not exits
     */
    public function testFindUserNg()
    {
        $user = new UserModel();
        $keys = "45125215sad";

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUser with key is float
     */
    public function testFindUserKeyFloat()
    {
        $user = new UserModel();
        $keys = 11.45;

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUser with key is array
     */
    public function testFindUserArray()
    {
        $user = new UserModel();
        $keys = [1];

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUser with key is null
     */
    public function testFindUserNull()
    {
        $user = new UserModel();
        $keys = null;

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUser with key is number
     */
    public function testFindUserNumber()
    {
        $user = new UserModel();
        $keys = 123;

        $actual = $user->findUser($keys);
        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function findUser with key is object
     */
    public function testFindUserObject()
    {
        $user = new UserModel();
        $keys = new BankModel();

        $actual = $user->findUser($keys);

        $expected = 'error';
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test function auth is right
     */
    public function testAuthOk()
    {
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = "11111";

        // $expected = "LE VAN LAM";
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
        $name = "Le LAM 11";
        $pass = "11111";

        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password worng
     */
    public function testAuthPassNg()
    {
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = "111119999";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is number
     */
    public function testAuthNameNumber()
    {
        $user = new UserModel();
        $name = 123;
        $pass = "12345";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is number
     */
    public function testAuthNameFloat()
    {
        $user = new UserModel();
        $name = 12.2;
        $pass = "12345";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password is number
     */
    public function testAuthPassNumberOk()
    {
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = 11111;

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password is number
     */
    public function testAuthPassNumberNg()
    {
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = 11999;

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with password is float
     */
    public function testAuthPassFloat()
    {
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = 11.3231;

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is null
     */
    public function testAuthNameNull()
    {
        $user = new UserModel();
        $name = null;
        $pass = "11111";

        // $expected = "LE VAN LAM";
        $actual = $user->auth($name, $pass);
        // var_dump(md5($pass));die();
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with pass is null
     */
    public function testAuthPassNull()
    {
        $user = new UserModel();
        $name = "Le LAM 22";
        $pass = null;

        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is array
     */
    public function testAuthNameArray()
    {
        $user = new UserModel();
        $name = ['Le Lam 22'];
        $pass = '2222';

        $actual = $user->auth($name, $pass);

        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with pass is array
     */
    public function testAuthPassArray()
    {
        $user = new UserModel();
        $name = 'Le Lam 22';
        $pass = ['1111', '22222'];

        $actual = $user->auth($name, $pass);

        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with name is object
     */
    public function testAuthNameObject()
    {
        $user = new UserModel();
        $name = new BankModel();
        $pass = '2222';

        $actual = $user->auth($name, $pass);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test function auth with pass is array
     */
    public function testAuthPassObject()
    {
        $user = new UserModel();
        $name = 'Le Lam 22';
        $pass = new BankModel();

        $actual = $user->auth($name, $pass);

        $expected = true;
        $this->assertEquals($expected, $actual);
    }


    /**
     * Test function create token
     * TODO
     */
    public function testCreateTokenOk()
    {
        $user = new UserModel();
        $name = "Le LAM";
        $pass = "12345";

        // $expected = "LE VAN LAM";
        $actual = $user->createToken();
        if ($actual == '') {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    /**
     * Test function get instance
     */
    public function testGetInstance()
    {
        $user = new UserModel();
        $actual = $user->getInstance();

        if ($user == $actual) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testGetInstanceChange()
    {
        $user = new UserModel();
        //Create user 2
        $user2 = new UserModel();

        $actual = $user2->getInstance();
        if ($user == $actual) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
        // var_dump($user);die();
    }

    /**
     * Test get type user right
     */
    public function testUpdateUserOk()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = "Test update ok";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user wrong
     * id not exist
     */
    public function testUpdateUserIdNotExist()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 999; //id user not exist
        $input['name'] = "Test update";
        $input['fullname'] = "Test update wrong";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    /**
     * Test get type user wrong
     * id is null
     */
    public function testUpdateUserIdNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = null;
        $input['name'] = "Test update";
        $input['fullname'] = "Test update ok";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }

    /**
     * Test get type user right
     * Name is null
     */
    public function testUpdateUserNameNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = null;
        $input['fullname'] = "Test update ok";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * fullname is null
     */
    public function testUpdateUserFullNameNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = null;
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Email is null
     */
    public function testUpdateUserEmailNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = "Test user update with email null";
        $input['email'] = null;
        $input['type'] = 3;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Type is null
     */
    public function testUpdateUserTypeNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = null;
        $input['password'] = "12345";
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Pass is null
     */
    public function testUpdateUserPassNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test update";
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = null;
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user wrong
     * ID is string
     */
    public function testUpdateUserIdStr()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = '11';
        $input['name'] = "Test update";
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        $expected = true;
        if ($actual == $expected) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * type is string
     */
    public function testUpdateUserTypeStr()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = '11';
        $input['name'] = "Test update";
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        $expected = true;
        if ($actual == $expected) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * type is string
     */
    public function testUpdateUserNameNum()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 123;
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Fullname is int
     */
    public function testUpdateUserFullNameNum()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 123;
        $input['fullname'] = 123;
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * email is int
     */
    public function testUpdateUserEmailNum()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 'lam';
        $input['fullname'] = 'le van lam';
        $input['email'] = 1234;
        $input['type'] = 3;
        $input['password'] = '12345';
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        $expected = true;
        if ($actual == $expected) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * pass is int
     */
    public function testUpdateUserPassNum()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 'lam';
        $input['fullname'] = 'le van lam';
        $input['email'] = 'lam@gmail.com';
        $input['type'] = 3;
        $input['password'] = 12345;
        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        // $expected = false;
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * id is array
     */
    public function testUpdateUserIdArray()
    {
        //Create array
        $arr = ['1', '10'];
        $user = new UserModel();
        $input = [];
        $input['id'] = $arr;
        $input['name'] = "Test update";
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        $expected = true;
        if ($actual == $expected) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }

    /**
     * Test get type user right
     * Name is array
     */
    public function testUpdateUserNameArray()
    {
        //Create array
        $arr = ['1', '10'];
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = $arr;
        $input['fullname'] = "Test user update with email null";
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }

    /**
     * Test get type user right
     * Fullname is array
     */
    public function testUpdateUserFullNameArray()
    {
        //Create array
        $arr = ['1', '10'];
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "Test user update with email null";
        $input['fullname'] = $arr;
        $input['email'] = "testUpdate@gmail.com";
        $input['type'] = 3;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Email is array
     */
    public function testUpdateUserEmailArray()
    {
        //Create array
        $arr = ['1', '10'];
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "User 2";
        $input['fullname'] = "testUpdate@gmail.com";
        $input['email'] = $arr;
        $input['type'] = 3;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Type is array
     */
    public function testUpdateUserTypeArray()
    {
        //Create array
        $arr = ['1', '10'];
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "User 2";
        $input['fullname'] = "This is of user 2";
        $input['email'] = "levanlam@gmail.com";
        $input['type'] = $arr;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Password is array
     */
    public function testUpdateUserPassArray()
    {
        //Create array
        $arr = ['1', '10'];
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = "User 2";
        $input['fullname'] = "This is of user 2";
        $input['email'] = "levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = $arr;

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }

    /**
     * Test get type user right
     * Id is Object
     */
    public function testUpdateUserIdObject()
    {
        //Create array
        $object = new stdClass();
        $user = new UserModel();
        $input = [];
        $input['id'] = $object;
        $input['name'] = "User 2";
        $input['fullname'] = "This is of user 2";
        $input['email'] = "levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Name is Object
     */
    public function testUpdateUserNameObject()
    {
        //Create array
        $object = new stdClass();
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = $object;
        $input['fullname'] = "This is of user 2";
        $input['email'] = "levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * FullName is Object
     */
    public function testUpdateUserFullNameObject()
    {
        //Create array
        $object = new stdClass();
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 2';
        $input['fullname'] = $object;
        $input['email'] = "levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Email is Object
     */
    public function testUpdateUserEmailObject()
    {
        //Create array
        $object = new stdClass();
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 2';
        $input['fullname'] = "This is of user 2";
        $input['email'] = $object;
        $input['type'] = 1;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Type is Object
     */
    public function testUpdateUserTypeObject()
    {
        //Create array
        $object = new stdClass();
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 2';
        $input['fullname'] = "This is of user 2";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = $object;
        $input['password'] = '12345';

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    /**
     * Test get type user right
     * Password is Object
     */
    public function testUpdateUserPassObject()
    {
        //Create array
        $object = new stdClass();
        $user = new UserModel();
        $input = [];
        $input['id'] = 11;
        $input['name'] = 'User 2';
        $input['fullname'] = "This is of user 2";
        $input['email'] = "Levanlam@gmail.com";
        $input['type'] = 1;
        $input['password'] = $object;

        $actual = $user->updateUser($input);

        // var_dump($actual);die();
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }

    /**
     * Test func deleteUserById
     * Test right
     */

    public function testDeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $id = 3;
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Id not exist
     */

    public function testDeleteUserByIdNotExist()
    {
        $userModel = new UserModel();
        $id = 1;
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Id is null
     */

    public function testDeleteUserByIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Id is string
     */

    public function testDeleteUserByIdString()
    {
        $userModel = new UserModel();
        $id = 'string';
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Id is float
     */

    public function testDeleteUserByIdFloat()
    {
        $userModel = new UserModel();
        $id = 1.5;
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Id is array
     */

    public function testDeleteUserByIdArray()
    {
        $userModel = new UserModel();
        $id = ['string'];
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Id is object
     */

    public function testDeleteUserByIdObject()
    {
        $userModel = new UserModel();
        $id = new stdClass();
        $token = $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Token worng
     */

    public function testDeleteUserByTokenNg()
    {
        $userModel = new UserModel();
        $id = new stdClass();
        $token = "45821nkv02935d$!@";
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Token int
     */

    public function testDeleteUserByTokenInt()
    {
        $userModel = new UserModel();
        $id = 2;
        $token = (int) $userModel->createToken();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Token is null
     */

    public function testDeleteUserByTokenNull()
    {
        $userModel = new UserModel();
        $id = 2;
        $token = null;
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Token is array
     */

    public function testDeleteUserByTokenArray()
    {
        $userModel = new UserModel();
        $id = 2;
        $token = [1,'43'];
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test func deleteUserById
     * Token is object
     */

    public function testDeleteUserByTokenObject()
    {
        $userModel = new UserModel();
        $id = 2;
        $token = new stdClass();
        $userModel->startTransaction();
        $actual = $userModel->deleteUserById($id, $token);
        $userModel->rollback();
        // $this->assertEquals($userModel->findUserById($id),$actual);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    
}
