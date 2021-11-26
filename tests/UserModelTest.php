<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    public function testGetInstance()
    {
        $actual = UserModel::getInstance();
        $expected = 'UserModel';
        $this->assertInstanceOf($expected, $actual);
    }

    public function testUpdateUserByIdOk()
    {
        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10",
            "submit" => "submit"
        );
        $actual = UserModel::getInstance()->updateUser($param);
        $expected = 1;
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdNotExist()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 150,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "User not exist";
        $this->assertEquals($expected, $actual);
    }

    //empty string
    public function testUpdateUserByIdEmptyString()
    {
        // $userModel = new UserModel();

        $param = array(
            "id" => "",
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = UserModel::getInstance()->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithNameEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 2,
            "name" => "",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithFullNameEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 2,
            "name" => "teo10",
            "fullname" => "",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithEmailEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 2,
            "name" => "teo10",
            "fullname" => "teo10",
            "email" => "",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithTypeEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 2,
            "name" => "teo10",
            "fullname" => "teo10",
            "email" => "teo10@gmail.com",
            "type" => "",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithPasswordEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 2,
            "name" => "teo10",
            "fullname" => "teo10",
            "email" => "teo10@gmail.com",
            "type" => "user",
            "password" => ""
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithAllEmptyString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => "",
            "name" => "",
            "fullname" => "",
            "email" => "",
            "type" => "",
            "password" => ""
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    //string
    public function testUpdateUserByIdWithIdString()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => "",
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    //without 

    public function testUpdateUserByIdWithoutId()
    {
        $userModel = new UserModel();
        $param = array(
            "name" => "teo10",
            "fullname" => "teo10",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithoutName()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => 10,
            "fullname" => "teo10",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithoutFullName()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => 10,
            "name" => "teo10",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithoutEmail()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithoutPassword()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10",
            "email" => "teo10@mail.com",
            "type" => "user",
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }



    public function testUpdateUserByIdWithoutType()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10",
            "email" => "teo10@mail.com",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithoutAllField()
    {
        $userModel = new UserModel();
        $param = array();

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    //null

    public function testUpdateUserByIdNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithNameNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => null,
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithFullnameNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "teo10",
            "fullname" => null,
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithTypeNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => null,
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithPasswordNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => null
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithAllNull()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => null,
            "name" => null,
            "fullname" => null,
            "email" => null,
            "type" => null,
            "password" => null
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    //object
    public function testUpdateUserByIdObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => $obj,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithNameObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => 10,
            "name" => $obj,
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithFullnameObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => $obj,
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithEmailObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => $obj,
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithTypeObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => $obj,
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithPasswordObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => $obj
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithAllObject()
    {
        $userModel = new UserModel();

        $obj = new stdClass;

        $param = array(
            "id" => $obj,
            "name" => $obj,
            "fullname" => $obj,
            "email" => $obj,
            "type" => $obj,
            "password" => $obj
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }
    //boolean


    public function testUpdateUserByIdBoolean()
    {
        $userModel = new UserModel();
        $param = array(
            "id" => true,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithNameBoolean()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => true,
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithFullnameBoolean()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => false,
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithEmailBoolean()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => false,
            "type" => "user",
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithTypeBoolean()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => false,
            "password" => "teo10"
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    public function testUpdateUserByIdWithPasswordBoolean()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => 10,
            "name" => "teo10",
            "fullname" => "teo10 update",
            "email" => "teo10@mail.com",
            "type" => "user",
            "password" => false
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateUserByIdWithAllBoolean()
    {
        $userModel = new UserModel();

        $param = array(
            "id" => true,
            "name" => true,
            "fullname" => true,
            "email" => true,
            "type" => true,
            "password" => true
        );

        $actual = $userModel->updateUser($param);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    /**
     * Method: delete
     * case: 
     * + testDeleteByUserId: Ok everything
     * + testDeleteByUserIdDp: don't have pass parameter userId
     * + testDeleteByUserIdDe: userId doesn't exis 
     * 
     */
    // test case delete_user_by_id ok
    public function testDeleteByUserIdOk($id = 2)
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = 1;
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id have $id is empty string
    public function testDeleteByUserIdEmptyString($id = "")
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id but id doesn't exis 
    public function testDeleteByUserIdNotExis($id = 22)
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "User doesn't exis";
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id have $id is  string
    public function testDeleteByUserIdString($id = "2")
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id have $id is  null
    public function testDeleteByUserIdNull($id = null)
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id have $id is  boolean 
    public function testDeleteByUserIdBoolean($id = true)
    {
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    // test case delete_user_by_id have $id is  object
    public function testDeleteByUserIdObject()
    {
        $id =  new stdClass;
        $userModel = new UserModel();
        $actual = $userModel->deleteUserById($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    /** method: check user exist 
     * param: $id 
     * test case: 
     * + testCheckUserExistOk: user id exist in databse
     * + testCheckUserExistEmpty: param id is empty, return true is passed.
     * + testCheckUserExistString: param id is string, return false is passed
     * + testCheckUserExistEmptyString: param id is emptyString, return false is passed
     * + testCheckUserExistNull: param id is null, return false is passed
     * + testCheckUserExistNg: user id not exist in database
     */
    public function testCheckUserExistOk($id = 11)
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = true;
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistNg($id = 150)
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistEmpty($id = [])
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistString($id = "1234")
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistEmptyString($id = "")
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }

    public function testCheckUserExistNull($id = null)
    {
        $userModel = new UserModel();
        $actual = $userModel->checkUserExist($id);
        $expected = "error";
        $this->assertEquals($expected, $actual);
    }


    
}
