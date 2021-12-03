<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a,$b);

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

       $actual = $userModel->sumb($a,$b);

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

       $actual = $userModel->sumb($a,$b);

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

       $actual = $userModel->sumb($a,$b);

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

       $actual = $userModel->sumb($a,$b);

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

       $actual = $userModel->sumb($a,$b);

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

       $actual = $userModel->sumb($a,$b);

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
       $user = $userModel->auth($username,$password);
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
       $actual = $userModel->auth($username,$password);
       $this->assertEquals($expected, $actual);
   }
   // Test username là số 
   public function testAuthUsernameIsNum()
   {
       $userModel = new UserModel();
       $expected = 'Not invalid';
       $username = 11111;
       $password = '123';
       $actual = $userModel->auth($username,$password);
       $this->assertEquals($expected, $actual);
   }
   
   // End test function Auth


}