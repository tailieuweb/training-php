<?php

use phpDocumentor\Reflection\PseudoTypes\True_;
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
   /***************************************************************/
   /*
     * Test function: findUser()
     * Author: Long
     */
   //Test find user with valid keyword & return 1 result
   public function testFindUserValid_OK()
   {
      $userModel = new UserModel();
      $keyword = 'test1';
      $actual = $userModel->findUser($keyword);
      // var_dump($actual); die;
      $this->assertEquals($keyword, $actual[0]['name']);
   }
   //Test find user with valid keyword true & return 1 result
   public function testFindUserValid_NG()
   {
      $userModel = new UserModel();
      $keyword = 'test1';
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
      // var_dump($actual); die;
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
      // var_dump($actual); die;
      $this->assertEquals($actual[0]['id'], "1");
   }
   //Test find user with keyword is array
   public function testFindUserArray_NG()
   {
      $userModel = new UserModel();
      $keyword = ["long", "kunz"];
      try {
         $userModel->findUser($keyword);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test find user with keyword is object
   public function testFindUserObj_NG()
   {
      $userModel = new UserModel();
      $keyword = $userModel;
      try {
         $userModel->findUser($keyword);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }

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
      // var_dump($actual); die();
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
      $userModel->startTransaction();
      $userModel->updateUser($user);
      //Actual
      $actual = $userModel->findUserById($user['id']);
      $this->assertEquals($actual[0]['name'], null);
      $this->assertEquals($actual[0]['password'], md5("123"));
      $userModel->rollback();
   }

   //Test update user with param name is array
   public function testUpdateUserWithArrayName_NG()
   {
      $userModel = new UserModel();
      $user['name'] = ["Long", "Kunz"];
      $user['password'] = "123";
      $user['id'] = "2";
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with param password is null
   public function testUpdateUserWithoutPassword_OK()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = null;
      $user['id'] = "2";
      //Execute function
      $userModel->startTransaction();
      $userModel->updateUser($user);
      $actual = $userModel->findUserById($user['id']);
      $this->assertEquals($actual[0]['password'], md5(""));
      $userModel->rollback();
   }
   //Test update user with param password & name is null
   public function testUpdateUserWithNull_OK()
   {
      $userModel = new UserModel();
      $user['name'] = null;
      $user['password'] = null;
      $user['id'] = "2";
      //Execute function
      $userModel->startTransaction();
      $userModel->updateUser($user);
      $actual = $userModel->findUserById($user['id']);
      $this->assertEquals($actual[0]['password'], md5(""));
      $this->assertEquals($actual[0]['name'], null);
      $userModel->rollback();
   }
   //Test update user with all params is null
   public function testUpdateUserWithAllNull_NG()
   {
      $userModel = new UserModel();
      $user['name'] = null;
      $user['password'] = null;
      $user['id'] = null;
      //Execute function
      $userModel->startTransaction();
      $actual = $userModel->updateUser($user);
      $actual == false ? $this->assertTrue(true) : $this->assertTrue(false);
      $userModel->rollback();
   }
   //Test update user with param name is array
   public function testUpdateUserWithArrayPass_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "Long";
      $user['password'] = ["Long", "Kunz"];
      $user['id'] = "2";
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with param name & pass is array
   public function testUpdateUserWithArray_NG()
   {
      $userModel = new UserModel();
      $user['name'] = ["Long", "Kunz"];
      $user['password'] = ["Long", "Kunz"];
      $user['id'] = "2";
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with param name is object
   public function testUpdateUserWithObjName_NG()
   {
      $userModel = new UserModel();
      $user['name'] = $userModel;
      $user['password'] = "123";
      $user['id'] = "2";
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with param password is object
   public function testUpdateUserWithObjPass_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = $userModel;
      $user['id'] = "2";
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with param name & password is object
   public function testUpdateUserWithObj_NG()
   {
      $userModel = new UserModel();
      $user['name'] = $userModel;
      $user['password'] = $userModel;
      $user['id'] = "2";
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with id is array
   public function testUpdateUserWithArrayId_NG()
   {
      $userModel = new UserModel();
      $user['name'] = "long";
      $user['password'] = "123";
      $user['id'] = ["2", "3"];
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with all params is object
   public function testUpdateUserWithAllObj_NG()
   {
      $userModel = new UserModel();
      $user['name'] = $userModel;
      $user['password'] = $userModel;
      $user['id'] = $userModel;
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
   //Test update user with all params is array
   public function testUpdateUserWithAllArr_NG()
   {
      $userModel = new UserModel();
      $user['name'] = ["long", "kunz"];
      $user['password'] = ["long", "kunz"];
      $user['id'] = ["long", "kunz"];
      try {
         $userModel->updateUser($user);
      } catch (Throwable $e) {
         $this->assertTrue(true);
      }
   }
}
