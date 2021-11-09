<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    // public function testSumOk()
    // {
    //     $userModel = new UserModel();
    //     $a = 1;
    //     $b = 2;
    //     $expected = 3;

    //     $actual = $userModel->sumb($a, $b);

    //     $this->assertEquals($expected, $actual);
    // }

    /**
     * Test case Not good
     */
    // public function testSumNg()
    // {
    //     $userModel = new UserModel();
    //     $a = 1;
    //     $b = 2;

    //     $actual = $userModel->sumb($a, $b);

    //     if ($actual != 3) {
    //         $this->assertTrue(false);
    //     } else {
    //         $this->assertTrue(true);
    //     }
    // }

    /**
     * Cộng
     */
    // public function sumb($a, $b)
    // {
    //     if (!is_numeric($a)) $this->assertTrue(false);
    //     if (!is_numeric($b))  $this->assertTrue(false);
    //     return $a + $b;
    // }

    //test testFindUserById      
    public function testFindUserByIdOk()   
    {
        $userModel = new UserModel();
        $userId = 14;
        $userName = 'abc';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    public function testFindUserByIdNotG() 
    {
        $userModel = new UserModel();
        $userId = 10;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
        
    }

    public function testFindUserByIdStr() { 
        $userModel = new UserModel();
        $userIdid = 'asdf';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
         $this->assertEquals($expected, $actual);
    }

    public function testFindUserByIdNull() {
        $userModel = new UserModel();
        $userIdid = '';
        $expected = [];
        $actual = $userModel->findUserById('');
        
        $this->assertEquals($expected, $actual);
    }

    //test getUser
    public function testInsertUserOk() 
    {
        $userModel = new UserModel();
        $user = array(
            'id' => 14,
            'name' => 'abc',
            'fullname'=>'vitcon',
            'type' => 'admin',
            'email'=> 'hhhhh@gmail.com',
            'password'=> '123456'
        );
        $actual = $userModel->insertUser($user);
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testInsertUserNotG(){
        $userModel = new UserModel();
        $user = array(
            'id' => 14,
            'name' => 'abc',
            'fullname'=>'vitcon',
            'type' => 'ádfasda',
            'email'=> 'hhhhh@gmail.com',
            'password'=> '123456'
        );

        $actual = $userModel->insertUser($user);
          
        if($actual == true){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testInsertUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'id' => [],
            'name' => '',
            'fullname'=>'',
            'type' => '',
            'email'=> '',
            'password'=> ''
        );

        $expected = false;

        $actual = $userModel->insertUser($user);
          
        if($actual == false){
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }
    }

   
    public function testMake(){
        $factory = new FactoryPattern();

        $expected = new UserModel();
        $actual = $factory->make('user');

        $this->assertEquals($expected, $actual);
    }

    public function testMakeNotNull(){
        $factory = new FactoryPattern();

        $expected = new UserModel();
        $actual = $factory->make('');

       
        if($actual == null){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

}
