<?php
use PHPUnit\Framework\TestCase;
define('VERSON');
class UserModelTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testFindUserByIdNewOk()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //Truyên tham số : 
       $id = 212;
       $expected = "user";
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);
       //assertEquals
       $this->assertEquals($expected , $actual[0]['name']);
    }
     /**
     * Test case Ng
     */
    public function testFindUserByIdNewNg()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id khong ton tai
       $id = 100;
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);
       //Neu ket qua mong doi khong ton tai
       if(empty($actual)) {
           return $this->assertTrue(true);
       }
       return $this->assertTrue(false);
    }
      /**
     * Test case String
     */
    public function testFindUserByIdNewIsString()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       $id = "chuoi";

       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);

       $this->assertEquals($expected , $actual);
       
    }
    public function testSumOk3()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk4()
    {
        $userModel = new UserModel();
        $a = 1.5;
        $b = 2.5;
        $expected = 4;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk5()
    {
        $userModel = new UserModel();
        $a = -1.5;
        $b = -2.5;
        $expected = -4;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk6()
    {
        $userModel = new UserModel();
        $a = -10;
        $b = 20;
        $expected = 10;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk7()
    {
        $userModel = new UserModel();
        $a = -10;
        $b = '1';
        $expected = 'Invalid';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumOk8()
    {
        $userModel = new UserModel();
        $a = '-10';
        $b = '1';
        $expected = 'Invalid';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }



    // public function testFindUserByIdOk()
    // {
    //     # code...
    //     $userModel = new UserModel();
    //     $userId = 5;
    //     $userName = 'Chanh';

    //     $expected = 'Invalid';
    //     $user = $userModel->findUserById($userId);
    //     $actual = $user[0]['name'];

    //     $this->assertEquals($userName, $actual);
    // }


     /**
     * Test case Array
     */
    public function testFindUserByIdNewIsArray()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       $id = [
            'name' , 'email' , 'fullname' , 'type'
       ];

       $expected = [];
       $actual = $UserModel->findUserByIdNew($id[0]);
        //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
       
    }
      /**
     * Test case Null
     */
    public function testFindUserByIdNewIsNull()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       $id = null;
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
        //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
     /**
     * Test case Object
     */
    public function testFindUserByIdNewIsObject()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       $id = BankModel::class;
       //var_dump($id);
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
     /**
     * Test case Double
     */
    public function testFindUserByIdNewIsDouble()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       $id = 9.5;
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
        //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
    /**
     * Test case Double
     */
    public function  testFindUserByIdNewIsBool()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot chuoi bat ky:
       
       $id = true;
       //Result da biet:
       $expected = false;
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);die();
       if($actual == null) {
            $this->assertTrue(true);
       }
       else  {
            $this->assertTrue(false);
       }
    }
     /**
     * Test case Negative
     */
    public function  testFindUserByIdNewIsNegative()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot so am:
       
       $id = -35;
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }
     /**
     * Test case Characters
     */
    public function  testFindUserByIdNewIsCharacters()
    {
       //khai báo model:
       $UserModel = new UserModel();
       //id la mot ky tu dat biet:
       
       $id = '#';
       //Result da biet:
       $expected = [];
       $actual = $UserModel->findUserByIdNew($id);
       //var_dump($actual);die();
       $this->assertEquals($expected , $actual);
    }

    /**
     * Test case NegativeDouble
     */
    public function  testFindUserByIdNewIsNegativeDouble()
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

    //Test findUserById
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();

        $id = md5(123 . "chuyen-de-web-1");
        $expected  = 'Ng13123';

        $bank = $userModel->findUserById($id);
        $this->assertEquals($expected, $bank[0]['name']);
    }
    public function testFindUserByIdNotExist()
    {
        $userModel = new UserModel();

        $id = md5(9999 . "chuyen-de-web-1");

        $bank = $userModel->findUserById($id);
        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdString()
    {
        $userModel = new UserModel();

        $id = md5("qwe" . "chuyen-de-web-1");
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = md5("" . "chuyen-de-web-1");
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdObject()
    {
        $userModel = new UserModel();
        $id = new stdClass();
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdBool()
    {
        $userModel = new UserModel();
        $id = true;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdDouble()
    {
        $userModel = new UserModel();
        $id = md5(123.000000 . "chuyen-de-web-1");
        $actual = $userModel->findUserById($id);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdNull()
    {
        $userModel = new UserModel();
        $id = null;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdStringValueNumber()
    {
        $userModel = new UserModel();
        $id = md5('123' . 'chuyen-de-web-1');
        $actual = $userModel->findUserById($id);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindUserByIdNegative()
    {
        $userModel = new UserModel();
        $id = -124;
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    public function testFindUserByIdArray()
    {
        $userModel = new UserModel();
        $id = ['id' => 124];
        $expected = false;
        $actual = $userModel->findUserById($id);
        $this->assertEquals($expected, $actual);
    }
    //Test updateUser
    //Data
    public function testUpdateUserOk()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = true;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataEmpty()
    {
        $data = [];
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataObject()
    {
        $data = new stdClass();
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataString()
    {
        $data = 'demo';
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataBool()
    {
        $data = true;
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataNull()
    {
        $data = null;
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataNumber()
    {
        $data = 124;
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithDataNegative()
    {
        $data = -124;
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataStringValueNumber()
    {
        $data = '-124';
        $version = md5(43 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataNotFieldName()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'fullname' => 'ngothai',
            'email' => 'ngothai@gmail.com',
            'type' => 'admin',
            'password' => '1234'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataNotFieldFullName()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'email' => 'ngothai@gmail.com',
            'type' => 'admin',
            'password' => '1234'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataNotFieldEmail()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'type' => 'admin',
            'password' => '1234'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataNotFieldType()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '1234'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataNotFieldPassword()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'type' => 'admin',
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataNotFieldId()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'type' => 'admin',
            'password' => '1234'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Data Name
    public function testUpdateUserDataFieldNameObject()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => new stdClass(),
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldNameArray()
    {
        $array = [
            'name' => 'thai'
        ];
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => $array,
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldNameNull()
    { 
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => null,
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Data FullName
    public function testUpdateUserDataFieldFullNameObject()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => new stdClass(),
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldFullNameArray()
    {
        $array = [
            'name' => 'thai'
        ];
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => $array,
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldFullNameNull()
    { 
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => null,
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Data Email
    public function testUpdateUserDataFieldEmailObject()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' =>'ngothanhthai',
            'email' => new stdClass(),
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldEmailArray()
    {
        $array = [
            'name' => 'thai'
        ];
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => $array,
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldEmailNull()
    { 
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => null,
            'password' => '123123',
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Data type
    public function testUpdateUserDataFieldTypeObject()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' =>'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' =>  new stdClass(),
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldTypeArray()
    {
        $array = [
            'name' => 'thai'
        ];
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => $array,
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldTypeNull()
    { 
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => '123123',
            'type' => null,
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Data password
    public function testUpdateUserDataFieldPasswordObject()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' =>'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => new stdClass(),
            'type' =>  'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldPasswordArray()
    {
        $array = [
            'name' => 'thai'
        ];
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => $array,
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserDataFieldPasswordNull()
    { 
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngothanhthai',
            'email' => 'ngothai@gmail.com',
            'password' => null,
            'type' => 'admin',
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Data Id

    public function testUpdateUserWithIdNotExist()
    {
        $id = md5(55555 . "chuyen-de-web-1");
        $data = [
            'id' => $id,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdString()
    {
        $id = md5('ddddd' . "chuyen-de-web-1");
        $data = [
            'id' => $id,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdEmpty()
    {
        $id = md5('' . "chuyen-de-web-1");
        $data = [
            'id' => $id,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdObject()
    {
        $data = [
            'id' => new stdClass(),
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(59 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdBool()
    {
        $data = [
            'id' => true,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdDouble()
    {
        $idNew = md5(124.0000000 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION + 1  . "chuyen-de-web-1");
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithIdNull()
    {
        $data = [
            'id' => null,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdStringValueNumber()
    {
        $idNew = md5('124' . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION + 2 . "chuyen-de-web-1");
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithIdNegative()
    {
        $idNew = md5(-124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithIdArray()
    {
        $idNew = md5(-124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    //Version
    public function testUpdateUserWithVersionOk()
    {
        $idNew = md5('124' . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION + 3 . "chuyen-de-web-1");
        $expected = true;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionNotExist()
    {
        $id = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $id,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(6465465 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionString()
    {
        $id = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $id,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5('eqweqwe' . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionEmpty()
    {
        $id = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $id,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5('' . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionObject()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = new stdClass();
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionBool()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = true;
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionDouble()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(VERSION + 4 + 0.0000000000 . "chuyen-de-web-1");
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithVersionNull()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = null;
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionNegative()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = md5(-53 . "chuyen-de-web-1");
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateUserWithVersionArray()
    {
        $idNew = md5(124 . "chuyen-de-web-1");
        $data = [
            'id' => $idNew,
            'name' => 'thai',
            'fullname' => 'ngo thanh thai',
            'email' => 'ngothai2972001@gmail.com',
            'password' => '123456',
            'type' => '1'
        ];
        $version = ['version' => md5(53 . "chuyen-de-web-1")];
        $expected = false;
        $userModel = new UserModel();
        $actual = $userModel->updateUser($data, $version);
        $this->assertEquals($expected, $actual);
    }
    
}