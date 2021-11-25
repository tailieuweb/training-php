<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdIntegerOk()
  {
    $user = new UserModel();
    $expected = [
      'id' => 2,
      'name' => 'user1',
      'fullname' => 'User1',
      'email' => 'user1@gmail.com',
      'type' => 'user',
      'password' => '47bce5c74f589f4867dbd57e9ca9f808'
    ];
    $actual = $user->findUserById(2);
    $this->assertEquals($expected, $actual[0]);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdIntegerDoesNotExistNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(-1);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdStringNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById("2");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdObjectNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(new stdClass());
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdArrayNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById([]);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdBoolNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(true);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdFloatNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(-1.1);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithIdNullNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById(null);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithoutIdNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById();
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithSpecialCharactersNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById('&"<>', "&'<>");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testFindUserByIdWithSQLInjectionNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->findUserById('" or ""="');
    $this->assertEquals($expected, $actual);
  }
  // auth()
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordStringOk()
  {
    $user = new UserModel();
    $expected = [
      'id' => 11,
      'name' => 'admin',
      'fullname' => 'admin',
      'email' => 'admin@mail.com',
      'type' => 'admin',
      'password' => '21232f297a57a5a743894a0e4a801fc3'
    ];
    $actual = $user->auth("admin", "admin");
    $this->assertEquals($expected, $actual[0]);
  }
  //?--------------------------------------------------------------
  public function testAuthWithEmtpyUserNamePasswordNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("", "");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithEmtpyUserNamePasswordNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", "");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithEmtpyUserNamePasswordNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("", "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordIntegerNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(1, -1);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordIntegerNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", -1);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordIntegerNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(1, "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordFloatNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(1.1, -1.1);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordFloatNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", -1.1);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordFloatNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(1.1, "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordArrayNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth([123], ["aaaa"]);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordArrayNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", ["aaaa"]);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordArrayNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth([123], "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordObjectNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(new stdClass, new stdClass);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordObjectNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", new stdClass);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordObjectNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(new stdClass, "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordNullNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(null, null);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordNullNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", null);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordNullNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(null, "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordBoolNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(true, false);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordBoolNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", false);
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordBoolNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth(true, "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithoutUserNamePasswordNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth();
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordSpecialCharactersNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth('&"<>', "&'<>");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordSpecialCharactersNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", "&'<>");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithUserNamePasswordSpecialCharactersNotGood2()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth('&"<>', "admin");
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithSQLInjectionNotGood()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth('" or ""="', '" or ""="');
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithSQLInjectionNotGood1()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth("admin", '" or ""="');
    $this->assertEquals($expected, $actual);
  }
  //?--------------------------------------------------------------
  public function testAuthWithSQLInjectionNotGood11()
  {
    $user = new UserModel();
    $expected = [];
    $actual = $user->auth('" or ""="', "admin");
    $this->assertEquals($expected, $actual);
  }

  // function testGetUsers
  public function testGetUsers()
  {
    $userModel = new UserModel();
    $params = [];

    $expected = 1;
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }
}
