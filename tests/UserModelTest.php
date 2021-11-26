<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /*
    File: UserModel.
    Function: getAll().
    Author: Phuong Nguyen
    */
    public function testGetAll() {
        $userModel = new UserModel();
        $expected = [
            ["id" => "2", 
            "name" => "test2", 
            "fullname" => "", 
            "email" => "", 
            "type" => "", 
            "password" => "202cb962ac59075b964b07152d234b70"],
        ] ;

        $actual = $userModel->getAll();
        $this->assertEquals($expected[0], $actual[0]);
    }

    
    /*
    File: UserModel.
    Function: auth(username, password)
    Desc: Test auth ok
    author: Phuong Nguyen
    */
    public function testAuthOk() {
        $userModel = new UserModel();
        $username = "test2";
        $password = "ad0234829205b9033196ba818f7a872b";

        $expected = true;

        $actual = $userModel->auth($username, $password);
        $this->assertEquals($expected, $actual);
    }

    /*
    File: UserModel.
    Function: auth(username, password).
    Desc: Test if input is special characters -> unaffected to data of another(bank) model 
    Author: Phuong Nguyen.
    */
    public function testAuth_SpecialChars_AffectedToAnotherModel() {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = new BankModel();

        $username = 'test2%";TRUNCATE banks;##';
        $password = '202cb962ac59075b964b07152d234b70';
        $actionAuth = $userModel->auth($username, $password);

        //Array
        $actual = $bankModel->getAll();
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
    }
    public function testInsertInfoUser_id_ArrayList_Ok()
    {
        $userModel = new UserModel();
        $input = array(
            'name' => ['nhu','cute'],
            'password' => 'viet',
            'fullname' => 'nguyenquocviet',
            'email' => 'nguyenquocviet@gmail.com',
            'type' => 'user'    
        );
        //Execute test
        try {
            $userModel->insertUser($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
}