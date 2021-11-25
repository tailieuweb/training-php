<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase {

//    //test function getUser
////    public function testGetUsers(){
////        $userModel = new UserModel();
////    }
//    //ok
//    public function testFindUserByIdOk(){
//        $userModel = new UserModel();
//        $userId = 18;
//        $userName = 'admin';
//
//        $user = $userModel->findUserById($userId);
//        $actual = $user[0]['name'];
//
//        $this->assertEquals($userName,$actual);
//
//    }
//    // //fail
//    // public function testFindUserByIdStr() {
//    //     $userModel = new UserModel();
//
//    //     $id = 'asdf';
//
//
//    //     $expected = 'error';
//    //     $actual = $userModel->findUserById($id);
//
//    //     $this->assertEquals($expected, $actual);
//
//    //     }
//    //     //fail
//    // public function testFindUserByIdNull() {
//    //     $userModel = new UserModel();
//    //     $id = '';
//    //     $expected = 'error';
//    //     $actual = $userModel->findUserById($id);
//
//    //     // $this->assertEquals($expected, $actual);
//    //     if(empty($id)){
//
//    //         $this->assertTrue(true);
//    //     }else{
//    //         $this->assertTrue(false);
//    //     }
//
//    // }
//    // //fail
//    // public function testFindUserByIdObject() {
//    //     $userModel = new UserModel();
//
//    //     $id = new stdClass();
//    //     $expected = 'error';
//    //     $actual = $userModel->findUserById($id);
//
//    //     $this->assertEquals($expected, $actual);
//
//    //     }
//        //ok
//    public function testFindUserByIdNg(){
//        $userModel = new UserModel();
//        $userId = 9999;
//        $userName = 'asdf';
//
//        $user = $userModel->findUserById($userId);
//
//        if(empty($user)){
//
//            $this->assertTrue(true);
//        }else{
//            $this->assertTrue(false);
//        }
//
//    }
//    //fail
//    // public function testString()
//    // {
//    //     $userModel = new UserModel();
//    //     $a = 1;
//    //     $b = 'a';
//
//    //     //number + string
//    //     //number
//    //     //numberstring
//
//    //     $expected = 'error';
//    //     $actual = $userModel->sumb($a, $b);
//
//    //     $this->assertEquals($expected, $actual);
//
//    // }
//
//    //fail
//    // public function testTwoString()
//    // {
//    //     $userModel = new UserModel();
//    //     $a = 'a';
//    //     $b = 'b';
//
//    //     //number + string
//    //     //number
//    //     //numberstring
//
//    //     $expected = 'error';
//    //     $actual = $userModel->sumb($a, $b);
//
//    //     $this->assertEquals($expected, $actual);
//    // }
//
//    public function testSumNotgood()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//
//        $actual = $userModel->sumb($a,$b);
//
//        if ($actual != 3) {
//            $this->assertTrue(false);
//        } else {
//            $this->assertTrue(true);
//        }
//    }
//    public function testSumOk()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//        $expected = 3;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//    public function testSumNg()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//        $expected = 3;
//
//        $actual = $userModel->sumb($a, $b);
//        if ($actual != 3) {
//            $this->assertTrue(false);
//        } else {
//            $this->assertTrue(true);
//        }
//    }
//    public function testTwoPositiveInt()
//    {
//        $userModel = new UserModel();
//        $a = 1;
//        $b = 2;
//        $expected = 3;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testTwoNegativeInt()
//    {
//        $userModel = new UserModel();
//        $a = -1;
//        $b = -2;
//        $expected = -3;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testNegativePositiveInt()
//    {
//        $userModel = new UserModel();
//        $a = -1;
//        $b = 2;
//        $expected = 1;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testSumFloat()
//    {
//        $userModel = new UserModel();
//        $a = 1.5;
//        $b = 2.33;
//        $expected = 3.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testSumPositiveFloat()
//    {
//        $userModel = new UserModel();
//        $a = 1.5;
//        $b = 2.33;
//        $expected = 3.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//
//    public function testSumNegativeFloat()
//    {
//        $userModel = new UserModel();
//        $a = -1.5;
//        $b = -2.33;
//        $expected = -3.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function testNegativePositiveFloat()
//    {
//        $userModel = new UserModel();
//        $a = -1.5;
//        $b = 2.33;
//        $expected = 0.83;
//
//        $actual = $userModel->sumb($a, $b);
//
//        $this->assertEquals($expected, $actual);
//    }
//    public function testadd(){
//        $userModel = new UserModel();
//        $result = $userModel->add(4,5);
//        $actual = $result;
//        $expected = 9;
//        $this->assertEquals($expected,$actual);
//    }

    // TEST GETUSERS
    public function testGetCountUsers() {
        $user             = new UserModel();
        $param["keyword"] = "a";
        $actual           = count($user->getUsers($param));
        $expected         = 2;
        $this->assertEquals($expected, $actual);
    }

    public function testGetCountNoUser() {
        $user             = new UserModel();
        $param["keyword"] = "l";
        $actual           = empty($user->getUsers($param)) ? "User not found!" : "";
        $expected         = "User not found!";
        $this->assertEquals($expected, $actual);
    }

    public function testSpecialCharacters() {
        $user             = new UserModel();
        $param["keyword"] = "??";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }

    public function testGetUserNg() {
        $user             = new UserModel();
        $param["keyword"] = "dsdsdsd";
        $actual           = count($user->getUsers($param));
        if ($actual != 0) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetUserGood() {
        $user             = new UserModel();
        $param["keyword"] = "admin";
        $actual           = count($user->getUsers($param));
        if ($actual != 1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testLongCharacters() {
        $user             = new UserModel();
        $param["keyword"] = "Loren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artistLoren Gray Beech is an American model, singer and social media personality from Pottstown, Pennsylvania. She was signed to Virgin Records and Capitol Records until February 2021, when she became an independent artist";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }

    public function testNumber() {
        $user             = new UserModel();
        $param["keyword"] = "45646546546";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }

    public function testNullValue() {
        $user             = new UserModel();
        $param["keyword"] = "";
        $actual           = count($user->getUsers($param));
        $expected         = 3;
        $this->assertEquals($expected, $actual);
    }

    public function testSpace() {
        $user             = new UserModel();
        $param["keyword"] = "          ";
        $actual           = count($user->getUsers($param));
        $expected         = 0;
        $this->assertEquals($expected, $actual);
    }
    public function testTrue() {
        $user             = new UserModel();
        $param["keyword"] = "admin";
        $stringActual          = $user->getUsers($param);
        $actual = $stringActual[0]["name"];
        $expected         = "admin";
        $this->assertEquals($expected, $actual);
    }


//    public function testSQLInjection() {
//        $user             = new UserModel();
//        $param["keyword"] = 'abcef%'.'"'.';TRUNCATE banks;##';
//        $actual           = count($user->getUsers($param));
//        $expected         = 0;
//        $this->assertEquals($expected, $actual);
//
//    }

//Test InsertUser
//    public function testInsertUser() {
//        $actual = function () {
//            $user = new UserModel();
//            $form = ["name"      => "Tinh",
//                     "full-name" => "Nguyen Trong Tinh",
//                     "email"     => "123489",
//                     "type"      => "trongtinh2k@gmail.com",
//                     "password"  => md5("999999"),
//            ];
//
//            return $user->insertUser($form);
//        };
//        if ((bool) $actual() === true) {
//            $actual = "Add 1 User Successful!";
//        }
//        $expected = "Add 1 User Successful!";
//        $this->assertEquals($expected, $actual);
//    }

    public function testFieldNameLength() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['name']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid name";
        } else {
            $actual = "invalid name";
        }
        $expected = "valid name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldNameLongCharacter() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinhlllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['name']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid name";
        } else {
            $actual = "invalid name";
        }
        $expected = "invalid name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldNameNull() {
        $user   = new UserModel();
        $input  = ['name'      => '',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = empty($input['name']) ? false : true;

        if ($actual == true) {
            $actual = "valid name";
        } else {
            $actual = "invalid name";
        }
        $expected = "invalid name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldNameNumber() {
        $user   = new UserModel();
        $input  = ['name'      => '34545345',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = is_numeric($input['name']) ? false : true;

        if ($actual == true) {
            $actual = "valid name";
        } else {
            $actual = "invalid name";
        }
        $expected = "invalid name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldNameSpecial() {
        $user   = new UserModel();
        $input  = ['name'      => '%$^$%^',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = !empty($input["name"]) && !preg_match('~[^a-z\d]~i', $input["name"]) ? true : false;
        if ($actual == true) {
            $actual = "valid name";
        } else {
            $actual = "invalid name";
        }
        $expected = "invalid name";

        $this->assertEquals($expected, $actual);
    }

    public function testFieldFullNameLength() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['full-name']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid full-name";
        } else {
            $actual = "invalid full-name";
        }
        $expected = "valid full-name";

        $this->assertEquals($expected, $actual);
    }

    public function testFieldEmailLength() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['email']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid email";
        } else {
            $actual = "invalid email";
        }
        $expected = "valid email";

        $this->assertEquals($expected, $actual);
    }

    public function testFieldTypeLength() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['type']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid type";
        } else {
            $actual = "invalid type";
        }
        $expected = "valid type";

        $this->assertEquals($expected, $actual);
    }

    public function testFieldPassWordLength() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['password']) < 250 ? true : false;

        if ($actual == true) {
            $actual = "valid password";
        } else {
            $actual = "invalid password";
        }
        $expected = "valid password";

        $this->assertEquals($expected, $actual);
    }


    /// Full name

    public function testFieldFullNameLongCharacter() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong TinhNguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['full-name']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid full-name";
        } else {
            $actual = "invalid full-name";
        }
        $expected = "invalid full-name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldFullNameNull() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => '',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = empty($input['full-name']) ? false : true;

        if ($actual == true) {
            $actual = "valid full-name";
        } else {
            $actual = "invalid full-name";
        }
        $expected = "invalid full-name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldFullNameNumber() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => '34234',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = is_numeric($input['full-name']) ? false : true;

        if ($actual == true) {
            $actual = "valid full-name";
        } else {
            $actual = "invalid full-name";
        }
        $expected = "invalid full-name";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldFullNameSpecial() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => '%$^$%^',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = !empty($input["full-name"]) && !preg_match('~[^a-z\d]~i', $input["full-name"]) ? true : false;
        if ($actual == true) {
            $actual = "valid full-name";
        } else {
            $actual = "invalid full-name";
        }
        $expected = "invalid full-name";

        $this->assertEquals($expected, $actual);
    }


    // Email
    public function testFieldEmailLongCharacter() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.comtrongtinh2k@gmail.comtrongtinh2k@gmail.comtrongtinh2k@gmail.comtrongtinh2k@gmail.comtrongtinh2k@gmail.comtrongtinh2k@gmail.comtrongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = strlen($input['email']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid Email";
        } else {
            $actual = "invalid Email";
        }
        $expected = "invalid Email";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldEmailNull() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => '',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = empty($input['email']) ? false : true;

        if ($actual == true) {
            $actual = "valid Email";
        } else {
            $actual = "invalid Email";
        }
        $expected = "invalid Email";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldEmailNumber() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => '2342342',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $actual = is_numeric($input['email']) ? false : true;

        if ($actual == true) {
            $actual = "valid Email";
        } else {
            $actual = "invalid Email";
        }
        $expected = "invalid Email";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldEmaiValid() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
        $actual = !empty($input["email"]) && preg_match($regex, $input["email"]) ? true : false;
        if ($actual == true) {
            $actual = "Valid Email";
        } else {
            $actual = "invalid Email";
        }
        $expected = "Valid Email";

        $this->assertEquals($expected, $actual);
    }


    // TYPE

    public function testFieldTypeLongCharacter() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'useruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruseruser',
                   'password'  => md5('123')];
        $actual = strlen($input['type']) < 100 ? true : false;

        if ($actual == true) {
            $actual = "valid type";
        } else {
            $actual = "invalid type";
        }
        $expected = "invalid type";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldTypeNull() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => '',
                   'password'  => md5('123')];
        $actual = empty($input['type']) ? false : true;

        if ($actual == true) {
            $actual = "valid type";
        } else {
            $actual = "invalid type";
        }
        $expected = "invalid type";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldTypeNumber() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => '32423',
                   'password'  => md5('123')];
        $actual = is_numeric($input['type']) ? false : true;

        if ($actual == true) {
            $actual = "valid type";
        } else {
            $actual = "invalid type";
        }
        $expected = "invalid type";

        $this->assertEquals($expected, $actual);
    }
    public function testFieldTypeSpecial() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => '%$^$$%$%',
                   'password'  => md5('123')];
        $actual = !empty($input["type"]) && !preg_match('~[^a-z\d]~i', $input["type"]) ? true : false;
        if ($actual == true) {
            $actual = "valid type";
        } else {
            $actual = "invalid type";
        }
        $expected = "invalid type";

        $this->assertEquals($expected, $actual);
    }

    //PASSWORD
    public function testFieldPassWordIsString() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('123')];

        $actual =preg_match('/^[a-f0-9]{32}$/',$input['password']);
        //$actual = preg_match('/^[a-f0-9]{32}$/',$input['password']);

        if ($actual) {
            $actual = "PassWord is String";
        } else {
            $actual = "PassWord is not String";
        }
        $expected = "PassWord is String";

        $this->assertEquals($expected, $actual);
    }

    public function testFieldPassWordNull() {
        $user   = new UserModel();
        $input  = ['name'      => 'Tinh',
                   'full-name' => 'Nguyen Trong Tinh',
                   'email'     => 'trongtinh2k@gmail.com',
                   'type'      => 'user',
                   'password'  => md5('')];

        $actual = empty($input['password']) && preg_match('/^[a-f0-9]{32}$/',$input['password'])? true :false;

        if ($actual == true) {
            $actual = "valid password";
        } else {
            $actual = "invalid password";
        }
        $expected = "invalid password";

        $this->assertEquals($expected, $actual);
    }

}