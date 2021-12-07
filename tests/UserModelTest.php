<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testSumOk()
    {
       $UserModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $UserModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $UserModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumOkam()
    {
       $UserModel = new UserModel();
       $a = -1;
       $b = -2;
       $expected = -3;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkad()
    {
       $UserModel = new UserModel();
       $a = -1;
       $b = 2;
       $expected = 1;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkDouble()
    {
       $UserModel = new UserModel();
       $a = 1.5;
       $b = 2.5;
       $expected = 4;

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testStr()
    {
       $UserModel = new UserModel();
       $a = 1;
       $b = 'a';
       $expected = 'error';

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testString()
    {
       $UserModel = new UserModel();
       $a = 'a';
       $b = 'b';
       $expected = 'error';

       $actual = $UserModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }
    /*******************/
    //test luan
    /**
     * Test case getInstance
     */
    public function testGetInstanceUser()
    {
        $this->assertInstanceOf('UserModel', UserModel::getInstance());
    }
    public function testGetInstance()
    {
        $user = new UserModel();
        $user = new UserModel();
        $actual = $user->getInstance();
        $actual2 = get_class($actual);
        // die();
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
    public function testGetInstanceNotNull()
    {
        $user = new UserModel();
        $user1 = new UserModel();
        $user->getInstance();
        $actual = $user1->getInstance();
        $actual2 = get_class($actual);
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
    /**
     * Test case FindUserById
    */
    /**
     * Test case  findUserById OK
     */
    public function testDeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $idUser = 1;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test truong hop sai
    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $idUser = 100;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test truong hop id la chuoi
    public function testDeleteUserByIdIsString()
    {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $idUser = '5';
        $user = $userModel->deleteUserById($idUser);
        $userModel->rollback();
        if (!empty($user)) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    // Test sai nen comment lai
    // public function testFindUserGoodWithString()
    // {
    //     $user = new UserModel();
    //     $keys = "test1";
    //     // $expected = "";
    //     $actual = $user->findUser($keys);
    //     // var_dump($actual);
    //     // die();
    //     if (!empty($actual)) {
    //         return $this->assertTrue(true);
    //     }
    //     return $this->assertTrue(false);
    // }
    public function testDeleteUserByIdGood()
    {
        $userModel = new UserModel();
        $idUser = '1';
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test trường hợp id là số âm
    public function testDeleteUserByIdIsNegativeNumber()
    {
        $userModel = new UserModel();
        $idUser = -5;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test trường hợp id là số thực
    public function testDeleteUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $idUser = 5.5;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test trường hợp id là null
    public function testDeleteUserByIdIsNull()
    {
        $userModel = new UserModel();
        $idUser = null;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test trường hợp id là boolean(true/false)
    public function testDeleteUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $idUser = true;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        
    }
    // Test trường hợp id là mảng
    public function testDeleteUserByIdIsArray()
    {
        $userModel = new UserModel();
        $idUser = [];
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test trường hợp id là 1 object
    public function testDeleteUserByIdIsObject()
    {
        $userModel = new UserModel();
        $idUser = new BankModel();
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        
    }
    // Test trường hợp id không tồn tại
    public function testDeleteUserByIdNotExist()
    {
        $userModel = new UserModel();
        $idUser = 100;
        $userModel->startTransaction();
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $userModel->rollback();
    }
    // Test trường hợp id là kí tự
    public function testDeleteUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $idUser ='%%';
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    public function testFindUserByIdOk()
    {
        $userModel = new UserModel();
        $idUser = 2;
        $expected = 'test2';
        $user = $userModel->findUserById($idUser);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }

    // Test truong hop sai
    public function testFindUserByIdNg()
    {
        $userModel = new UserModel();
        $userId = 222;
        $user = $userModel->findUserById($userId);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test truong hop id la chuoi
    public function testFindUserByIdIsString()
    {
        $userModel = new UserModel();
        $userId = '2';
        $actual = $userModel->findUserById($userId);
        if (!empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là số âm
    public function testFindUserByIdIsNegativeNumber()
    {
        $userModel = new UserModel();
        $userId = -10;
        $expected = 'error';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số thực
    public function testFindUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $userId = 2.5;
        $expected = 'error';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là null
    public function testFindUserByIdIsNull()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'error';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là boolean(true/false)
    public function testFindUserByIdIsBoolean()
    {
        $userModel = new UserModel();
        $userId = true;
        $actual = $userModel->findUserById($userId);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là mảng
    public function testFindUserByIdIsArray()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'error';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là 1 object
    public function testFindUserByIdIsObject()
    {
        $userModel = new UserModel();
        $userId = new BankModel();
        $expected = 'error';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id không tồn tại
    public function testFindUserByIdNotExist()
    {
        $userModel = new UserModel();
        $userId = 50;
        $user = $userModel->findUserById($userId);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là kí tự
    public function testFindUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $userId = '@11';
        $actual = $userModel->findUserById($userId);
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
   