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

      $actual = $userModel->sumb($a, $b);

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

      $actual = $userModel->sumb($a, $b);

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

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testSumOkad()
   {
      $userModel = new UserModel();
      $a = -1;
      $b = 2;
      $expected = 1;

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testSumOkDouble()
   {
      $userModel = new UserModel();
      $a = 1.5;
      $b = 2.5;
      $expected = 4;

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testStr()
   {
      $userModel = new UserModel();
      $a = 1;
      $b = 'a';
      $expected = 'error';

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   public function testString()
   {
      $userModel = new UserModel();
      $a = 'a';
      $b = 'b';
      $expected = 'error';

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   /******************************************************************************************** */

   /*
     * Test function: findUser()
     * Author: Long
     */

   //Test find user with valid keyword & return 1 result
   public function testFindUserValid_OK()
   {
      $userModel = new UserModel();
      $keyword = 'test2';
      $actual = $userModel->findUser($keyword);
      // var_dump($actual); die;
      $this->assertEquals($keyword, $actual[0]['name']);
   }
   //Test find user with valid keyword true & return 1 result
   public function testFindUserValid_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test2';
      $actual = $userModel->findUser($keyword);

      if ($actual[0]['name'] != $keyword) {
         $this->assertTrue(false);
      } else {
         $this->assertTrue(true);
      }
   }
   //Test find user with invalid keyword 
   public function testFindUserInvalid_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test5';
      $actual = $userModel->findUser($keyword);
      if ($actual == null) {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
   }
   //Test find user with valid keyword & return multi result 
   public function testFindUserMultiResult_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test';
      $actual = $userModel->findUser($keyword);
      if ($actual[0]['name'] == 'test1' && $actual[1]['name'] == 'test2') {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
   }
   //Test find user with null input
   public function testFindUserNull_OK()
   {
      $userModel = new UserModel();
      $keyword = null;
      $actual = $userModel->findUser($keyword);
      $this->assertEquals($actual, "error");
   }
   //Test find user with keyword is array
   public function testFindUserArray_NG()
   {
      $userModel = new UserModel();
      $keyword = ["long", "kunz"];
      $actual = $userModel->findUser($keyword);
      $this->assertEquals($actual, "error");
   }
   //Test find user with keyword is object
   public function testFindUserObj_NG()
   {
      $userModel = new UserModel();
      $keyword = $userModel;
      $actual = $userModel->findUser($keyword);
      $this->assertEquals($actual, "error");
   }
   //Test find user with keyword is boolean
   public function testFindUserBoolean_NG()
   {
      $userModel = new UserModel();
      $keyword = true;
      $actual = $userModel->findUser($keyword);
      $this->assertEquals($actual, "error");
   }

   //Test find user with keyword is nagetive number
   public function testFindUserNagetive_NG()
   {
      $userModel = new UserModel();
      $keyword = -10;
      $actual = $userModel->findUser($keyword);
      $this->assertEquals([], $actual);
   }
   //Test find user with keyword is float number
   public function testFindUserFloat_NG()
   {
      $userModel = new UserModel();
      $keyword = 10.78;

      $actual = $userModel->findUser($keyword);
      $this->assertEquals([], $actual);
   }
   /******************************************************************************************** */
   /*
     * Test function: updateUser()
     * Author: Long
     */

   //Test update user with valid input ok
   public function testUpdateUser_OK()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = "123";
      $user['id'] = "2";
      $userModel->startTransaction();
      //Excute function
      $userModel->updateUser($user);
      //Get actual
      $actual = $userModel->findUser($user['name']);
      //Compare
      $this->assertEquals($user['name'], $actual[0]['name']);
      $userModel->rollback();
   }
   //Test update user with valid input true
   public function testUpdateUser_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = "123";
      $user['id'] = "2";
      //Excute function
      $userModel->startTransaction();
      $userModel->updateUser($user);
      //Get actual
      $actual = $userModel->findUser($user['name']);
      //Compare
      ($actual[0]['name'] != $user['name']) ? $this->assertTrue(false) : $this->assertTrue(true);
      $userModel->rollback();
   }
   //Test update user with invalid id
   public function testUpdateUserInvalidId_OK()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = "123";
      $user['id'] = "1000";
      //Excute function
      $userModel->startTransaction();
      $userModel->updateUser($user);
      //Actual
      $actual = $userModel->findUserById($user['id']);
      $expected = array();
      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }
   //Test update user without param "name"
   public function testUpdateUserWithoutName_OK()
   {
      $userModel = new UserModel();
      $user['name'] = null;
      $user['password'] = "123";
      $user['id'] = "2";
      //Excute function
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }

   //Test update user with param name is array
   public function testUpdateUserWithArrayName_NG()
   {
      $userModel = new UserModel();
      $user['name'] = ["Long", "Kunz"];
      $user['password'] = "123";
      $user['id'] = "2";
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param password is null
   public function testUpdateUserWithoutPassword_OK()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = null;
      $user['id'] = "2";
      //Execute function
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param password & name is null
   public function testUpdateUserWithNull_OK()
   {
      $userModel = new UserModel();
      $user['name'] = null;
      $user['password'] = null;
      $user['id'] = "2";
      //Execute function
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with all params is null
   public function testUpdateUserWithAllNull_NG()
   {
      $userModel = new UserModel();
      $user['name'] = null;
      $user['password'] = null;
      $user['id'] = null;
      //Execute function
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param name is array
   public function testUpdateUserWithArrayPass_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = ["Long", "Kunz"];
      $user['id'] = "2";
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param name & pass is array
   public function testUpdateUserWithArray_NG()
   {
      $userModel = new UserModel();
      $user['name'] = ["Long", "Kunz"];
      $user['password'] = ["Long", "Kunz"];
      $user['id'] = "2";
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param name is object
   public function testUpdateUserWithObjName_NG()
   {
      $userModel = new UserModel();
      $user['name'] = $userModel;
      $user['password'] = "123";
      $user['id'] = "2";
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param password is object
   public function testUpdateUserWithObjPass_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = $userModel;
      $user['id'] = "2";
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with param name & password is object
   public function testUpdateUserWithObj_NG()
   {
      $userModel = new UserModel();
      $user['name'] = $userModel;
      $user['password'] = $userModel;
      $user['id'] = "2";
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with id is array
   public function testUpdateUserWithArrayId_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = "123";
      $user['id'] = ["2", "3"];
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with all params is object
   public function testUpdateUserWithAllObj_NG()
   {
      $userModel = new UserModel();
      $user['name'] = new stdClass();
      $user['password'] = new stdClass();
      $user['id'] = $userModel;
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with all params is array
   public function testUpdateUserWithAllArr_NG()
   {
      $userModel = new UserModel();
      $user['name'] = ["long", "kunz"];
      $user['password'] = ["long", "kunz"];
      $user['id'] = ["long", "kunz"];
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with id = 0
   public function testUpdateUserWithIdZero_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = "kunz";
      $user['id'] = 0;
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with id is negative number
   public function testUpdateUserWithIdNegative_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = "kunz";
      $user['id'] = -10;
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }
   //Test update user with id is float number
   public function testUpdateUserWithIdFloat_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = "kunz";
      $user['id'] = 10.5;
      $actual = $userModel->updateUser($user);
      $this->assertEquals($actual, "error");
   }

   /******************************************************************************************** */

   /**
    * Test function auth is right
    */
   public function testAuthOk()
   {
      $user = new UserModel();
      $name = "Trinh";
      $pass = "11111";

      $actual = $user->auth($name, $pass);

      if ($actual != true) {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
   }
   /**
    * Test function auth with name worng
    */
   public function testAuthNameNg()
   {
      $user = new UserModel();
      $name = "Trinh";
      $pass = "11111";

      $actual = $user->auth($name, $pass);
      $expected = array();
      $this->assertEquals($expected, $actual);
   }
   /**
    * Test function auth with password worng
    */

   //TEST OF FUNCTION auth
   public function testAuthWithOK()
   {
      $userModel = new UserModel();
      $expected = [
         "name" => "Trinh",
         "fullname" => "lemytrinh",
         "email" => "lemytrinh021@gmail.com",
         "type" => "admin",
         "password" => "b59c67bf196a4758191e42f76670ceba",
      ];
      $name = "Trinh";
      $password = md5("1111");
      $userModel->startTransaction();
      $userModel->insertUser($expected);
      $actual = $userModel->auth($name, $password);
      // var_dump($actual); die;
      $this->assertEquals($expected['name'], $actual[0]['name']);

      $userModel->rollback();
   }
   //
   public function testAuthWithFailed()
   {
      $userModel = new UserModel();
      $expected = [];
      $name = "Trinh";
      $password = "123451232";
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsNumber()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = 1;
      $password = "123451232";
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsNumber()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "Trinh";
      $password = 11123;
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsNumber()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = 3004;
      $password = 1975;
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsArray()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = [];
      $password = "12345";
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsArray()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "pp6";
      $password = [];
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsArray()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = [];
      $password = [];
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsObject()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = new stdClass;
      $password = "12345";
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsObject()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "Trinh";
      $password = new stdClass;
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsObject()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = new stdClass;
      $password = new stdClass;
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithNameIsNull()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = null;
      $password = "12345";
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithPasswordIsNull()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = "Trinh";
      $password = null;
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testAuthWithBothIsNull()
   {
      $userModel = new UserModel();
      $expected = false;
      $name = null;
      $password = null;
      $actual = $userModel->auth($name, $password);
      $this->assertEquals($expected, $actual);
   }
   /******************************************************************************************** */

   /**test luân */
   /**
    * Test case getInstance
    */
   public function testGetInstanceUser()
   {
      $this->assertInstanceOf('UserModel', UserModel::getInstance());
   }
   public function testGetInstance()
   {
      $user = new UserModel();
      $user = new UserModel();
      $actual = $user->getInstance();
      $actual2 = get_class($actual);
      // die();
      $expected = 'UserModel';
      $this->assertEquals($expected, $actual2);
   }
   /******************************************************************************************** */
   // Test truong hop sai
   public function testFindUserByIdNg()
   {
      $UserModel = new UserModel();
      $UserId = 9999;
      $expected = null;

      $User = $UserModel->findUserById($UserId);

      if (empty($User)) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }
   public function testFindUserByIdNegativeNumberNg()
   {
      $userModel = new UserModel();
      $userId = 9999;
      $expected = -999;

      $user = $userModel->findUserById($userId);

      if (empty($user)) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }
   //  // Test trường hợp id là boolean(true/false)
   public function testFindUserByIdIsBoolean()
   {
      $userModel = new UserModel();
      $userId = true;
      $actual = $userModel->findUserById($userId);
      if (empty($actual)) {
         $this->assertTrue(false);
      } else {
         $this->assertTrue(true);
      }
   }

   // //Test find bank by id
   // public function testFindBankByIdOk()
   // {
   //     $bankModel = new BankModel();
   //     $bankId = 2;
   //     $cost = 11;

   //     $bank = $bankModel->findBankById($bankId);
   //     // var_dump($bank);die;
   //     $actual = @$bank[0]['cost'];

   //     $this->assertEquals($cost, $actual);
   // }

   // Test trường hợp id là 1 object
   // public function testFindUserByIdIsObject()
   // {
   //     $bankModel = new BankModel();

   //     $id = new stdClass();
   //     $expected = 'error';
   //     $actual = $bankModel->findBankById($id);

   //     $this->assertEquals($expected, $actual);
   // }
   // Test trường hợp id không tồn tại
   public function testFindUserByIdNotExist()
   {
      $userModel = new UserModel();
      $userId = 50;
      $user = $userModel->findUserById($userId);
      if (empty($user)) {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
   }
   /******************************************************************************************** */
   /**
    * Test case deleteUserByIdOk
    */
   public function testDeleteUserByIdOk()
   {
      $UserModel = new UserModel();
      $UserId = 4;
      $UserModel->startTransaction();
      $deleteUserById = $UserModel->deleteUserById($UserId);

      if (empty($deleteUserById)) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
      $UserModel->rollback();
   }

   // test function deleteUserById not good
   public function testDeleteUserByIdNg()
   {
      $UserModel = new UserModel();
      $UserId = 4;
      $UserModel->startTransaction();
      $deleteUserkById = $UserModel->deleteUserById($UserId);

      if (empty($deleteUserById) != 4) {
         $this->assertFalse(false);
      } else {
         $this->assertTrue(true);
      }
      $UserModel->rollback();
   }
   // test function deleteUserById string
   public function testDeleteByIdString()
   {
      $UserModel = new UserModel();
      $idUser = 'luan';
      $UserModel->startTransaction();
      $deleteUserById = $UserModel->deleteUserById($idUser);

      if (empty($deleteUserById)) {
         $this->assertFalse(false);
      } else {
         $this->assertTrue(True);
      }
      $UserModel->rollback();
   }

   // test function deleteUserById null
   public function testDeleteByIdNull()
   {
      $UserModel = new UserModel();
      $idUser = null;
      $UserModel->startTransaction();
      $deleteUserById = $UserModel->deleteUserById($idUser);

      if (empty($deleteUserById)) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
      $UserModel->rollback();
   }

   // test function deleteUserById array
   public function testDeleteByIdArray()
   {
      $UserModel = new UserModel();
      $idUser = array(1, 2, 3);
      $UserModel->startTransaction();
      try {
         $UserModel->deleteUserById($idUser);
      } catch (Throwable $e) {
         $this->assertTrue(True);
      }
      $UserModel->rollback();
   }

   // test function deleteUserById Object
   public function testDeleteByIdObject()
   {
      $UserModel = new UserModel();
      $idUser = new stdClass();
      $UserModel->startTransaction();

      try {
         $UserModel->deleteUserById($idUser);
      } catch (Throwable $e) {
         $this->assertTrue(True);
      }
      $UserModel->rollback();
   }
   public function testDeleteUserByIdGood()
   {

      $userModel = new UserModel();
      $idUser = '1';
      $userModel->startTransaction();
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
         $this->assertTrue(false);
      } else {
         $this->assertTrue(true);
      }
      $userModel->rollback();
   }
   // Test trường hợp id là số âm
   public function testDeleteUserByIdIsNegativeNumber()
   {
      $userModel = new UserModel();
      $userModel->startTransaction();
      $idUser = -5;

      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
         $this->assertTrue(false);
      } else {
         $this->assertTrue(true);
      }
      $userModel->rollback();
   }
   // Test trường hợp id là số thực
   public function testDeleteUserByIdIsDoubleNumber()
   {
      $userModel = new UserModel();
      $userModel->startTransaction();
      $idUser = 5.5;
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
         $this->assertTrue(false);
      } else {
         $this->assertTrue(true);
      }
      $userModel->rollback();
   }
   // Test trường hợp id là kí tự
   public function testDeleteUserByIdIsCharacters()
   {
      $userModel = new UserModel();
      $idUser = '%%';
      $userModel->startTransaction();
      $user = $userModel->deleteUserById($idUser);
      if (empty($user)) {
         $this->assertTrue(true);
      } else {
         $this->assertTrue(false);
      }
      $userModel->rollback();
   }


   /******************************************************************************************** */

   /*
     * Test function: getUsers()
     * Author: Quyen
     */

   // test function testGetUsers ok
   public function testGetUsersOk()
   {
      $userModel = new UserModel();
      $userName = 'test1';
      $user = $userModel->getUsers($userName);

      $actual = $user[0]['name'];
      $this->assertEquals($userName, $actual);
   }

   //  test function testGetUsers not good
   public function testGetUsersNg()
   {
      $userModel = new UserModel();
      $userName = 'test1';
      $user = $userModel->getUsers($userName);

      $actual = $user[0]['name'];

      if ($userName != $actual) {
         $this->assertFalse(false);
      } else {
         $this->assertTrue(true);
      }
   }

   //  test function getUsers when search ok
   public function testGetUsersWhenSearchOk()
   {
      $userModel = new UserModel();
      $param['keyword'] = 'test1';

      $user = $userModel->getUsers($param);
      if (empty($user)) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   //  test function getUsers when search not good
   public function testGetUsersWhenSearchNg()
   {
      $userModel = new UserModel();
      $param['keyword'] = 'Quyen';

      $user = $userModel->getUsers($param);
      if (empty($user) != $param) {
         $this->assertFalse(false);
      } else {
         $this->assertTrue(true);
      }
   }

   // test function getUsers when search number
   public function testGetUsersWhenSearchNum()
   {
      $userModel = new UserModel();
      $param['keyword'] = 123;

      $user = $userModel->getUsers($param);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search actual number
   public function testGetUsersWhenSearchActualNumber()
   {
      $userModel = new UserModel();
      $param['keyword'] = 3.14;

      $user = $userModel->getUsers($param);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search negative number
   public function testGetUsersWhenSearchNegativeNumber()
   {
      $userModel = new UserModel();
      $param['keyword'] = -3;

      $user = $userModel->getUsers($param);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search null
   public function testGetUsersWhenSearchNull()
   {
      $userModel = new UserModel();
      $param['keyword'] = Null;

      $user = $userModel->getUsers($param);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search array
   public function testGetUsersWhenSearchArray()
   {
      $userModel = new UserModel();
      $param['keyword'] = array();

      $user = $userModel->getUsers($param);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search object
   public function testGetUsersWhenSearchObject()
   {
      $userModel = new UserModel();
      $param['keyword'] = new stdClass();

      try {
         $userModel->getUsers($param);
      } catch (Throwable $e) {
         $this->assertTrue(True);
      }
   }

   // test function getUsers when search true
   public function testGetUsersWhenSearchIsBoolTrue()
   {
      $userModel = new UserModel();
      $param['keyword'] = true;

      $user = $userModel->getUsers($param['keyword']);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }

   // test function getUsers when search false
   public function testGetUsersWhenSearchIsBoolFalse()
   {
      $userModel = new UserModel();
      $param['keyword'] = false;

      $user = $userModel->getUsers($param['keyword']);
      if (empty($user) == $param) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
   }
   /******************************************************************************************** */

   /**
    * Test case insertUser Null Id
    */
   public function testInsertUserNullId()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => null,
         "name" => "",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Double Id
    */
   public function testInsertUserDouble()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => 25.5,
         "name" => "",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Negative Id
    */
   public function testInsertUserNegative()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => -2,
         "name" => "",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Character Id
    */
   public function testInsertUserCharacter()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => '%%%',
         "name" => "",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Array Id
    */
   public function testInsertUserArray()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => array(1, 2, 3),
         "name" => "",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Null Name
    */
   public function testInsertUserNullName()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => "",
         "name" => null,
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Null Fullname
    */
   public function testInsertUserNullFullName()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => "",
         "name" => "",
         "fullname" => null,
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Null Email
    */
   public function testInsertUserNullEmail()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => "",
         "name" => "",
         "fullname" => "",
         "email" => null,
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Null Type
    */
   public function testInsertUserNullType()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => "",
         "name" => "le",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => null,
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser String
    */
   public function testInsertUserStr()
   {
      $userModel = new UserModel();

      $param = array(
         "id" => "abc",
         "name" => "",
         "fullname" => "nguyentanle",
         "email" => "le@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }

   /**
    * Test case insertUser Object
    */
   public function testInsertUserObject()
   {
      $userModel = new UserModel();

      $object = new stdClass();

      $param = array(
         "id" => "",
         "name" => $object,
         "fullname" => $object,
         "email" => $object,
         "type" => $object,
         "password" => $object
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = 'error';

      $this->assertEquals($expected, $actual);
      $userModel->rollback();
   }
   /**
    * Test case insertUser OK
    */
   public function testInsertUserOk()
   {
      $userModel = new UserModel();
      $param = array(
         "id" => 1,
         "name" => "user11",
         "fullname" => "user11",
         "email" => "user11@mail.com",
         "type" => "user",
         "password" => "12345"
      );
      $userModel->startTransaction();
      $actual = $userModel->insertUser($param);
      $expected = false;
      $this->assertEquals($expected, $actual);
      $userModel->rollback();
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
      $userModel->startTransaction();
      $user = $userModel->insertUser($input);
      $expected = $userModel->findUserById(6);
      if ($expected != null) {
         $this->assertTrue(true);
      } else {
         $this->assertFalse(false);
      }
      $userModel->rollback();
   }
}
