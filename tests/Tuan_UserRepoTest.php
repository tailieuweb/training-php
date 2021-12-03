<?php

use PHPUnit\Framework\TestCase;

require_once "models/FactoryPattern.php";

class Tuan_UserRepoTest extends TestCase
{
    public  function testCreateUserAndBankAccountIsOkWithUserTable()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = 1105;
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = '123456';
        $input['fullname'] = "aaaaaaaaaaaa";
        $input['email'] = "katarina@gmail.com";
        $input['type'] = 'admin';
        $input['user_id'] = "" . (intval($userModel->getTheID()) + 1);
        $Repository->create_UserAndBankAccount($input);
        $id_user_recent_create = $userModel->findUserById((intval($userModel->getTheID())))[0]['id'];
        $expected = 7;
        $Repository->rollback();
        $this->assertEquals($expected, $id_user_recent_create);
    }

    public  function testCreateUserAndBankAccountIsOkWithBankTable()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = 1105;
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = '123456';
        $input['fullname'] = "bbbbbbbbbb";
        $input['email'] = "katarina@gmail.com";
        $input['type'] = 'admin';
        $input['user_id'] = "" . (intval($userModel->getTheID()) + 1);
        $Repository->create_UserAndBankAccount($input);
        $data_userid_Bank_recent_create = $Repository->getBankAccountByUserID((int)$userModel->getTheID())[0]['cost'];
        $expected = 1105;
        $Repository->rollback();
        $this->assertEquals($expected, $data_userid_Bank_recent_create);
    }

    public function testCreateUserAndBankAccountJustFullParameterWithCreateUser()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = 123456;
        $input['fullname'] = "tuandeptrai";
        $input['email'] = "katarina@gmail.com";
        $input['type'] = 'admin';
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $this->assertEquals($expected, $actuall);
        $Repository->rollback();
    }

    public function testCreateUserAndBankAccountJustFullParameterWithCreateBank()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $Repository->startTransaction();
        $input['cost'] = 1105;
        $Repository->create_UserAndBankAccount($input);
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $this->assertEquals($expected, $actuall);
        $Repository->rollback();
    }
    public  function testCreateUserAndBankAccountFullParameterButEmailNotRightFormat()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = 1105;
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = 123456;
        $input['fullname'] = "tuandeptrai";
        $input['email'] = "katarina";
        $input['type'] = 'admin';
        $input['user_id'] = "" . (intval($userModel->getTheID()) + 1);
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $this->assertEquals($expected, $actuall);
        $Repository->rollback();
    }
    public  function testCreateUserAndBankAccountFullParameterButEmptySomeField()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = 0;
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = "";
        $input['fullname'] = "";
        $input['email'] = "";
        $input['type'] = '';
        $input['user_id'] = "" . (intval($userModel->getTheID()) + 1);
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $Repository->rollback();
        $this->assertEquals($expected, $actuall);
    }
    public  function testCreateUserAndBankAccountFullParameterNotEmptyButCostNotNumber()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = "abcxyz";
        $input['name'] = "user" . (intval($userModel->getTheID()) + 1);
        $input['password'] = 123456;
        $input['fullname'] = "tuandeptrai";
        $input['email'] = "katarina@gmail.com";
        $input['type'] = 'admin';
        $input['user_id'] = "" . (intval($userModel->getTheID()) + 1);
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $this->assertEquals($expected, $actuall);
        $Repository->rollback();
    }

    public function testCreateUserAndBankAccountFullParameterButIsNull()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = null;
        $input['name'] = null;
        $input['password'] = null;
        $input['fullname'] = null;
        $input['email'] = null;
        $input['type'] = null;
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $this->assertEquals($expected, $actuall);
        $Repository->rollback();
    }

    public function testCreateUserAndBankAccountFullParameterButIsBoolean()
    {
        $factory = new FactoryPattern();
        $Repository =  $factory->make('UserRepository');
        $userModel = UserModel::getInstance();
        $Repository->startTransaction();
        $input['cost'] = true;
        $input['name'] = true;
        $input['password'] = true;
        $input['fullname'] = true;
        $input['email'] = true;
        $input['type'] = true;
        $actuall =  $Repository->create_UserAndBankAccount($input);
        $expected = false;
        $this->assertEquals($expected, $actuall);
        $Repository->rollback();
    }

    //  getBankAccountByUserID()
    public  function  testgetBankAccountByUserIDIsOk()
    {
        $Repo = UserRepository::getInstance();
        $bankAccount = $Repo->getBankAccountByUserID(1)[0]['name'];
        $usermodel = UserModel::getInstance();
        $userdata = $usermodel->findUserById(1)[0]['name'];
        $this->assertEquals($bankAccount, $userdata);
    }

    public  function testgetBankAccountByUserIDWithValueIsNull()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID(null);
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
    public function testgetBankAccountByUserIDWithValueIsEmpty()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID("");
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
    public function testgetBankAccountByUserIDWithValueIsBoolean()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID(true);
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
    public function testgetBankAccountByUserIDWithValueNotNumber()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID("a");
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
    public  function  testgetBankAccountByUserIDWithValueIsDouble()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID(11.5);
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
    public  function  testgetBankAccountByUserIDWithValueIsNegative()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID(-10);
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
    public  function testgetBankAccountByUserIDWithValueIsNaN()
    {
        $Repo = UserRepository::getInstance();
        $actual = $Repo->getBankAccountByUserID(NAN);
        $expected = false;
        $this->assertEquals($actual, $expected);
    }
}
