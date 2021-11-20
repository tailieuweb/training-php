<?php
foreach(glob("./tests/resource-test/*.php") as $file){
    require $file;
}
require_once "./models/FactoryPattern.php";
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /*
    File: UserModel.
    Function: getAll().
    Status: OK
    Author: Phuong Nguyen
    */
    public function testGetAll() {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $expected = [
            ["id" => "2", 
            "name" => "test2", 
            "fullname" => "phuong nguyen", 
            "email" => "pn0921997@gmail.com", 
            "type" => "user", 
            "password" => "202cb962ac59075b964b07152d234b70"],
        ] ;

        $actual = $userModel->read();
        $this->assertEquals(
            $expected[0],
            $actual[0],
            "Expected and actual not equals"
        );
    }

    
    /*
    File: UserModel.
    Function: auth(username, password)
    Desc: Test auth ok
    Status: OK
    author: Phuong Nguyen
    */
    public function testAuthOk() {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $username = "test2";
        $password = "123";

        $expected = [
                "id" => "2",
                "name" => "test2",
                "fullname" => "phuong nguyen",
                "email" => "pn0921997@gmail.com",
                "type" => "user",
                "password" => "202cb962ac59075b964b07152d234b70"
        ];

        $actual = $userModel->auth($username, $password);
        $this->assertEquals(
            $expected, 
            $actual[0],
            "Expected and actual not equals"
        );
    }

    /*
    File: UserModel.
    Function: auth(username, password).
    Desc: Test if input is special characters -> unaffected to data of another(bank) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testAuth_SpecialChars_AffectedToAnotherModel() {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");
        

        $username = 'test2%";TRUNCATE banks;##';
        $password = '202cb962ac59075b964b07152d234b70';
        $actionAuth = $userModel->auth($username, $password);

        //Array
        $actual = $bankModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
    }

    /*
    File: UserModel.
    Function: auth(username, password)
    Desc: Test auth with input(username) is obj
    Status: Fail
    author: Phuong Nguyen
    */
    public function testAuth_WithUsername_IsObj() {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $username = new User("test2", "123");
        $password = "123";

        $expected = [];

        $actual = $userModel->auth($username, $password);
        $this->assertEquals(
            $expected, 
            $actual,
            "Expected and actual not equals"
        );
    }

    /*
    File: UserModel.
    Function: auth(username, password)
    Desc: Test auth with input(password) is obj
    Status: Fail
    author: Phuong Nguyen
    */
    public function testAuth_WithPassword_IsObj() {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $password = new User("test2", "123");
        $username = "test2";

        $expected = [];

        $actual = $userModel->auth($username, $password);
        $this->assertEquals(
            $expected, 
            $actual,
            "Expected and actual not equals"
        );
    }
}