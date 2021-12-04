<?php

use PHPUnit\Framework\TestCase;

class VoThanhDat_UserRepositoryTest extends TestCase
{
    /**
     * Test getInstance function, 'Dattt' do this 
     * */

    // Test case getInstance Good
    public function testGetInstanceGood()
    {
        $userRepository = UserRepository::getInstance();
        $userRepository1 = UserRepository::getInstance();

        $expected = true;
        $actual = is_Array($userRepository) &&
            get_class($userRepository) == 'UserRepository' &&
            $userRepository === $userRepository1;

        $this->assertEquals($expected, $actual);
    }
    // Test case getInstance Not Good
    public function testGetInstanceNg()
    {
        $userRepository = UserRepository::getInstance();

        $expected = false;
        $actual = !is_Array($userRepository) ||
            !get_class($userRepository) == 'UserRepository';

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test insertUserWithId function, 'Dattt' do this 
     * */

    // Test case Insert User With Id Good 

    public function testInsertUserWithIdGood()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Is Number 

    public function testInsertUserWithIdInputIsNumber()
    {
        $userRepository = new UserRepository();
        $input = 123;

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);
        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Already Exists

    public function testInsertUserWithIdEmailAlreadyExists()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $userRepository->insertUserWithId($input);
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Is String

    public function testInsertUserWithIdInputIsString()
    {
        $userRepository = new UserRepository();

        $input = "129381fbsfd";

        $userRepository->startTransaction();
        $userRepository->insertUserWithId($input);
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    // Test case Insert User With Id Input Is Bool

    public function testInsertUserWithIdInputIsBool()
    {
        $userRepository = new UserRepository();

        $input = true;

        $userRepository->startTransaction();
        $userRepository->insertUserWithId($input);
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Insert User With Id Input Is Null

    public function testInsertUserWithIdInputIsNull()
    {
        $userRepository = new UserRepository();

        $input = "";

        $userRepository->startTransaction();
        $userRepository->insertUserWithId($input);
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Is Special

    public function testInsertUserWithIdInputIsSpecial()
    {
        $userRepository = new UserRepository();

        $input = "%$%#$&^$&*^%";

        $userRepository->startTransaction();
        $userRepository->insertUserWithId($input);
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    ///////////////////////////////     NAME             //////////////////////////////

    // Test case Insert User With Id Input Name Is Null
    public function testInsertUserWithIdInputNameIsNull()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'id' => 123,
            'name' => '',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Name Is Bool
    public function testInsertUserWithIdInputNameIsBool()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'id' => 123,
            'name' => true,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Name Is Number
    public function testInsertUserWithIdInputNameIsNumber()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $input = [
            'id' => 123,
            'name' => 123,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Name Is Array
    public function testInsertUserWithIdInputNameIsArray()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $name = [
            "name" => "dattt"
        ];
        $input = [
            'id' => 123,
            'name' => $name,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Input Name Is Special
    public function testInsertUserWithIdInputNameIsSpecial()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';

        $input = [
            'id' => 123,
            'name' => "*(!&@#^#(",
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    // Test case Insert User With Id Input Name Is Object
    public function testInsertUserWithIdInputNameIsObject()
    {
        $userRepository = new UserRepository();
        $email = 'vothanhdat123123@gmail.com';
        $name = new BankModel();
        $input = [
            'id' => 123,
            'name' => $name,
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    ///////////////////////////////     FULLNAME             //////////////////////////////
    // Test case Insert User With Id Input Full Name Is Null
    public function testInsertUserWithIdInputFullNameIsNull()
    {
        $userRepository = new UserRepository();
        $fullname = "";
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Full Name Is Bool
    public function testInsertUserWithIdInputFullNameIsBool()
    {
        $userRepository = new UserRepository();
        $fullname = true;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Full Name Is Number
    public function testInsertUserWithIdInputFullNameIsNumber()
    {
        $userRepository = new UserRepository();
        $fullname = 123;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Full Name Is Array
    public function testInsertUserWithIdInputFullNameIsArray()
    {
        $userRepository = new UserRepository();
        $fullname = [
            "fullname" => "Vo Thanh Dat"
        ];
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Full Name Is Special
    public function testInsertUserWithIdInputFullNameIsSpecial()
    {
        $userRepository = new UserRepository();
        $fullname = "&^!@#%$!*@&^(";
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Full Name Is Object
    public function testInsertUserWithIdInputFullNameIsObject()
    {
        $userRepository = new UserRepository();
        $fullname = new BankModel();
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => $fullname,
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    ///////////////////////////////     TYPE             //////////////////////////////


    // Test case Insert User With Id Type Is Null
    public function testInsertUserWithIdInputTypeIsNull()
    {
        $userRepository = new UserRepository();
        $type = '';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Type Is Bool
    public function testInsertUserWithIdInputTypeIsBool()
    {
        $userRepository = new UserRepository();
        $type = true;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Type Is Number
    public function testInsertUserWithIdInputTypeIsNumber()
    {
        $userRepository = new UserRepository();
        $type = 123;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Type Is Array
    public function testInsertUserWithIdInputTypeIsArray()
    {
        $userRepository = new UserRepository();
        $type = [
            "type" => "admin"
        ];
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Type Is Special
    public function testInsertUserWithIdInputTypeIsSpecial()
    {
        $userRepository = new UserRepository();
        $type = '*!%*&@%*&';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Type Is Object
    public function testInsertUserWithIdInputTypeIsObject()
    {
        $userRepository = new UserRepository();
        $type = new BankModel();
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Type Not Admin Or User
    public function testInsertUserWithIdInputTypeNotAdminOrUser()
    {
        $userRepository = new UserRepository();
        $type = "bagaga";
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => $type,
            'email' => "vothanhdat123123@gmail.com",
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
    ///////////////////////////////     EMAIl             //////////////////////////////

    // Test case Insert User With Id Input Email Is Null
    public function testInsertUserWithIdInputEmailIsNull()
    {
        $userRepository = new UserRepository();
        $email = '';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Is Bool
    public function testInsertUserWithIdInputEmailIsBool()
    {
        $userRepository = new UserRepository();
        $email = true;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];
        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Is Number
    public function testInsertUserWithIdInputEmailIsNumber()
    {
        $userRepository = new UserRepository();
        $email = 1234;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Is Array
    public function testInsertUserWithIdInputEmailIsArray()
    {
        $userRepository = new UserRepository();
        $email = [
            "email" => "vothanhdat@gmail.com"
        ];
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Is Special
    public function testInsertUserWithIdInputEmailIsSpecial()
    {
        $userRepository = new UserRepository();
        $email = '(*^*^&$';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Is Object
    public function testInsertUserWithIdInputEmailIsObject()
    {
        $userRepository = new UserRepository();
        $email = new BankModel();
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Email Stye
    public function testInsertUserWithIdInputEmailStyle()
    {
        $userRepository = new UserRepository();
        $email = 'jjkjhgfbkrggeo.comnm';
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => $email,
            'password' => '12345'
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }


    ///////////////////////////////     PASSWORD             //////////////////////////////

    // Test case Insert User With Id Input Password Is Null
    public function testInsertUserWithIdInputPasswordIsNull()
    {
        $userRepository = new UserRepository();
        $password = "";
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Bool
    public function testInsertUserWithIdInputPasswordIsBool()
    {
        $userRepository = new UserRepository();
        $password = true;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Number
    public function testInsertUserWithIdInputPasswordIsNumber()
    {
        $userRepository = new UserRepository();
        $password = 123;
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Array
    public function testInsertUserWithIdInputPasswordIsArray()
    {
        $userRepository = new UserRepository();
        $password = [
            "password" => "123kjabdjka"
        ];
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Special
    public function testInsertUserWithIdInputPasswordIsSpecial()
    {
        $userRepository = new UserRepository();
        $password = "&^$&^*&^*#";
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];
        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Object
    public function testInsertUserWithIdInputPasswordIsobject()
    {
        $userRepository = new UserRepository();
        $password = new BankModel();
        $input = [
            'id' => 123,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => $password
        ];
        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    ///////////////////////////////     ID             //////////////////////////////

    // Test case Insert User With Id Input Id Is Null
    public function testInsertUserWithIdInputIdIsNull()
    {
        $userRepository = new UserRepository();
        $id = "";
        $input = [
            'id' => $id,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => 12345
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id: Id Is Bool
    public function testInsertUserWithIdInputIdIsBool()
    {
        $userRepository = new UserRepository();
        $id = true;
        $input = [
            'id' => $id,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => 12345
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id: Id Is Number
    public function testInsertUserWithIdInputIdIsNumber()
    {
        $userRepository = new UserRepository();
        $id = 123;
        $input = [
            'id' => $id,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => 12345
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id: Id Is Array
    public function testInsertUserWithIdInputIdIsArray()
    {
        $userRepository = new UserRepository();
        $id = [
            "password" => 123
        ];
        $input = [
            'id' => $id,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => 12345
        ];

        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Special
    public function testInsertUserWithIdInputIdIsSpecial()
    {
        $userRepository = new UserRepository();
        $id = "&I^&*@!*#";
        $input = [
            'id' => $id,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => 12345
        ];
        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    // Test case Insert User With Id Password Is Object
    public function testInsertUserWithIdInputIdIsObject()
    {
        $userRepository = new UserRepository();
        $id = new BankModel();
        $input = [
            'id' => $id,
            'name' => 'Dattt',
            'fullname' => "Vo Thanh Dat",
            'type' => 'admin',
            'email' => "vothanhdat123123@gmail.com",
            'password' => 12345
        ];
        $userRepository->startTransaction();
        $actual = $userRepository->insertUserWithId($input);

        $userRepository->rollBack();

        $expected = false;
        $this->assertEquals($expected, $actual);
    }
}