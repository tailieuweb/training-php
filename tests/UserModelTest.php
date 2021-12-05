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
    // public function testAuthOk()
    // {
    //     $factory = new FactoryPattern();
    //     $userModel = $factory->make("user");
    //     $username = "test2";
    //     $password = "123";

    //     $expected = [
    //         "id" => "2",
    //         "name" => "test2",
    //         "fullname" => "",
    //         "email" => "",
    //         "type" => "",
    //         "password" => "202cb962ac59075b964b07152d234b70"
    //     ];

    //     $actual = $userModel->auth($username, $password);
    //     $this->assertEquals(
    //         $expected,
    //         $actual[0],
    //         "Expected and actual not equals"
    //     );
    //     $userModel->rollback();
    // }
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
    public function testInsertUserIdArrayListOk()
    {
        $userModel = new UserModel();
        // $userModel->startTransaction();
        $user = array(
            'name' => ['nhu', 'cute'],
            'password' => 'khanhu',
            'fullname' => 'lethihuynhnhu',
            'email' => 'khanhu26@gmail.com',
            'type' => 'user'
        );
        //Execute test
        try {
            $userModel->insertUser($user);
            $this->assertTrue(true,"not found");
        } catch (Throwable $e) {
            $this->assertTrue(false,"not found");

        }
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
    public function testGetdeleteUserByIdEmpty()
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
        $expected = $userModel->deleteUserById($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id là kí tự */
    public function testGetdeleteUserByIdCharacters()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = "a";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
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
        $key = $userModel->deleteUserById($id);
        if ($key != false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    /*Kiểm tra trường hợp truyền vào id kiểu số thực*/
    public function testGetdeleteUserByIdIsRealNumberNotG()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = 9.8;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
        $userModel->rollback();
    }
    /*Kiểm tra trường hợp truyền id là kí tự đặt biệt*/
    public function testGetdeleteUserByIdIsSpecialCharactersNotG()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $id = '@#$%';
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
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
    /*Kiểm tra trường hợp truyền name null*/
    public function testGetUpdateUserNameNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 5;
        $input['name'] = null;
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == false) {
              $this->assertTrue(false);
        }
          $this->assertTrue(true, "Update name not ok");
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền password null*/
    public function testGetUpdateUserPasswordNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 5;
        $input['name'] = "khanhu";
        $input['password'] = null;
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == false) {
              $this->assertTrue(false);
        }
          $this->assertTrue(true, "Update password not ok");
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền id null*/
    public function testGetUpdateUserIdNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = null;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        // var_dump($actual);die();

        if ($actual == false) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Unable to update");
        }
         
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền fullname null*/
    public function testGetUpdateUserFullNameNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = null;
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        // var_dump($actual);die();

        if ($actual == true) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Update fullname not ok");
        }
        
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền email null*/
    public function testGetUpdateUserEmailNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = null;
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        // var_dump($actual);die();

        if ($actual == true) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Update email not ok");
        }
        
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền type null*/
    public function testGetUpdateUserTypeNull()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = null;
        $actual = $user->updateUser($input);
        if ($actual == true) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Update type not ok");
        }
         
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền password là object*/
    public function testGetUpdateUserPasswordObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = $user;
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền type là object*/
    public function testGetUpdateUserTypeObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = $user;

        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền email là object*/
    public function testGetUpdateUserEmailObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = $user;
        $input['type'] = "user";
        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền fullname là object*/
    public function testGetUpdateUserFullNameObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = $user;
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền name là object*/
    public function testGetUpdateUserNameObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = 9;
        $input['name'] = $user;
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /*Kiểm tra trường hợp truyền id là object*/
    public function testGetUpdateUserIdObject()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input['id'] = $user;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
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
    /*Kiểm tra trường hợp truyền FullName là số*/
    public function testGetUpdateUserFullNameNumber()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = 111;
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == true) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false, "Update Fullname Subtring not ok");
        }
         
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào email là số */
    public function testGetUpdateUserEmailNumber()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = 113;
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        $expected = true;
        if ($actual == $expected) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
       
        $user->rollback();
    }
    public function testGetUpdateUserTypeNumber()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = 113;
        $input['type'] = 5;
        $actual = $user->updateUser($input);

        $expected = true;
        if ($actual == $expected) {
              $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
         
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào id là mảng */
    public function testGetUpdateUserIdArr()
    {
        $array_id = ['5', '8'];
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = $array_id;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";

        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào Name là mảng */
    public function testGetUpdateUserNameArr()
    {
        $array_name = ['5', '8'];
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = $array_name;
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";

        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào fullname là mảng */
    public function testGetUpdateUserFullNameArr()
    {
        $array_fullname = ['5', '8'];
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = $array_fullname;
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";

        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào email là mảng */
    public function testGetUpdateUserEmailArr()
    {
        $array_email = ['5', '8'];
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = $array_email;
        $input['type'] = "user";

        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $user->rollback();
    }
    /* Kiểm tra trường hợp truyền vào type là mảng */
    public function testGetUpdateUserTypeArr()
    {
        $array_type = ['5', '8'];
        $user = new UserModel();
        $user->startTransaction();
        $input = [];
        $input['id'] = 3;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "huynhnhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = $array_type;
        try {
            $user->updateUser($input);
        } catch (Throwable $e) {
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
        $countAr = 0;
        $actual = $userModel->getUsers();

        $this->assertEquals($countAr, count($actual));
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp keyword nhập đúng và lấy đúng theo số lượng */
    public function testGetUsersByKeyWordOk()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $params = [];
        $params['keyword'] = 'test2';
        $countAr =13;
        $actual = $userModel->getUsers($params);
        // var_dump($actual);die();
        $this->assertEquals($countAr, count($actual));
        $userModel->rollback();
    }
    /* Kiểm tra trường hợp truyền vào keyword là đối tượng */
    public function testgetUsersObjectOk()
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
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
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
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
        $userModel->rollback();
    }
}
  

