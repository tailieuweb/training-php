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
    public function testFindUserByIdOk() {
      $userModel = new UserModel();
      
      $id = 8;
      $mongDoiUsername = 'asdf';
      
      $user = $userModel->findUserById($id);
      
      $this->assertEquals($mongDoiUsername, $user[0]['name']);
      
      }
            
      public function testFindUserByIdNg() {
      $userModel = new UserModel();
      
      $id = 999999;
      
      
      $user = $userModel->findUserById($id);
      
      if (empty($user)) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
      
      }
      
      public function testFindUserByIdStr() {
      $userModel = new UserModel();
      
      $id = 'asdf';
      
      
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      
      $this->assertEquals($expected, $actual);   
      }
      
      
      public function testFindUserByIdNull() {
      $userModel = new UserModel();
      $id = '';
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      
      $this->assertEquals($expected, $actual);   
      }
      
      public function testFindUserByIdObject() {
      $userModel = new UserModel();
      
      $id = new stdClass();
      $expected = 'error';
      $actual = $userModel->findUserById($id);
      
      $this->assertEquals($expected, $actual);
      }
                     /** Test InsertUser_UserModel*/

      /**
     * Thêm user mới vào database
     */
    public function testInsertUserOk()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => "user1",
            "password" => "user1",
            "cost" => "0",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Thêm user mới bị trùng id
     */
    public function testInsertUserTrungId()
    {
        $userModel = new UserModel();
        $existing_id = $userModel->getID();

        $param = array(
         "id" => "",
            "bank_id" => 0,
            "name" => "user1",
            "password" => "user1",
            "cost" => "0",
            "submit" => "submit"
        );

        $userModel->insertUser($param);
        $actual = $userModel->getID();
        $expected = $existing_id + 1;

        print_r("\t=> The last ID before: " . $existing_id  . "\n");
        print_r("\t=> The last ID after: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Add new user with empty string values.
     */
    public function testInsertUserEmptyStringValues()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => "",
            "password" => "",
            "cost" => "0",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * thêm người dùng mới với giá trị null
     */
    public function testInsertUserNull()
    {
        $userModel = new UserModel();

        $param = array(
         "id" => "",
         "bank_id" => 0,
         "name" => "user1",
         "password" => "user1",
         "cost" => "0",
         "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * thêm người dùng mới với giá trị là đối tượng
     */
    public function testInsertUserNgObject()
    {
        $userModel = new UserModel();
        $obj = new stdClass();

        $param = array(
            "id" => "",
            "bank_id" => 0,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "type" => $obj,
            "password" => $obj,
            "cost" => "0",
            "ver" => "",
            "submit" => "submit"
        );

        $actual = $userModel->insertUser($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }


}