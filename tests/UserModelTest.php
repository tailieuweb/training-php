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
  // * getuser function start

  // * function testGetUsers string (finish)
  public function testGetUsersString()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = 'Tyga';
    $expected = 1;
    $arrUsers = $userModel->getUsers($params);
    $actual = count($arrUsers);
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers null (finish)
  public function testGetUsersNull()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = null;
    $expected = 14;
    $arrUsers = $userModel->getUsers($params);
    $actual = count($arrUsers);
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers number (finish)
  public function testGetUsersNumber()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = 1;
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers boolean
  public function testGetUsersBoolean()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = true;
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers array
  public function testGetUsersArray()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = ['true'];
    $expected = 'error';
    $arrUsers = $userModel->getUsers($params);
    $actual = $arrUsers;
    $this->assertEquals($expected, $actual);
  }

  // * function testGetUsers empty input
  public function testGetUsersEmptyInput()
  {
    $userModel = new UserModel();
    $params = [];
    $params['keyword'] = '';
    $expected = 14;
    $arrUsers = $userModel->getUsers($params);
    $actual = count($arrUsers);
    $this->assertEquals($expected, $actual);
  }
  // * getuser function end

  // * fuction insertUser start
  /**
   * th đầy đủ thông tin và thông tin hợp lệ
   * th user đã tồn tại
   * th input rỗng
   * th thiếu thông tin 
   * th thông tin không hợp lệ (boolean, null, array)
   */
  // * fuction insertUser input valid
  public function testInsertUserInputValid()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuongnew';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = "123";

    $expected = true;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser input exist
  public function testInsertUserInputIsExist()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong3';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = "123";

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password had white space
  public function testInsertUserPasswordWithSpaces()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong2';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = "1 2 3   ";

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is null 
  public function testInsertUserPasswordIsNull()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong4';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = null;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is boolean 
  public function testInsertUserPasswordIsBoolean()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong5';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = true;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is array 
  public function testInsertUserPasswordIsArray()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong6';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = [];

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is object 
  public function testInsertUserPasswordIsObject()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong7';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = $userModel;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser password is number
  public function testInsertUserPasswordIsNumber()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'thuong8';
    $input['fullname'] = 'tpthuong';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = 1;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without name (finish)
  public function testInsertUserWithoutName()
  {
    $userModel = new UserModel();
    $input = [];
    // $input['name'] = 'thuong';
    $input['fullname'] = 'withoutname';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = '123';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without fullname (finish)
  public function testInsertUserWithoutFullName()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withoutfullname3';
    // $input['fullname'] = 'withoutname';
    $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = '123';

    $expected = true;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without email (finish)
  public function testInsertUserWithoutEmail()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withoutemail3';
    $input['fullname'] = 'withoutemail';
    // $input['email'] = 'email';
    $input['type'] = 'user';
    $input['password'] = '123';

    $expected = true;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without type (finish)
  public function testInsertUserWithoutType()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withouttype';
    $input['fullname'] = 'withouttype';
    $input['email'] = 'email';
    // $input['type'] = 'user';
    $input['password'] = '123';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser without type and email (finish)
  public function testInsertUserWithoutTypeAndEmail()
  {
    $userModel = new UserModel();
    $input = [];
    $input['name'] = 'withouttypeandemail';
    $input['fullname'] = 'withouttype';
    // $input['email'] = 'email';
    // $input['type'] = 'user';
    $input['password'] = '123';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is empty (finish)
  public function testInsertUserWithInputIsEmpty()
  {
    $userModel = new UserModel();
    $input = [];

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is null (finish)
  public function testInsertUserWithInputIsNull()
  {
    $userModel = new UserModel();
    $input = null;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is boolean (finish)
  public function testInsertUserWithInputIsBoolean()
  {
    $userModel = new UserModel();
    $input = true;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is number (finish)
  public function testInsertUserWithInputIsNumber()
  {
    $userModel = new UserModel();
    $input = 1;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is Object (finish)
  public function testInsertUserWithInputIsObject()
  {
    $userModel = new UserModel();
    $input = $userModel;

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser with input is String (finish)
  public function testInsertUserWithInputIsString()
  {
    $userModel = new UserModel();
    $input = 'hello';

    $expected = false;

    $actual = $userModel->insertUser($input);
    $this->assertEquals($expected, $actual);
  }

  // * fuction insertUser end

}
