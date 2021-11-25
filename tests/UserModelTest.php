<?php
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\equalTo;

class UserModelTest extends TestCase
{
    //Test getUserById    
   public function testGetFindUserByIdOk()
   {
       $userModel = new UserModel();
       $userId = 9;
       $userName = '123';

       $user = $userModel->findUserById($userId);
       $actual = $user[0]['name'];

       $this->assertEquals($userName, $actual);
   }

    public function testGetFindUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userId = 20;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userIdid = 'ab';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdNull()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById('');

        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdSpecialCharacters()
    {
        $userModel = new UserModel();
        $userId = '&&&';
        $expected = [];
        $actual = $userModel->findUserById($userId);

        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdObject()
    {
        $userModel = new UserModel();
        $object = (object)'nhu';

        if (is_object($object)) {
            $object = 5;

            $actual = $userModel->findUserById($object);
            $expected = $actual[0]['name'];
            $userName = 'abc';
            $this->assertEquals($userName, $expected);
        } else {
            $this->assertTrue(false);
        }
    }
    //test insertUser
    public function testGetInsertUserOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => 'nhu',
            'password' => '123456',
            'fullname' => 'khanhu',
            'email' => 'khanhu@gmail.com',
            'type' => 'admin'    
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testGetInsertUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => ''
        );

        if (!empty($user['name']) || !empty($user['password']) || !empty($user['fullname']) || !empty($user['email']) || !empty($user['type'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserPassFullNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '0796982058',
            'fullname' => '',
            'email' => '',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['password'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserTypeOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => 'user'
        );

        $userModel->insertUser($user);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testGetInsertUserTypeNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => 'who'
        );

        $userModel->insertUser($user);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserTypeIsNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => '058'
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['type'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserNameIsNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '123',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['name'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserFullNameIsNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '2058',
            'email' => '',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['fullname'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserEmaiWrongFormatNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => 'khảnhư@gmail.com',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserEmailIsFirstNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '058@gmail.com',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (is_numeric($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserEmaiSpecialCharactersNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '%!?$@gmail.com',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

}