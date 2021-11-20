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
        $userModel = new UserModel();
        $id = 220;
        $name = 'test username';
        $data = array(
            'id'   => $id,
            'name' => 'user',
            'fullname'=> $name,
            'type' => 'user',
            'email'=> '	user12@mail.com',
            'password'=> '1111'
        );
        $userModel->insertUser($data);
        $expected = 'user';
        $actual = $userModel->findUserByIdNew($id);
        // var_dump($actual);die();
        $this->assertEquals($expected , $actual[0]['name']);
    }
     /**
     * Test case Not Good
     */
    public function testInsertUserNg()
    {
        $userModel = new UserModel();
        $id = 5000;
        $name = 'phpunit';
        $data = array(
            'id'   => $id,
            'name' => 'testcase',
            'fullname'=> $name,
            'type' => 'admin',
            'email'=> 'test@gmail.com',
            'password'=> '1111'
        );
        if(!empty($data['id'])) {
            $actual = 0;
        } else {
            $userModel->insertUser($data);
        }
        $actual = $userModel->findUserByIdNew($id);
        //var_dump($actual);die();
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    /**
     * Add user with id Duplicate
     * Test case Not Good Duplicate
     */
    public function testInsertUserIsDuplicate()
    {
         $factory = new FactoryPattern();
         $userModel = $factory->make('user');
         //Id mới nhất được thêm vào
         $id_max = $userModel->lastUserId();
         $data = array(
             "id" => $id_max,
             "bank_id" => 0,
             "name" => "user",
             "fullname" => "test username",
             "email" => "user12@mail.com",
             "password" => "1111",
             "type" => "user",
         );
 
         $userModel->insertUser($data);
         $actual = $userModel->lastUserId();
         //Check id duplicate và + 1
         $expected = $id_max + 1;
 
        //  var_dump($id_max);die();
 
         $this->assertEquals($expected, $actual);
    }
      /**
     * Add user with database null
     * Test case Not Good null
     */
    public function testInsertUserIsNull()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $data = array(
            "id" => "",
            "name" => null,
            "fullname" => "test username",
            "email" => "user12@mail.com",
            "password" => "1111",
            "type" => "user",
        );
        //Ket qua biet truoc:
        $expected = 0;
        //Ket qua mong doi:
        $actual = $userModel->insertUser($data);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case user Not EmtyString
     */
    public function testInsertUserIsNotEmtyString()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $data = array(
            "id" => "",
            "name" => "",
            "fullname" => "",
            "email" => "",
            "password" => "",
            "type" => "",
        );
        //Ket qua biet truoc:
        $expected = 0;
        //Ket qua mong doi:
        $actual = $userModel->insertUser($data);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case user with database not object value:
     */
    public function testInsertUserIsNotObject()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $obj = new BankModel();
        
        $data = array(
            "id" => "",
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "password" => $obj,
            "type" => $obj,
        );
        //Ket qua biet truoc:
        $expected = 0;
        //Ket qua mong doi:
        $actual = $userModel->insertUser($data);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case user with database Not Array value:
     */
    public function testInsertUserIsNotArray()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $array = ['a' , 'b' , 'c'];
        
        $data = array(
            "id" => "",
            "name" => $array,
            "fullname" => $array,
            "email" => $array,
            "password" => $array,
            "type" => $array,
        );
        //Ket qua biet truoc:
        $expected = 0;
        //Ket qua mong doi:
        $actual = $userModel->insertUser($data);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case user with database Not Array value:
     */
    public function testInsertUserIsNotBool()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');

        $bool = true;
        
        $data = array(
            "id" => "",
            "name" =>  $bool,
            "fullname" =>  $bool,
            "email" =>  $bool,
            "password" =>  $bool,
            "type" =>  $bool,
        );
        //Ket qua biet truoc:
        $expected = 0;
        //Ket qua mong doi:
        $actual = $userModel->insertUser($data);
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    
}