<!-- phpunit --coverage-html coverage -->
<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     *?Test case Okie
     */
    public function testSumOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    public function testSumBad()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     *?Test case Not good
     */
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
     * Test case Sum Duong
     */
    public function testSumDuong()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum Am
     */
    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum Am Duong
     */
    public function testSumAmDuong()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = 2;
        $expected = 1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum So Thuc
     */
    public function testSumSoThuc()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum So va chuoi
     */
    public function testSumSoVaChuoi()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = (int)"a";
        $expected = (int)"1a";

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Sum chuoi va chuoi
     */
    public function testSumChuoiVaChuoi()
    {
        $userModel = new UserModel();
        $a = (int)"b";
        $b = (int)"a";
        $expected = (int)"ab";

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

    // Bao lam test function Auth
    public function testAuthOk()
    {
        $userModel = new UserModel();
        $username = 'test2';
        $password = '1234';
        $actual = $userModel->auth($username, $password);
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testAuthNg()
    {
        $userModel = new UserModel();
        $username = 'bao';
        $password = 'bao';
        $actual = $userModel->auth($username, $password);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test username là số âm
    public function testAuthUsernameIsNegativeNum()
    {
        $userModel = new UserModel();
        $expected = 'Not invalid';
        $username = -10;
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }
    // Test username là số thuc
    public function tesAuthUsernameIsDouble()
    {
        $userModel = new UserModel();
        $expected = 'Not invalid';
        $username = 5.5;
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }
    // Test username là mảng
    public function testAuthUsernameIsArray()
    {
        $userModel = new UserModel();
        $expected = 'Not invalid';
        $username = [123];
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }
    // Test username là null
    public function testAuthUsernameIsNull()
    {
        $userModel = new UserModel();
        $expected = 'Not invalid';
        $username = null;
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }
    // Test username là boolean(true/false)
    public function testAuthUsernameIsBoolean()
    {
        $userModel = new UserModel();
        $username = true;
        $password = '123';
        $actual = $userModel->auth($username, $password);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test username không tồn tại
    public function testAuthUsernameIsNotExist()
    {
        $userModel = new UserModel();
        $username = 'bao';
        $password = 'bao';
        $user = $userModel->auth($username, $password);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test username là kí tự đặc biệt
    public function testAuthUsernameIsCharacter()
    {
        $userModel = new UserModel();
        $expected = [];
        $username = '*12';
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }
    // Test username là object
    public function testAuthUsernameIsObject()
    {
        $userModel = new UserModel();
        $expected = 'Not invalid';
        $username = new BankModel();
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }
    // Test username là số 
    public function testAuthUsernameIsNum()
    {
        $userModel = new UserModel();
        $expected = 'Not invalid';
        $username = 11111;
        $password = '123';
        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }

    // End test function Auth

    public function testSumNumbervsString()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testSumStringvsString()
    {
        $userModel = new UserModel();
        $a = '1';
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testSumIntegervsDouble()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 1.5;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 2.5) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }


    // Huynh lam test findUserById
    // Test truong hop thanh cong
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
        $idUser = 2;
        $expected = 'test2';
        $user = $userModel->findUserById($idUser);
        $actual = $user[0]['name'];
        $this->assertEquals($expected, $actual);
    }
    /* ***************************
    ?Start Test function FindUser
    ***************************** */
    public function testFindUserByIdWithInteger()
    {
        $user = new UserModel();
        $id = 2;
        $expected = 'test2';
        $actual = $user->findUserById($id);
        // var_dump($actual);
        // die();
        $this->assertEquals($expected, $actual[0]['name']);
    }
    // public function testFindUserByIdWithInteger()
    // {
    //     $user = new UserModel();
    //     $id = '1';
    //     $expected = 'test1';
    //     $actual = $user->findUserById($id);
    //     $this->assertEquals($expected, $actual[0]['name']);
    // }
    public function testFindUserByIdWithString()
    {
        $userModel = new UserModel();
        $userId = '2';
        $user = $userModel->findUserById($userId);
        if (!empty($user)) {
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
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là số thực
    public function testFindUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $userId = 2.5;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là null
    public function testFindUserByIdIsNull()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'Not invalid';
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
    /* 
    ******** 
    ?Name 
    ******* */
    public function testFindUserGoodWithName()
    {
        $user = new UserModel();
        $key = "test2";
        $actual = $user->findUser($key);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithNameNotExit()
    {
        $user = new UserModel();
        $keys = "abc";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithNameSpecialSign()
    {
        $user = new UserModel();
        $keys = "-";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithHalfName()
    {
        $user = new UserModel();
        $keys = "te";
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithReverseName()
    {
        $user = new UserModel();
        $keys = '2test';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithSameName()
    {
        $user = new UserModel();
        $keys = 'test2';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithRedundantName()
    {
        $user = new UserModel();
        $keys = 'test2hai';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    /* 
    ******** 
    ?Email 
    ******* */
    public function testFindUserGoodWithEmail()
    {
        $user = new UserModel();
        $keys = "example200@gmail.com";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithEmailNotExit()
    {
        $user = new UserModel();
        $keys = "abc@gmail.com";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithEmailSpecialSign()
    {
        $user = new UserModel();
        $keys = "fxnam201@gmail";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithHalfEmail()
    {
        $user = new UserModel();
        $keys = "test2";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
    }
    // Test trường hợp id là mảng
    public function testFindUserByIdIsArray()
    {
        $user = new UserModel();
        $keys = array('test2');
        $actual = $user->findUserById($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testFindUserWithSameEmail()
    {
        $user = new UserModel();
        $keys = 'fxnam201@gmail.com';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithReverseEmail()
    {
        $user = new UserModel();
        $keys = 'gmail.com@';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithRedundantEmail()
    {
        $user = new UserModel();
        $keys = 'fxannguyen201@gmail.com.vn';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //?Other
    public function testFindUserWithNull()
    {
        $user = new UserModel();
        $keys = "";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithNumber()
    {
        $user = new UserModel();
        $keys = "1";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithSpace()
    {
        $user = new UserModel();
        $keys = " ";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithAllSpecialSign()
    {
        $user = new UserModel();
        $keys = "%;%;%;";
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithTrueFalse()
    {
        $user = new UserModel();
        $keys = true;
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithPositiveNumber()
    {
        $user = new UserModel();
        $keys = 2;
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithNegativeNumber()
    {
        $user = new UserModel();
        $keys = -2;
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithDoubleType()
    {
        $user = new UserModel();
        $keys = 2.5;
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithHTMLTag()
    {
        $user = new UserModel();
        $keys = '<p>Hi<p>';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithJsTag()
    {
        $user = new UserModel();
        $keys = '<script>alert("Hi")</script>';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithOtherLanguage()
    {
        $user = new UserModel();
        $keys = 'สวัสดี';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithUppercase()
    {
        $user = new UserModel();
        $keys = 'NGUYỄN THÀNH AN';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithEqualLength()
    {
        $user = new UserModel();
        $keys = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithOverLength()
    {
        $user = new UserModel();
        $keys = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    /* ***************************
    ?End Test function FindUser
    ***************************** */
    public function testGetUserGoodWithString()
    {
        $userModel = new UserModel();
        $userId = null;
        $expected = 'Not invalid';
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    // Test trường hợp id là 1 object
    public function testFindUserByIdIsObject()
    {
        $userModel = new UserModel();
        $userId = new BankModel();
        $expected = 'Not invalid';
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
    // End test findUserById
    // Huynh lam test cho function DeleteUserById
    // Test truong hop thanh cong
    public function testDeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $idUser = 1;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test truong hop sai
    public function testDeleteUserByIdNg()
    {
        $userModel = new UserModel();
        $idUser = 100;
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
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


    // public function testAuthGood()
    // {
    //     $user = new UserModel();
    //     $username = 'chien';
    //     $password = '123';
    //     $actual = $user->auth($username, $password);
    //     if (!empty($actual)) {
    //         return $this->assertTrue(true);
    //     }
    //     return $this->assertTrue(false);
    // }
    public function testDeleteUserByIdGood()
    {
        $userModel = new UserModel();
        $idUser = '1';
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là số âm
    public function testDeleteUserByIdIsNegativeNumber()
    {
        $userModel = new UserModel();
        $idUser = -5;
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là số thực
    public function testDeleteUserByIdIsDoubleNumber()
    {
        $userModel = new UserModel();
        $idUser = 5.5;
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là null
    public function testDeleteUserByIdIsNull()
    {
        $userModel = new UserModel();
        $idUser = null;
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
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
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
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
        $user = $userModel->deleteUserById($idUser);
        if (!empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test trường hợp id là kí tự
    public function testDeleteUserByIdIsCharacters()
    {
        $userModel = new UserModel();
        $idUser = '%%';
        $user = $userModel->deleteUserById($idUser);
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // End test DeleteUserById
    // public function testAuthGood()
    // {
    //     $user = new UserModel();
    //     $username = 'huynh';
    //     $password = '123';
    //     $actual = $user->auth($username, $password);
    //     if (!empty($actual)) {
    //         return $this->assertTrue(true);
    //     }
    //     return $this->assertTrue(false);
    // }

    /* ***************************
    ?Start Test function UpdateUser
    ***************************** */
    public function testUpdateUserGood()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = array('id' => '2', 'name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example2001@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        $user->rollback();
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testUpdateUserWithNotId()
    {
        $user = new UserModel();
        $input = array('id' => '', 'name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($input);
        // die();
        if ($actual != true) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNameNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test2', 'fullname' => '', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEmailNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test2', 'fullname' => 'thanh nam', 'email' => '', 'type' => 'admin', 'password' => '1234');
        // var_dump($input);
        // die();
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPasswordNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithTypeNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => '', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => 'h6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithTypeDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEmailDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3@$', 'fullname' => 'nguyen gia han', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han#%', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han#%', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ******** 
    ?Test Name 
    *********** */
    public function testUpdateUserWithNameTrueFalse()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => true, 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameInteger()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 1, 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameDouble()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 1.3, 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithUppercaseName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'THANH AN', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithOverLengthName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeriakenvaunetradevonneyavondalatarneskcaevontaepreonkeinesceshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeriakenvaunetradevonneyavondalatarneskcaevontaepreonkeinesceshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaa', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaune', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithObjectName()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => $userObject, 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'สวัสดี', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '<b>Hello</b>', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '<script>alert("HI")</script>', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithPositiveName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 2, 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNegativeName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => -2, 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ********
    ?Test Id 
    *********** */
    public function testUpdateUserWithIdTrueFalse()
    {
        $user = new UserModel();
        $input = array('id' => true, 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdInteger()
    {
        $user = new UserModel();
        $input = array('id' => 6, 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdDouble()
    {
        $user = new UserModel();
        $input = array('id' => 6.3, 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdNotExit()
    {
        $user = new UserModel();
        $input = array('id' => '10000', 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithUppercaseId()
    {
        $user = new UserModel();
        $input = array('id' => 'SAU', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOverLengthId()
    {
        $user = new UserModel();
        $input = array('id' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthId()
    {
        $user = new UserModel();
        $input = array('id' => '1234567891', 'name' => 'Thanh An', 'fullname' => 'Thanh An Nguyen', 'email' => 'example205@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithObjectId()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => $userObject, 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageId()
    {
        $user = new UserModel();
        $input = array('id' => 'สวัสดี', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagId()
    {
        $user = new UserModel();
        $input = array('id' => '<b>Hello</b>', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagId()
    {
        $user = new UserModel();
        $input = array('id' => '<script>alert("HI")</script>', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithZeroOnTopId()
    {
        $user = new UserModel();
        $input = array('id' => '06', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPositiveId()
    {
        $user = new UserModel();
        $input = array('id' => 6, 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNegativeId()
    {
        $user = new UserModel();
        $input = array('id' => -6, 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ******** 
    ?Test Fullname 
    *********** */
    public function testUpdateUserWithFullNameTrueFalse()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => true, 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameInteger()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 12, 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithFullNameDouble()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 12.3, 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithUppercaseFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'NGUYEN GIA HAN', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithOverLengthFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'lenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyr', 'email' => 'example206@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithObjectFullName()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => $userObject, 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'สวัสดี', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => '<b>Hello</b>', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => '<script>alert("HI")</script>', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Th', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithPositiveFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 6, 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNegativeFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => -6, 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ******** 
    ?Test Email 
    *********** */
    public function testUpdateUserWithTrueFalseEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => true, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIntegerEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 147, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithDoubleEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 147.23, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithUppercaseEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'NGUYEN GIA HAN', 'email' => 'EXAMPLE201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithOverLengthEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'examplenendrasamecashaunettethalemeicoles206@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithObjectEmail()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => $userObject, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'สวัสดี', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => '<b>Hello</b>', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => '<script>alert("HI")</script>', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen201', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPositiveEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 6, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNegativeEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => -6, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /*
     ******** 
     ?Test Type 
     *********** */
    public function testUpdateUserWithTrueFalseType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => true, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIntegerType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 12, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithDoubleType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 12.3, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithUppercaseType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'NGUYEN GIA HAN', 'email' => 'EXAMPLE201@gmail.com', 'type' => 'USER', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOverLengthType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'examplenendrasamecashaunettethalemeicoles206@gmail.com', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithObjectType()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => $userObject, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'สวัสดี', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => '<b>Hello</b>', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => '<script>alert("HI")</sc>', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'use', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPositiveType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 6, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNegativeType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => -6, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* ***************************
    ?End Test function UpdateUser
    ***************************** */
    public function testInsertUserGood()
    {
        $user = new UserModel();
        $user->startTransaction();
        $input = array('name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example99@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->insertUser($input);
        // var_dump($actual);
        // die();
        $user->rollback();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testGetInstanceNull()
    {
        $user = new UserModel();
        $actual = $user->getInstance();
        $actual2 = get_class($actual);
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }


    // Chien lam test GetUsers
    public function testGetUsersGood()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'test2';
        $user = $userModel->getUsers($params);
        if (!empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test trường hợp sai
    public function testGetUsersNg()
    {
        $userModel = new UserModel();
        $params['keyword']  = 'chien';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số
    public function testGetUsersByIsNum()
    {
        $userModel = new UserModel();
        $params['keyword'] = 123;
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số âm
    public function testGetUsersIsNegativeNum()
    {
        $userModel = new UserModel();
        $params['keyword'] = -123;
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là số thuc
    public function testGetUsersIsDouble()
    {
        $userModel = new UserModel();
        $params['keyword'] = 10.5;
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }

    // Test keyword là null
    public function testGetUsersIsNull()
    {
        $userModel = new UserModel();
        $params['keyword'] = null;
        $user = $userModel->getUsers($params);
        if (!empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword là boolean(true/false)
    public function testGetUsersIsBoolean()
    {
        $userModel = new UserModel();
        $params['keyword'] = true;
        $user = $userModel->getUsers($params);
        if (empty($user)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword không tồn tại
    public function testGetUsersIsNotExist()
    {
        $userModel = new UserModel();
        $params['keyword'] = 'chien';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword có 1 khoảng trắng
    public function testGetUsersIsOneSpace()
    {
        $userModel = new UserModel();
        $params['keyword'] =  'gia nam';
        $user = $userModel->getUsers($params);
        if (!empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test keyword có từ 2 khoảng trắng
    public function testGetUsersIsMoreSpace()
    {
        $userModel = new UserModel();
        $params['keyword'] = 'gia  nam';
        $user = $userModel->getUsers($params);
        if (empty($user[0])) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // End chien lam

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
    public function testGetUserHaveNotBank()
    {
        $user = new UserModel();
        $actual = $user->getUserHaveNotBank();
        // var_dump($actual);
        if (!empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
}
