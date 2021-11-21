<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\equalTo;
use PhpParser\ErrorHandler\Throwing;

require './models/BankModel.php';

class UserModelTest extends TestCase
{
    //test testFindUserById      - hung
    public function testFindUserByIdOk()
    { 
        $userModel = new UserModel();
        $userId = 14;
        $userName = 'abc';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    public function testFindUserByIdNotFound()
    {
        $userModel = new UserModel();
        $userId = 10;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userIdid = 'asdf';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById('');

        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdSpecialCharacters()
    {
        $userModel = new UserModel();
        $userId = '@@@';
        $expected = [];
        $actual = $userModel->findUserById($userId);

        $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();
        $object = (object)'123';

        if (is_object($object)) {
            $object = 14;

            $actual = $userModel->findUserById($object);
            $expected = $actual[0]['name'];
            $userName = 'abc';
            $this->assertEquals($userName, $expected);
        } else {
            $this->assertTrue(false);
        }
    }

    // //test getUser
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => 'abc',
            'fullname' => 'vitcon',
            'type' => 'admin',
            'email' => 'hhhhh@gmail.com',
            'password' => '123456'
        );
        $actual = $userModel->insertUser($user,$bankModel);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testInsertUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => ''
        );

        if (!empty($user['name']) || !empty($user['fullname']) || !empty($user['type']) || !empty($user['email']) || !empty($user['password'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testInsertUserTypeOk()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => 'admin',
            'email' => '',
            'password' => "123"
        );

        $userModel->insertUser($user,$bankModel);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testInsertUserTypeNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => 'abc',
            'email' => '',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserTypeIsNumberNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '123',
            'email' => '',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if (!is_numeric($user['type'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserNameIsNumberNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '123',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if (!is_numeric($user['name'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserFullNameIsNumberNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '12345',
            'type' => '',
            'email' => '',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if (!is_numeric($user['fullname'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserEmaiWrongFormatNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => 'đê@gmail.com',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserEmailIsNumberNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '123@gmail.com',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if (is_numeric($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserEmaiSpecialCharactersNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '$\/*s@gmail.com',
            'password' => '123'
        );

        $userModel->insertUser($user,$bankModel);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testInsertUserPassFullNumberNotG()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => '123456789'
        );

        $userModel->insertUser($user,$bankModel);

        if (!is_numeric($user['password'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    // //test Make

    public function testFactoryPatternMakeUser()
    {
        $factory = new FactoryPattern();

        $expected = new UserModel();
        $actual = $factory->make('user');

        $this->assertEquals($expected, $actual);
    }

    public function testFactoryPatternMakeBank()
    {
        $factory = new FactoryPattern();

        $expected = new BankModel();
        $actual = $factory->make('bank');

        $this->assertEquals($expected, $actual);
    }

    public function testFactoryPatternMakeNull()
    {
        $factory = new FactoryPattern();
        $expected = new UserModel();

        $actual = $factory->make('');

        if ($actual == null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    
    /* ===================== Test user & password đúng ===================*/
    //truong
    public function testauthOK()
    {
        $userModel = new UserModel();
        $user = "admin";
        $pass = "123456";

        $actual =  $userModel->auth($user, $pass);

        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* ==================== Test user & password sai ========================*/
    public function testauthNotOK()
    {
        //Test trường hợp người dùng nhập sai user & password
        $userModel = new UserModel();
        $user = "adminas";
        $pass = "123814";

        $excute = []; // kết quả mong đợi sẽ trả về mảng rỗng

        $actual =  $userModel->auth($user, $pass);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test User rỗng & Password đúng ========================*/
    public function testauthFieldsUserNull()
    {
        $userModel = new UserModel();
        $user = "";
        $pass = "123456";
        $excute = "Required User";

        $actual =  $userModel->auth($user, $pass);
        if ($actual == []) {
            $actual = "Required User";
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test User đúng & Password rỗng ========================*/
    public function testauthFieldsPasswordNull()
    {
        $userModel = new UserModel();
        $user = "admin";
        $pass = "";
        $excute = "Required Password";

        $actual =  $userModel->auth($user, $pass);
        if ($actual == []) {
            $actual = "Required Password";
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test User rỗng & Password rỗng ========================*/
    public function testauthUserPassEmpty()
    {
        //Test trường hợp người dùng không nhập gì cả
        $userModel = new UserModel();
        $user = "";
        $password = "";

        $excute = []; // kết quả mong đợi sẽ trả về mảng rỗng

        $actual =  $userModel->auth($user, $password);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test User & Password là kiểu số ========================*/
    public function testauthUserPasswordIsIntegerNotOK()
    {
        $userModel = new UserModel();
        $user = 12;
        $pass = 12;
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }

    /* ==================== Test User & Password là kiểu mảng ========================*/
    public function testauthUserPasswordIsArrayNotOK()
    {
        $userModel = new UserModel();
        $user = ["admin"];
        $pass = ["12345"];
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }

    /* ==================== Test User & Password là kiểu object ========================*/
    public function testauthUserPasswordIsObjectNotOK()
    {
        $userModel = new UserModel();
        $user = new UserModel();
        $pass =  new UserModel();
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }

    /* ==================== Test User & Password là kiểu boolean ========================*/
    public function testauthUserPasswordIsBooleanNotOK()
    {
        $userModel = new UserModel();
        $user = true;
        $pass =  true;
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }

    /* ==================== Test User & Password là kiểu kí tự đặc biệt ========================*/
    public function testauthUserPasswordIsSpecialCharactersNotOK()
    {
        $userModel = new UserModel();
        $user = '@#$';
        $pass =  '!$%';
        $expected = [];
        $actual = $userModel->auth($user, $pass);
        $this->assertEquals($expected, $actual);
    }

    /* ==================== Test Delete id truyền vào đúng ========================*/
    public function testdeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = 3;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Delete id truyền vào sai ========================*/
    public function testdeleteUserByIdNotOK()
    {
        $userModel = new UserModel();
        $id = '12ss';

        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* ==================== Test Delete id rỗng ========================*/
    public function testdeleteUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = null;

        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* ==================== Test Delete id không tồn tại trong database =====================*/
    public function testdeleteUserByIdDoseNotExist()
    {
        $userModel = new UserModel();
        $id = 50;
        $excute = true;
        $key = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);

        if ($key == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
    }

    /* ==================== Test Delete id là kiểu chuỗi sai ========================*/
    public function testdeleteUserByIdIsStringNotOK()
    {
        $userModel = new UserModel();
        $id = "26adgs";

        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Delete id là kiểu mảng ========================*/
    public function testdeleteUserByIdIsArrayNotOK()
    {
        $userModel = new UserModel();
        $id = ["40"];
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Delete id là kiểu Object ========================*/
    public function testdeleteUserByIdIsObjectNotOK()
    {
        $userModel = new UserModel();
        $id = $userModel;
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Delete id là kiểu boolean ========================*/
    public function testdeleteUserByIdIsBooleanNotOK()
    {
        $userModel = new UserModel();
        $id = true;
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Delete id là kiểu số thực ========================*/
    public function testdeleteUserByIdIsFloatNotOK()
    {
        $userModel = new UserModel();
        $id = 12.5;
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Delete id là kiểu số thực ========================*/
    public function testdeleteUserByIdIsSpecialCharactersNotOK()
    {
        $userModel = new UserModel();
        $id = '&^#@';
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user OK ========================*/
    public function testDecoratorPatternInsertUserOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        $excute = true;

        $actual = $userModel->insertUser($user, $bankModel);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user Not OK ========================*/
    public function testDecoratorPatternInsertUserNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser('12jas',  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền vào số nguyên ========================*/
    public function testDecoratorPatternInsertUserIntegerParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser(111,  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền vào chuỗi ========================*/
    public function testDecoratorPatternInsertUserStringParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser("sssdasad",  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền null ========================*/
    public function testDecoratorPatternInsertUserNullParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser(null,  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền vào rỗng ========================*/
    public function testDecoratorPatternInsertUserEmptyParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser("",  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền Array ========================*/
    public function testDecoratorPatternInsertUserArrayParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser(['sss'],  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền Object ========================*/
    public function testDecoratorPatternInsertUserObjectParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser(new object,  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền Boolean ========================*/
    public function testDecoratorPatternInsertUserBooleanParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser(true,  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền số thực ========================*/
    public function testDecoratorPatternInsertUserFloatParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser(14.5,  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern insert user truyền Object ========================*/
    public function testDecoratorPatternInsertUserSpecialCharactersParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $actual = null;
        $user = array(
            'name' => 'test',
            'fullname' => 'testUser',
            'type' => 'user',
            'email' => 'test@gmail.com',
            'password' => '12345'
        );
        try {
            $actual = $userModel->insertUser('@%%^%',  $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user OK ========================*/
    public function testDecoratorPatternUpdateUserOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        $excute = true;
        $actual = $userModel->updateUser($user, $bankModel);
        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user Not OK ========================*/
    public function testDecoratorPatternUpdateUserNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser('23s', $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào số nguyên ========================*/
    public function testDecoratorPatternUpdateUserIntegerParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser(111, $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào chuỗi ========================*/
    public function testDecoratorPatternUpdateUserStringParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser("abcdef", $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào null ========================*/
    public function testDecoratorPatternUpdateUserNullParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser(null, $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào rỗng ========================*/
    public function testDecoratorPatternUpdateUserEmptyParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser("", $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào mảng ========================*/
    public function testDecoratorPatternUpdateUserArrayParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser(["a"], $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào Object ========================*/
    public function testDecoratorPatternUpdateUserObjectParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser(new object, $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào Boolean ========================*/
    public function testDecoratorPatternUpdateUserBooleanParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser(true, $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào số thực ========================*/
    public function testDecoratorPatternUpdateUserFloatParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser(1.4, $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* ==================== Test Decorator pattern Update user truyền vào kí tự đặc biệt ========================*/
    public function testDecoratorPatternUpdateUserSpecialCharactersParamNotOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $temp = $userModel->findUserById(2);
        $actual = null;
        $keyCode = "aomU87239dadasdasd";
        $user = array(
            'id' => 2,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'fullname' => 'testUser',
            'password' => '12345',
            'type' => 'user',
            'version' => base64_encode($keyCode . $temp[0]['version']),
        );
        try {
            $actual = $userModel->updateUser('@#$%', $bankModel);
        } catch (Throwable $e) {
            $excute = false;
        }

        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi không có dữ liệu truyền vào  OK ========================= */
    public function testgetUsersNotParamOK()
    {
        $userModel = new UserModel();

        $actual = $userModel->getUsers();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }


    /* =================== Test hàm getUser khi không có dữ liệu truyền vào Not OK ========================= */
    public function testgetUsersNotParamNotOK()
    {
        $userModel = new UserModel;
        $actual = null;
        try {
            $actual = $userModel->getUsers()();
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào  OK ========================= */
    public function testgetUsersParamOK()
    {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => 'admin'
        );
        $actual = $userModel->getUsers($keyword);
        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền là chuỗi rỗng vào OK ========================= */
    public function testgetUsersParamIsStringEmptyOK()
    {
        $userModel = new UserModel();

        $keyword = array(
            'keyword' => "",
        );
        $actual = $userModel->getUsers($keyword);

        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền là chuỗi rỗng vào OK ========================= */
    public function testgetUsersParamIsNullOK()
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

    /* =================== Test hàm getUser khi có dữ liệu truyền vào Not OK ========================= */
    public function testgetUsersParamNotOK()
    {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => 'admin',
            'keyword' => 'user'
        );
        $actual = $userModel->getUsers($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là kiểu số nguyên ========================= */
    public function testgetUsersParamIsIntegerNotOK()
    {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => 1000,
        );
        $actual = $userModel->getUsers($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là kiểu số thực ========================= */
    public function testgetUsersParamIsFloatNotOK()
    {
        $userModel = new UserModel();
        $keyword = array(
            'keyword' => 1.4,
        );
        $actual = $userModel->getUsers($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là Array ========================= */
    public function testgetUsersParamIsArrayNotOK()
    {
        $userModel = new UserModel();
        $actual = null;

        $keyword = array(
            'keyword' => ['ad'],
        );
        try {
            $actual = $userModel->getUsers($keyword);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là kiểu đối tượng ========================= */
    public function testgetUsersParamIsObjectNotOK()
    {
        $userModel = new UserModel();
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
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là kiểu kí tự đặc biệt ========================= */
    public function testgetUsersParamIsSpecialCharactersNotOK()
    {
        $userModel = new UserModel();
        $actual = null;

        $keyword = array(
            'keyword' => '@@$%$%',
        );
        $actual = $userModel->getUsers($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là câu truy vấn ========================= */
    public function testgetUsersParamIsSqlInjectionNotOK()
    {
        $userModel = new UserModel();
        $actual = null;

        $keyword = array(
            'keyword' => 'select * from users',
        );
        $actual = $userModel->getUsers($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }

    /* =================== Test hàm getUser khi có dữ liệu truyền vào là câu truy vấn ========================= */
    public function testgetUsersParamIsJavascriptNotOK()
    {
        $userModel = new UserModel();
        $actual = null;

        $keyword = array(
            'keyword' => '<script>alert("Hello world")</script>',
        );
        $actual = $userModel->getUsers($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
    }
}
