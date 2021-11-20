<?php
use PHPUnit\Framework\TestCase;

class InsertUserTest extends TestCase
{
    // Function insertUser : thêm người dùng.
    /**
     * Test case Ok
     */
    public function testInsertUserOk()
    {
        // $userModel = new UserModel();
        // $id = 50;
        // $name = 'phpunit';
        // $data = array(
        //     'id'   => $id,
        //     'name' => 'testcase',
        //     'fullname'=> $name,
        //     'type' => 'admin',
        //     'email'=> 'test@gmail.com',
        //     'password'=> '1111'
        // );
        // $userModel->insertUser($data);
        // $expected = 'testcase';
        // $actual = $userModel->findUserByIdNew($id);
        // //var_dump($actual);die();
        // $this->assertEquals($expected , $actual[0]['name']);
    }
     /**
     * Test case Not Good
     */
    public function testInsertUserNg()
    {
        // $userModel = new UserModel();
        // $id = -500;
        // $name = 'phpunit';
        // $data = array(
        //     'id'   => $id,
        //     'name' => 'testcase',
        //     'fullname'=> $name,
        //     'type' => 'admin',
        //     'email'=> 'test@gmail.com',
        //     'password'=> '1111'
        // );
        // $userModel->insertUser($data);
        // $expected = 'testcase';
        // $actual = $userModel->findUserByIdNew($id);
        // //var_dump($actual);die();
        // if(empty($actual)){
        //     $this->assertTrue(true);
        // }else{
        //     $this->assertTrue(false);
        // }
    }
    /**
     * Add user with id Duplicate
     * Test case Not Good Duplicate
     */
    public function testInsertUserIsDuplicate()
    {
        //  $factory = new FactoryPattern();
        //  $userModel = $factory->make('user');
        //  //Id mới nhất được thêm vào
        //  $id_max = $userModel->lastUserId();
        //  $data = array(
        //      "id" => $id_max,
        //      "bank_id" => 0,
        //      "name" => "user",
        //      "fullname" => "test username",
        //      "email" => "user12@mail.com",
        //      "password" => "1111",
        //      "type" => "user",
        //  );
 
        //  $userModel->insertUser($data);
        //  $actual = $userModel->lastUserId();
        //  //Check id duplicate và + 1
        //  $expected = $id_max + 1;
 
        //  //var_dump($actual);die();
 
        //  $this->assertEquals($expected, $actual);
    }
    
}