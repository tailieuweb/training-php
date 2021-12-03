<?php

use phpDocumentor\Reflection\Types\Null_;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test insertUser function, 'Dattt' do this 
     * */
    // Test case Insert User Good 

    public function testInsertUserGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Not Good 

    public function testInsertUserNg()
    {
        $userModel = new UserModel();
        $input = 123;

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Email Already Exists

    public function testInsertUserEmailAlreadyExists()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Is String

    public function testInsertUserInputIsString()
    {
        $userModel = new UserModel();

        $input = "129381fbsfd";

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Is Bool

    public function testInsertUserInputIsBool()
    {
        $userModel = new UserModel();

        $input = true;

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Insert User Input Is Null

    public function testInsertUserInputIsNull()
    {
        $userModel = new UserModel();

        $input = "";

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Is Special

    public function testInsertUserInputIsSpecial()
    {
        $userModel = new UserModel();

        $input = "%$%#$&^$&*^%";

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Insert User Input Name Is Null
    public function testInsertUserInputNameIsNull()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => '',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Name Is Bool
    public function testInsertUserInputNameIsBool()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => true,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Name Is Number
    public function testInsertUserInputNameIsNumber()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 123,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Name Is Object
    public function testInsertUserInputNameIsObject()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $name = [
            "name" => "dattt"
        ];
        $input = [
            'name' => $name,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Input Name Is Special
    public function testInsertUserInputNameIsSpecial()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';

        $input = [
            'name' => "18923871",
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    ///////////////////////////////     FULLNAME             //////////////////////////////
    // Test case Insert User Input Full Name Is Null
    public function testInsertUserInputFullNameIsNull()
    {
        $userModel = new UserModel();
        $fullname = "";
        $input = [
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Full Name Is Bool
    public function testInsertUserInputFullNameIsBool()
    {
        $userModel = new UserModel();
        $fullname = true;
        $input = [
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Full Name Is Number
    public function testInsertUserInputFullNameIsNumber()
    {
        $userModel = new UserModel();
        $fullname = 123;
        $input = [
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Full Name Is Object
    public function testInsertUserInputFullNameIsObject()
    {
        $userModel = new UserModel();
        $fullname = [
            "fullname" => "Vo Thanh Dat"
        ];
        $input = [
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Full Name Is Special
    public function testInsertUserInputFullNameIsSpecial()
    {
        $userModel = new UserModel();
        $fullname = "&^!@#%$!*@&^(";
        $input = [
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    ///////////////////////////////     TYPE             //////////////////////////////


    // Test case Insert User Type Is Null
    public function testInsertUserInputTypeIsNull()
    {
        $userModel = new UserModel();
        $type = '';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Type Is Bool
    public function testInsertUserInputTypeIsBool()
    {
        $userModel = new UserModel();
        $type = true;
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Type Is Number
    public function testInsertUserInputTypeIsNumber()
    {
        $userModel = new UserModel();
        $type = 123;
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Type Is Object
    public function testInsertUserInputTypeIsObject()
    {
        $userModel = new UserModel();
        $type = [
            "type" => "admin"
        ];
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Type Is Special
    public function testInsertUserInputTypeIsSpecial()
    {
        $userModel = new UserModel();
        $type = '*!%*&@%*&';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Type Not Admin Or User
    public function testInsertUserInputTypeNotAdminOrUser()
    {
        $userModel = new UserModel();
        $type = "bagaga";
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    ///////////////////////////////     EMAIl             //////////////////////////////

    // Test case Insert User Input Email Is Null
    public function testInsertUserInputEmailIsNull()
    {
        $userModel = new UserModel();
        $email = '';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Email Is Bool
    public function testInsertUserInputEmailIsBool()
    {
        $userModel = new UserModel();
        $email = true;
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Email Is Number
    public function testInsertUserInputEmailIsNumber()
    {
        $userModel = new UserModel();
        $email = 1234;
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Email Is Object
    public function testInsertUserInputEmailIsObject()
    {
        $userModel = new UserModel();
        $email = [
            "email" => "vothanhdat@gmail.com"
        ];
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Email Is Special
    public function testInsertUserInputEmailIsSpecial()
    {
        $userModel = new UserModel();
        $email = '(*^*^&$';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Email Stye
    public function testInsertUserInputEmailStyle()
    {
        $userModel = new UserModel();
        $email = 'jjkjhgfbkrggeo.comnm';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    ///////////////////////////////     PASSWORD             //////////////////////////////

    // Test case Insert User Input Password Is Null
    public function testInsertUserInputPasswordIsNull()
    {
        $userModel = new UserModel();
        $password = "";
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Password Is Bool
    public function testInsertUserInputPasswordIsBool()
    {
        $userModel = new UserModel();
        $password = true;
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Password Is Number
    public function testInsertUserInputPasswordIsNumber()
    {
        $userModel = new UserModel();
        $password = 123;
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Password Is Object
    public function testInsertUserInputPasswordIsObject()
    {
        $userModel = new UserModel();
        $password = [
            "password" => "123kjabdjka"
        ];
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User Password Is Special
    public function testInsertUserInputPasswordIsSpecial()
    {
        $userModel = new UserModel();
        $password = "&^$&^*&^*#";
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];
        $userModel->startTransaction();
        $actual = $userModel->insertUser($input);

        $userModel->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test checkEmailExist function, 'Dattt' do this 
     * */

    // Test case Check Email Exist Good 

    public function testCheckEmailExistGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->checkEmailExist($email);
        $userModel->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Exist Not Good 

    public function testCheckEmailExistNg()
    {
        $userModel = new UserModel();
        $email = 'testcheckEemailexistng@gmail.com';

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Exist Not String

    public function testCheckEmailExistNotString()
    {
        $userModel = new UserModel();
        $email = 123;

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Check Email Exist is Object

    public function testCheckEmailExistIsObject()
    {
        $userModel = new UserModel();
        $email = [
            "email" => "abc@gmail.com"
        ];

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Exist is Bool

    public function testCheckEmailExistIsBool()
    {
        $userModel = new UserModel();
        $email = true;

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Exist is Null

    public function testCheckEmailExistIsNull()
    {
        $userModel = new UserModel();
        $email = "";

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Exist is Special

    public function testCheckEmailExistIsSpecial()
    {
        $userModel = new UserModel();
        $email = "!@@$%^!%$@^";

        $actual = $userModel->checkEmailExist($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test checkEmailStyle function, 'Dattt' do this 
     * */

    // Test case Check Email Style Good 

    public function testCheckEmailStyleGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';

        $actual = $userModel->checkEmailStyle($email);


        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style Not Good 

    public function testCheckEmailStyleNg()
    {
        $userModel = new UserModel();
        $email = 'testcheckEemailexistng@gmail.com123';

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style Not String

    public function testCheckEmailStyleNotString()
    {
        $userModel = new UserModel();
        $email = 123;

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Check Email Style is Object

    public function testCheckEmailStyleIsObject()
    {
        $userModel = new UserModel();
        $email = [
            "email" => "abc@gmail.com"
        ];

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Check Email Style is Bool

    public function testCheckEmailStyleIsBool()
    {
        $userModel = new UserModel();
        $email = true;

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Style is Null

    public function testCheckEmailStyleIsNull()
    {
        $userModel = new UserModel();
        $email = "";

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Check Email Style is Special

    public function testCheckEmailStyleIsSpecial()
    {
        $userModel = new UserModel();
        $email = "!@@$%^!%$@^";

        $actual = $userModel->checkEmailStyle($email);

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /**
     * Test findUserByEmail function, 'Dattt' do this 
     * */

    // Test case Find User By Email Good 

    public function testFindUserByEmailGood()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail($email);
        $userModel->rollBack();

        $expected = $email;
        $this->assertEquals($expected, $actual['email']);
    }

    // Test case Find User By Email Not Good 

    public function testFindUserByEmailNg()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $emailFail = 'vothanhdat@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail($emailFail);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Find User By Email Is Number
    public function testFindUserByEmailIsNumber()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail(123);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Object
    public function testFindUserByEmailIsObject()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $object = [
            'email' => "vothanhdat123123@gmail.com",
        ];
        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail($object);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Bool
    public function testFindUserByEmailIsBool()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail(true);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Null
    public function testFindUserByEmailIsNull()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail(null);
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Find User By Email Is Special
    public function testFindUserByEmailIsSpecial()
    {
        $userModel = new UserModel();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userModel->startTransaction();
        $userModel->insertUser($input);
        $actual = $userModel->findUserByEmail("!@^$!@^%");
        $userModel->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Test sum function in User Model, all member do this 
     * */
    // Test case Sum Positive Number
    public function testSumPositiveNumber()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Negative Number
    public function testSumNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -3;
        $b = -2;
        $expected = -5;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum a Positive and a Negative Number
    public function testSumPosiAndNegaNumber()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Float Positive Number
    public function testSumFloatPositiveNumber()
    {
        $userModel = new UserModel();
        $a = 1.3;
        $b = 2.4;
        $expected = 3.7;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Negative Number
    public function testSumFloatNegativeNumber()
    {
        $userModel = new UserModel();
        $a = -2.4;
        $b = -3.5;
        $expected = -5.9;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum a Positive and a Negative Number
    public function testSumFloatPosiAndNegaNumber()
    {
        $userModel = new UserModel();
        $a = -1.3;
        $b = 2.4;
        $expected = 1.1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum Number and String
    public function testSumNumberAndString()
    {
        $userModel = new UserModel();
        $a = 'abc';
        $b = 2.4;
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Sum String and String
    public function testSumStringAndString()
    {
        $userModel = new UserModel();
        $a = 'abc';
        $b = 'xyz';
        $expected = 'error';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    // Test case Not good
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
     * Test DeleteUserById Function in UserModel - 'Danh' do this
     */
    // Test case testDeleteUserById
    public function testDeleteUserByIdOK()
    {
        $userModel = new UserModel();
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $check = $userModel->deleteUserById($id);
        $findUser = $userModel->findUserById($id);
        if (
            $check == true &&
            $findUser == false
        ) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByNg
    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $id = "a";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserNotId
    public function testDeleteUserNotId()
    {
        $userModel = new UserModel();
        $id = "";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserBool
    public function testDeleteUserBool()
    {
        $userModel = new UserModel();
        $id = true;
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserObject
    public function testDeleteUserObject()
    {
        $userModel = new UserModel();
        $id = new UserModel;
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserExpectedandActual
    public function testDeleteUserExpectedandActual()
    {
        $userModel = new UserModel();
        $id = -1;
        $expected = $userModel->deleteUserById($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test getUser Function in UserModel - 'Danh' do this
     */
    // Test case testGetUsers
    public function testGetUsersOk()
    {
        $userModel = new UserModel;
        $id = -1;
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers();
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->deleteUserById($id);
    }
    // Test case testGetUsersByKey
    public function testGetUsersByKey()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => 'Danh'
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByNumber
    public function testGetUsersByNumber()
    {

        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => '1'
        ];
        $userModel->insertUserWithId($id, 'Danh1', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByKeySpecial 
    public function testGetUsersByKeySpecial()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => '#%$%#$'
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testGetUsersByKeyNull
    public function testGetUsersByKeyNull()
    {
        $userModel = new UserModel;
        $id = -1;
        $params = [
            "keyword" => ''
        ];
        $userModel->insertUserWithId($id, 'Danh', 'Nguyen Khac Danh', 'nguyenkhacdanh@gmail.com', 'guest', '12345');
        $users = $userModel->getUsers($params);
        $check = count($users) > 0;
        $userModel->deleteUserById($id);
        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}