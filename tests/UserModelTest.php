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

    public function testSumOkam()
    {
       $userModel = new UserModel();
       $a = -1;
       $b = -2;
       $expected = -3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkad()
    {
       $userModel = new UserModel();
       $a = -1;
       $b = 2;
       $expected = 1;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testSumOkDouble()
    {
       $userModel = new UserModel();
       $a = 1.5;
       $b = 2.5;
       $expected = 4;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testStr()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 'a';
       $expected = 'error';

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    public function testString()
    {
       $userModel = new UserModel();
       $a = 'a';
       $b = 'b';
       $expected = 'error';

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case insertUser OK
     */
    public function testInsertUserOk()
    {
        // $userModel = new UserModel();
        $userModel = new UserModel();
        //$userModel = $factory->make('user');
        $param = array(
            "id" => "",
            "name" => "user11",
            "fullname" => "user11",
            "email" => "user11@mail.com",
            "type" => "user",
            "password" => "12345"
        );
        $actual = $userModel->insertUser($param);
        $expected = 1;
        $this->assertEquals($expected, $actual);
    }

   /**
     * Test case insertUser Not good
     */
    public function testInsertUserNg()
    {
      $userModel = new UserModel();
      $input['name'] = 'tanle';
      $input['password']  = '12345';
      $input['fullname'] = 'nguyentanle';
      $input['email'] = 'tanle@gmail.com';
      $input['type'] = 'user';
      
      $user = $userModel->insertUser($input);
      $expected = $userModel->findUserById(6);
      if($expected != null){
         $this->assertTrue(true);
      }
      else{
         $this->assertFalse(false);
      }
    }

    public function testInsertUserNull()
    {
        $userModel = new UserModel();
        //$factory = new FactoryPattern();
        //$userModel = $factory->make('user');

        $param = array(
            "id" => "",
            "name" => null,
            "fullname" => "nguyentanle",
            "email" => "le@mail.com",
            "type" => "user",
            "password" => "12345"
        );

        $actual = $userModel->insertUser($param);
        $expected = 'error';

        $this->assertEquals($expected, $actual);
    }

    public function testInsertUserStr()
    {
        $userModel = new UserModel();
        //$factory = new FactoryPattern();
        //$userModel = $factory->make('user');

        $param = array(
            "id" => "",
            "name" => "",
            "fullname" => "nguyentanle",
            "email" => "le@mail.com",
            "type" => "user",
            "password" => "12345"
        );

        $actual = $userModel->insertUser($param);
        $expected = 'error';

        $this->assertEquals($expected, $actual);
    }

    public function testInsertUserObject()
    {
        $userModel = new UserModel();
        //$factory = new FactoryPattern();
        //$userModel = $factory->make('user');

        $object = new stdClass();

        $param = array(
            "id" => "",
            "name" => $object,
            "fullname" => $object,
            "email" => $object,
            "type" => $object,
            "password" => $object
        );
        $actual = $userModel->insertUser($param);
        $expected = 'error';

        $this->assertEquals($expected, $actual);
    }  
}