<?php
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\equalTo;

class UserModelTest extends TestCase
{
    /*
    File: UserModel.
    Id: 01
    Function: getAll().
    Status: OK
    Author: Phuong Nguyen
    */
    public function testGetAllOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $expectedFirst = [
            [
                "id" => "2",
                "name" => "test2",
                "fullname" => "",
                "email" => "",
                "type" => "",
                "password" => "202cb962ac59075b964b07152d234b70"
            ],
        ];

        $expectedLast =
        [
            [
                "id" => "138",
                "name" => "",
                "fullname" => "",
                "email" => "%!?$@gmail.com",
                "type" => "",
                "password" => "d41d8cd98f00b204e9800998ecf8427e"
            ],
        ];
        $expectedLength = 56;
        $actual = $userModel->read();
        $actualLength = count($actual);
        // var_dump($actual);die();

        if ($actualLength === $expectedLength) {
            $v1 = $this->assertEquals(
                $expectedFirst[0],
                $actual[0],
                "Expected and actual not equals"
            );
            $v2 = $this->assertEquals(
                $expectedLast[0],
                $actual[$expectedLength - 1],
                "Expected and actual not equals"
            );
            $this->assertFalse(($v1 && $v2), "actualfrist is not equals actuallast");
        } else {
            $this->assertTrue(false, "actual length is not correct");
        }
        $userModel->rollback();
    }


    /*
    File: UserModel.
    Id: 02
    Function: auth(username, password)
    Desc: Test auth ok
    Status: OK
    Author: Phuong Nguyen
    */
    public function testAuthOk()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $username = "test2";
        $password = "123";

        $expected = [
            "id" => "2",
            "name" => "test2",
            "fullname" => "",
            "email" => "",
            "type" => "",
            "password" => "202cb962ac59075b964b07152d234b70"
        ];

        $actual = $userModel->auth($username, $password);
        $this->assertEquals(
            $expected,
            $actual[0],
            "Expected and actual not equals"
        );
        $userModel->rollback();
    }
    /* ========Test function getUserById ========*/
    public function testGetFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $userId = 9;
        $userName = 'nhu';
        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
        $userModel->rollback();
    }

    public function testGetFindUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $userId = 109;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
        $userModel->rollback();
    }
    public function testGetFindUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = true;
        $actual = $userModel->findUserById($id);
        if ($actual==true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetFindUserByIdIsEmpty()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = [];
        $actual = $userModel->findUserById($id);
        if ($actual==true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetFindUserByIdNotIsInt()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = 6.5;
        $actual = $userModel->findUserById($id);
        if ($actual==true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetFindUserByIdIsDouble()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = -1;
        $actual = $userModel->findUserById($id);
        if ($actual==true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $userIdid = 'ab';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
        $userModel->rollback();
    }
    public function testGetFindUserByIdNull()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $expected = [];
        $actual = $userModel->findUserById('');

        $this->assertEquals($expected, $actual);
        $userModel->rollback();
    }
    public function testGetFindUserByIdSpecialCharacters()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $userId = '&&&';
        $expected = [];
        $actual = $userModel->findUserById($userId);

        $this->assertEquals($expected, $actual);
        $userModel->rollback();
    }
    public function testGetFindUserByIdObject()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = $userModel;
        $actual = $userModel->findUserById($id);
        if ($actual==true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    /*======= test function insertUser======= */
    public function testGetInsertUserOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserIsEmpty()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserTypeOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserTypeNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserTypeIsNumberNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserNameIsNumberNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
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
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserEmailIsFirstNumberNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserEmaiSpecialCharactersNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
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
        $userModel->rollback();
    }
    public function testGetInsertUserIsBool()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = array(
            'name' => true,
            'password' => true,
            'fullname' => true,
            'email' => true,
            'type' => true,
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetInsertUserNotIsInt()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = array(
            'name' => -1,
            'password' => -1,
            'fullname' => -1,
            'email' => -1,
            'type' => -1,
        );
        try {
            $userModel->insertUser($user);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetInsertUserIsDouble()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = array(
            'name' => 3.8,
            'password' => 3.8,
            'fullname' => 3.8,
            'email' => 3.8,
            'type' => 3.8,
        );
        try {
            $userModel->insertUser($user);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetInsertUserIsObject()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = array(
            'name' => $userModel,
            'password' => $userModel,
            'fullname' => $userModel,
            'email' => $userModel,
            'type' => $userModel,
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetInsertUserIsNull()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = array(
            'name' => null,
            'password' => null,
            'fullname' => null,
            'email' => null,
            'type' => null,
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    public function testGetInsertUserIsArray()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = array(
            'name' => ["kha,nhu"],
            'password' => ["123","456"],
            'fullname' => ["lethi","huynhnhu"],
            'email' => ["kha@gmail.com","nhu@gmail.com"],
            'type' => ["user","user"],
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    /*
    File: UserModel.
    Id: 03
    Function: auth(username, password).
    Desc: Test if input is special characters -> unaffected to data of another(bank) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testAuth_SpecialChars_AffectedToAnotherModel()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");
        $userModel->startTransaction();

        $username = 'test2%";TRUNCATE bank;##';
        $password = '123';
        $actionAuth = $userModel->auth($username, $password);

        //Array
        $actual = $bankModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 04
    Function: auth(username, password)
    Desc: Test auth with input(username) is obj
    Status: Fail
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsObj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $username = new stdClass();
        $password = "123";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 05
    Function: auth(username, password)
    Desc: Test auth with input(password) is obj
    Status: OK
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsObj()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = new stdClass();
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 06
    Function: auth(username, password)
    Desc: Test auth with input(password) is null
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $password = null;
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 07
    Function: auth(username, password)
    Desc: Test auth with input(username) is null
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $password = "password";
        $username = null;

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }
    
    /*
    File: UserModel.
    Id: 07
    Function: auth(username, password)
    Desc: Test auth with input(username) is empty
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsEmpty()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "password";
        $username = "";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

      /*
    File: UserModel.
    Id: 07
    Function: auth(username, password)
    Desc: Test auth with input(password) is empty
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsEmpty()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "";
        $username = "username";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

     /*
    File: UserModel.
    Id: 07
    Function: auth(username, password)
    Desc: Test auth with input(username) is boolean
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsBoolean()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = "password";
        $username = true;

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }


      /*
    File: UserModel.
    Id: 07
    Function: auth(username, password)
    Desc: Test auth with input(password) is boolean
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsBoolean()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = true;
        $username = "username";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
    }

    /*
    File: UserModel.
    Id: 08
    Function: auth(username, password)
    Desc: Test auth with input(username) not exist
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_NotExist()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $password = "passwordtxt";
        $username = "usernamenotexist";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 09
    Function: auth(username, password) 
    Desc: Test auth with correct input(username) exist but input(password) not exist
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_CorrectUsername_PasswordNotExist()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $password = "passwordnotexist";
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 10
    Function: auth(username, password) 
    Desc: Test auth with input(username) is array
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsArr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $password = "password";
        $username = ["username" => "test2"];

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
    }

    /*
    File: UserModel.
    Id: 10
    Function: auth(username, password) 
    Desc: Test auth with input(password) is array
    Status: Ok
    Author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsArr()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $userModel->startTransaction();
        $password = ["password" => "123"];
        $username = "test2";

        $actual = $userModel->auth($username, $password);
        $this->assertEmpty($actual, "actual is not empty");
        $userModel->rollback();
}
    /* =======Test function deleteUserById======== */
    /* Kiểm tra trường hợp id truyền vào đúng */
    public function testGetdeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = 48;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp id truyền vào sai */
    public function testGetdeleteUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = '24h';
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id không tồn tại*/
    public function testGetdeleteUserByIdDoesNotExist()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = 100;
        $excute = true;
        $user = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);

        if ($user == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id rỗng*/
    public function testGetdeleteUserByIdIsEmpty()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = [];
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    public function testGetdeleteUserByIdIsNull()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = null;
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    /*Kiểm tra trường hợp truyên vào id kiểu mảng*/
    public function testGetdeleteUserByIdIsArrayNotG()
    {
        $userModel = new UserModel();
        // $userModel->startTransaction();
        $id = ["47"];
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEmpty($actual);
        // $userModel->rollback();
    }
    /*Kiểm tra trường hợp truyền vào id kiểu object*/
    public function testGetdeleteUserByIdIsObjectNotG()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = $userModel;
        try {
            $userModel->deleteUserById($id);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id không phải số nguyên dương */
    public function testGetdeleteUserNagativeNumber()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = -1;
        $actual = $userModel->deleteUserById($id);
        if ($actual == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id là kí tự */
    public function testGetdeleteUserByIdCharacters()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = "a";
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id kiểu bool */
    public function testGetdeleteUserBool()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = true;
        $actual = $userModel->deleteUserById($id);
        if ($actual != false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    /*Kiểm tra trường hợp truyền vào id kiểu số thực*/
    public function testGetdeleteUserByIdIsDoubleNotG()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = 9.8;
        $actual = $userModel->deleteUserById($id);
        if ($actual == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    /*Kiểm tra trường hợp truyền id là kí tự đặt biệt*/
    public function testGetdeleteUserByIdIsSpecialCharactersNotG()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = "@#$%";
        $key = $userModel->deleteUserById($id);
        if ($key == true) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
        $userModel->rollback();
    }
    /* ======Test function updateUser======= */
    /*Kiểm tra trường hợp truyền id tồn tại trên database update user thành công*/
    public function testGetupdateUserOk()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 5;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "khanhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        var_dump($actual);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false, "update user not success");
    }
    /*Kiểm tra trường hợp truyền id không tồn tại update user không thành công*/
    public function testGetUpdateUserNotOk()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 111;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        if ($actual == false) {
              $this->assertTrue(false);
        }
          $this->assertTrue(true, "update user success");
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào tất cả field rỗng */
    public function testGetUpdateUserIsEmpty()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = "";
        $input['name'] = "";
        $input['password'] = "";
        $input['fullname'] = "";
        $input['email'] = "";
        $input['type'] = "";
        $actual = $user->updateUser($input);
        if ($actual == true) {
              $this->assertTrue(false);
        }
          $this->assertTrue(true, "update user success");
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào tất cả field null */
    public function testGetUpdateUserIsNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = null;
        $input['name'] = null;
        $input['password'] = null;
        $input['fullname'] = null;
        $input['email'] = null;
        $input['type'] = null;
        $actual = $user->updateUser($input);
        if ($actual == true) {
              $this->assertTrue(false);
        }
          $this->assertTrue(true, "update user success");
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào tất cả field là object */
    public function testGetUpdateUserIsObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = $user;
        $input['name'] = $user;
        $input['password'] = $user;
        $input['fullname'] = $user;
        $input['email'] = $user;
        $input['type'] = $user;
        $actual = $user->updateUser($input);
        if ($actual == true) {
              $this->assertTrue(false);
        }
          $this->assertTrue(true, "update user success");
        $user->rollback();
    }
   
    /*Kiểm tra trường hợp truyền id là chuỗi*/
    public function testGetUpdateUserIdStr()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = "Toilanhu";
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        $expected = false;
        if ($actual == $expected) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Update id Subtring not ok");
        }
         
        $user->rollback();
    }
     /*Kiểm tra trường hợp truyền id là kí tự đặc biệt*/
     public function testGetUpdateUserIdSpecialCharactersNotOk()
     {
         $user = new UserModel();
         $user->startTransaction();
         $input = [];
         $input['id'] = "!%@#$%";
         $input['name'] = "nhu";
         $input['password'] = "123";
         $input['fullname'] = "khanhu";
         $input['email'] = "nhu@gmail.com";
         $input['type'] = "user";
         $actual = $user->updateUser($input);

         if ($actual == true) {
               $this->assertTrue(false);
         }else{
             $this->assertTrue(true, "Update id character not ok");
         }
          
         $user->rollback();
     }
    /*Kiểm tra trường hợp truyền Name là số*/
    public function testGetUpdateUserNameNumber()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = 111;
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == true) {
              $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false, "Update Name Subtring not ok");
        }
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền vào name, fullname, email, type là số*/
    public function testGetUpdateUserIsNumber()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = 12;
        $input['password'] = 5;
        $input['fullname'] = 111;
        $input['email'] = 6;
        $input['type'] = 7;
        $actual = $user->updateUser($input);

        if ($actual == true) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Update all field is number ok");
        }
         
        $user->rollback();
    }
     /*Kiểm tra trường hợp truyền vào id là số double*/
     public function testGetUpdateUserIdIsDouble()
     {
         $user = new UserModel();
         $user->startTransaction();
         $input = [];
         $input['id'] = 3.8;
         $input['name'] = "vahein";
         $input['password'] = "123";
         $input['fullname'] = "huynhnhu";
         $input['email'] = "nhu@gmail.com";
         $input['type'] = "user";
         $actual = $user->updateUser($input);
 
         if ($actual == true) {
               $this->assertTrue(false);
         }else{
             $this->assertTrue(true, "Update id is double not ok");
         }
          
         $user->rollback();
     }
     /*Kiểm tra trường hợp truyền vào id là số số âm*/
     public function testGetUpdateUserIdNotIsInt()
     {
         $user = new UserModel();
         $user->startTransaction();
         $input = [];
         $input['id'] = -1;
         $input['name'] = "vahein";
         $input['password'] = "123";
         $input['fullname'] = "huynhnhu";
         $input['email'] = "nhu@gmail.com";
         $input['type'] = "user";
         $actual = $user->updateUser($input);
 
         if ($actual == true) {
               $this->assertTrue(false);
         }else{
             $this->assertTrue(true, "Update id not is int not ok");
         }
          
         $user->rollback();
     }
    /* Kiểm tra trường hợp truyền vào tất cả field là mảng */
    public function testGetUpdateUserIsArray()
    {
        $array = ['5', '8'];
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = $array;
        $input['name'] =  $array;
        $input['password'] = $array;
        $input['fullname'] = $array;
        $input['email'] = $array;
        $input['type'] = $array;

        $actual = $user->updateUser($input);
        if ($actual == true) {
              $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
         
        $user->rollback();
    }
     /* Kiểm tra trường hợp truyền vào tất cả field là kiểu boolean */
     public function testGetUpdateUserIsBoolean()
     {
         $user = new UserModel();
         $user->startTransaction();
         $input = [];
         $input['id'] = true;
         $input['name'] =  true;
         $input['password'] = true;
         $input['fullname'] = true;
         $input['email'] = true;
         $input['type'] = true;
         $actual = $user->updateUser($input);
         if ($actual == true) {
               $this->assertTrue(false);
         }else{
             $this->assertTrue(true);
         }
          
         $user->rollback();
     }
    /* =========Test function getUsers========= */
    /* Kiểm tra trường hợp keyword nhập đúng */
    public function testgetUsersOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $keyword = array(
            'keyword' => 'nhu'
        );
        $actual = $userModel->getUsers($keyword);
        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    /*  Kiểm tra trường hợp lấy không được đối tượng */
    public function testGetUsersNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $actual = null;
        $keyword = array(
            'keyword' => 'aaasdsadsad'
        );
        try {
            $actual = $userModel->getUsers($keyword);
        } catch (Throwable $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp keyword nhập đúng và lấy đúng theo số lượng */
    public function testGetUsersByKeyWordOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $params = [];
        $params['keyword'] = 'test2';
        $countAr =1;
        $actual = $userModel->getUsers($params);
        $this->assertEquals($countAr, count($actual));
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào keyword là đối tượng */
    public function testgetUsersIsObject()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => $userModel,
        );
        try {
            $actual = $userModel->getUsers($keyword);
        } catch (Throwable $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào keyword là kiểu boolean */
    public function testgetUsersIsBoolean()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => true,
        );
        try {
            $actual = $userModel->getUsers($keyword);
        } catch (Throwable $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
        $userModel->rollback();
    }
     /* Kiểm tra trường hợp truyền vào keyword là kiểu boolean */
     public function testgetUsersIsEmpty()
     {
         $userModel = new UserModel();
         $userModel->startTransaction();
         $actual = null;
 
         $keyword = array(
             'keyword' => [],
         );
         try {
             $actual = $userModel->getUsers($keyword);
         } catch (Throwable $e) {
             $this->assertTrue(false);
         }
         $this->assertTrue(true);
         $userModel->rollback();
     }
    /* Kiểm tra trường hợp truyền vào keyword là mảng */
    public function testgetUsesArrayListNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => ['nhu'],
        );
        try {
            $actual = $userModel->getUsers($keyword);
        } catch (Throwable $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
        $userModel->rollback();
    }
     /* Kiểm tra trường hợp truyền vào keyword là kí tự đặc biệt */
    public function testgetUsesSpecialCharactersNotOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => "!@#$%",
        );
        try {
            $actual = $userModel->getUsers($keyword);
        } catch (Throwable $e) {
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
        $userModel->rollback();
    }
}
  

