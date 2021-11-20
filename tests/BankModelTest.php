<?php

use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Okie
     */

    //auth
    public function testAuthGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123456";
        $expected_name = "vinhvo";
        $user =  (array)$bankModel->auth($username, $password);
        $this->assertEquals($expected_name, $user[0]['name']);
    }

    public function testAuthNotGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "123457";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected,$user);
    }

    public function testAuthNamePasswordNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "";
        $password = "";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected,$user);
    }

    public function testAuthNameNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "";
        $password = "123456";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected,$user);
    }

    public function testAuthUserPasswordNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $username = "vinhvo";
        $password = "";
        $user = (array)$bankModel->auth($username, $password);
        $expected = [];
        $this->assertEquals($expected,$user);
    }

    public function testAuth_matchRegexGood()
    {
        //Vĩnh
        $username = "vinhvo";
        $password = "123456";
        $this->assertTrue(BankModel::matchRegexLogin($username, $password));
    }
    public function testAuth_matchRegexNotGood()
    {
        //Vĩnh
        $username = "Vinh*vo";
        $password = "123456";
        $this->assertFalse(BankModel::matchRegexLogin($username, $password));
    }


    //deleteUserById
    public function testDeleteBankByIdGood()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $id = 1;
        $findBank = $bankModel->findBankById($id);
        if(!empty($findBank)){
            $delete =  $bankModel->deleteUserById($id);
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }
    public function testDeleteBankByStr()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteUserById('a');
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    public function testDeleteBankByID_Double(){
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteUserById($this->assertIsFloat(2.5));
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    public function testDeleteBankByNull()
    {
        //Vĩnh
        $bankModel = BankModel::getInstance();
        $delete = $bankModel->deleteUserById(NULL);
        $expected = false;
        $this->assertEquals($expected, $delete);
    }

    public function testDeleteBankByArray(){
          //Vĩnh
          $bankModel = BankModel::getInstance();
          $id = ["5","6"];
          $delete = $bankModel->deleteUserById($this->assertIsArray($id));
          $expected = false;
          $this->assertEquals($expected, $delete);
    }

    public function testDeleteBankNotGood(){
          //Vĩnh
          $bankModel = BankModel::getInstance();
          $id = 10;
          $findID = $bankModel->findBankById($id);
          if(empty($findID)){
                $this->assertTrue(true);
          }
          else{
              $this->assertTrue(false);
          }
    }

    public function testDeleteBankByObject(){
          //Vĩnh
          $bankModel = BankModel::getInstance();
          $id = new UserModel();
          $delete = $bankModel->deleteUserById($this->assertIsObject($id));
          $expected = false;
          $this->assertEquals($expected, $delete);
    }

    //design patter test
    public function testSingletonBankModelGood()
    {
        $bankModel = BankModel::getInstance();
        $bankModel2 = BankModel::getInstance();
        $bankModel->x = 50;
        $bankModel2->x = 100;
        
        $expected_x = 100;
        $actual = $bankModel->x;
        $this->assertEquals($expected_x, $actual);
    }

    public function testSingletonBankModelNotGood(){
        $userModel = new UserModel();
        $userModel2 = new UserModel();
        $userModel->x = 50;
        $userModel2->x = 100;
        $expected_x = 100;
        $actual = $userModel->x;
        $this->assertNotEquals($expected_x, $actual);
    }

    public function testSingletonBankModelEqualObject(){
        $bankModel = BankModel::getInstance();
        $bankModel2 = BankModel::getInstance();
        $expected = true;
        $actual = $bankModel === $bankModel2 ? true : false;
        $this->assertEquals($expected, $actual);
    }

    public function testSingletonBankModel_NotEqualObject(){
        $userModel = new UserModel();
        $userModel2 = new UserModel();
        $expected = false;
        $actual = $userModel === $userModel2 ? true : false;
        $this->assertEquals($expected, $actual);
    }
}
