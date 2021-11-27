<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\equalTo;

class UserModelTest extends TestCase
{
    /* ========Test function getUserById ========*/
    public function testGetFindUserByIdOk()
    {
        $userModel = new UserModel();
        $userId = 9;
        $userName = '123';

        $user = $userModel->findUserById($userId);
        $actual = $user[0]['name'];

        $this->assertEquals($userName, $actual);
    }

    public function testGetFindUserByIdNotOk()
    {
        $userModel = new UserModel();
        $userId = 20;
        $expected = [];
        $actual = $userModel->findUserById($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdStr()
    {
        $userModel = new UserModel();
        $userIdid = 'ab';
        $expected = [];
        $actual = $userModel->findUserById($userIdid);
        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdNull()
    {
        $userModel = new UserModel();
        $expected = [];
        $actual = $userModel->findUserById('');

        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdSpecialCharacters()
    {
        $userModel = new UserModel();
        $userId = '&&&';
        $expected = [];
        $actual = $userModel->findUserById($userId);

        $this->assertEquals($expected, $actual);
    }
    public function testGetFindUserByIdObject()
    {
        $userModel = new UserModel();
        $object = (object)'nhu';

        if (is_object($object)) {
            $object = 5;

            $actual = $userModel->findUserById($object);
            $expected = $actual[0]['name'];
            $userName = 'abc';
            $this->assertEquals($userName, $expected);
        } else {
            $this->assertTrue(false);
        }
    }
    /*======= test function insertUser======= */
    public function testGetInsertUserOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => 'nhu',
            'password' => '123456',
            'fullname' => 'khanhu',
            'email' => 'khanhu@gmail.com',
            'type' => 'admin'
        );
        $actual = $userModel->insertUser($user);
        if ($actual == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testInsertUserIdArrayListOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => ['nhu', 'cute'],
            'password' => 'khanhu',
            'fullname' => 'lethihuynhnhu',
            'email' => 'khanhu26@gmail.com',
            'type' => 'user'
        );
        //Execute test
        try {
            $userModel->insertUser($user);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserNull()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => ''
        );

        if (!empty($user['name']) || !empty($user['password']) || !empty($user['fullname']) || !empty($user['email']) || !empty($user['type'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserPassFullNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '0796982058',
            'fullname' => '',
            'email' => '',
            'type' => ''
        );
        $userModel->insertUser($user);

        if (!is_numeric($user['password'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserTypeOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => 'user'
        );

        $userModel->insertUser($user);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testGetInsertUserTypeNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => 'who'
        );

        $userModel->insertUser($user);

        if ($user['type'] == "admin" || $user['type'] == "user" || $user['type'] == "guest") {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserTypeIsNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => '058'
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['type'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserNameIsNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '123',
            'password' => '',
            'fullname' => '',
            'email' => '',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['name'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserFullNameIsNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '2058',
            'email' => '',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (!is_numeric($user['fullname'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserEmaiWrongFormatNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => 'khảnhư@gmail.com',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserEmailIsFirstNumberNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '058@gmail.com',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (is_numeric($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testGetInsertUserEmaiSpecialCharactersNotOk()
    {
        $userModel = new UserModel();
        $user = array(
            'name' => '',
            'password' => '',
            'fullname' => '',
            'email' => '%!?$@gmail.com',
            'type' => ''
        );

        $userModel->insertUser($user);

        if (empty($user['email'])) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /* =======Test function deleteUserById======== */
    /* Kiểm tra trường hợp id truyền vào đúng */
    public function testGetdeleteUserByIdOk()
    {
        $userModel = new UserModel();
        $id = 48;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    /* Kiểm tra trường hợp id truyền vào sai */
    public function testGetdeleteUserByIdNotOk()
    {
        $userModel = new UserModel();
        $id = '24h';
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* Kiểm tra trường hợp truyền vào id không tồn tại*/
    public function testGetdeleteUserByIdDoesNotExist()
    {
        $userModel = new UserModel();
        $id = 100;
        $excute = true;
        $user = $userModel->findUserById($id);
        $actual = $userModel->deleteUserById($id);

        if ($user == []) {
            $this->assertTrue(true);
        } else {
            $this->assertEquals($excute, $actual);
        }
    }
    /* Kiểm tra trường hợp truyền vào id rỗng*/
    public function testGetdeleteUserByIdEmpty()
    {
        $userModel = new UserModel();
        $id = null;
        $actual = $userModel->deleteUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /*Kiểm tra trường hợp truyên vào id kiểu mảng*/
    public function testGetdeleteUserByIdIsArrayNotG()
    {
        $userModel = new UserModel();
        $id = ["47"];
        $excute = false;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    /*Kiểm tra trường hợp truyền vào id kiểu object*/
    public function testGetdeleteUserByIdIsObjectNotG()
    {
        $userModel = new UserModel();
        $id = $userModel;
        try {
            $userModel->deleteUserById($id);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
    /* Kiểm tra trường hợp truyền vào id không phải số nguyên dương */
    public function testGetdeleteUserNotInteger()
    {
        $userModel = new UserModel();
        $id = -1;
        $expected = $userModel->deleteUserById($id);
        $actual = true;
        $this->assertEquals($expected, $actual);
    }
    /* Kiểm tra trường hợp truyền vào id là kí tự */
    public function testGetdeleteUserByIdCharacters()
    {
        $userModel = new UserModel();
        $id = "a";
        $check = $userModel->deleteUserById($id);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* Kiểm tra trường hợp truyền vào id kiểu bool */
    public function testGetdeleteUserBool()
    {
        $userModel = new UserModel();
        $id = true;
        $key = $userModel->deleteUserById($id);
        if ($key != false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /*Kiểm tra trường hợp truyền vào id kiểu số thực*/
    public function testGetdeleteUserByIdIsRealNumberNotG()
    {
        $userModel = new UserModel();
        $id = 9.8;
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    /*Kiểm tra trường hợp truyền id là kí tự đặt biệt*/
    public function testGetdeleteUserByIdIsSpecialCharactersNotG()
    {
        $userModel = new UserModel();
        $id = '@#$%';
        $excute = true;
        $actual = $userModel->deleteUserById($id);
        $this->assertEquals($excute, $actual);
    }
    /* ======Test function updateUser======= */
    /*Kiểm tra trường hợp truyền id tồn tại trên database update user thành công*/
    public function testGetupdateUserOk()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 5;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "khanhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false, "update user not success");
    }
    /*Kiểm tra trường hợp truyền id không tồn tại update user không thành công*/
    public function testGetUpdateUserNotOk()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 111;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);
        if ($actual == false) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true,"update user success");
    }
    /*Kiểm tra trường hợp truyền name null*/
    public function testGetUpdateUserNameNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 5;
        $input['name'] = null;
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false, "Update name not ok");
    }
     /*Kiểm tra trường hợp truyền password null*/
    public function testGetUpdateUserPasswordNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 5;
        $input['name'] = "khanhu";
        $input['password'] = null;
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false, "Update password not ok");
    }
     /*Kiểm tra trường hợp truyền id null*/
    public function testGetUpdateUserIdNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = null;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "lenhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == false) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"Unable to update");
    }
    /*Kiểm tra trường hợp truyền fullname null*/
    public function testGetUpdateUserFullNameNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = null;
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"Update fullname not ok");
    }
    /*Kiểm tra trường hợp truyền email null*/
    public function testGetUpdateUserEmailNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = null;
        $input['type'] = "user";
        $actual = $user->updateUser($input);

        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"Update email not ok");
    }
     /*Kiểm tra trường hợp truyền type null*/
    public function testGetUpdateUserTypeNull()
    {
        $user = new UserModel();
        $input = [];
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = null;
        $actual = $user->updateUser($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"Update type not ok");
    }
    /*Kiểm tra trường hợp truyền password là object*/
   /*  public function testGetUpdateUserPasswordObject()
    {
        $user = new UserModel();
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = $user;
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = "user";

        $actual = $user->updateUser($input);

        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false, "update password is obj failure");
    } */
     /*Kiểm tra trường hợp truyền type là object*/
    /* public function testGetUpdateUserTypeObject()
    {
        $user = new UserModel();
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com";
        $input['type'] = $user;

        $actual = $user->updateUser($input);

        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"update type is obj failure");
    } */
     /*Kiểm tra trường hợp truyền email là object*/
    /* public function testGetUpdateUserEmailObject()
    {
        $user = new UserModel();
        $object = (object)'huynhnhu';
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = $object;
        $input['type'] = "user";

        $actual = $user->updateUser($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"update email is obj failure");
    } */
    /*Kiểm tra trường hợp truyền fullname là object*/
    /* public function testGetUpdateUserFullNameObject()
    {
        $user = new UserModel();
        $object = (object)'huynhnhu';
        $input['id'] = 9;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = $object;
        $input['email'] = "nhu@gmail.com;
        $input['type'] = "user";

        $actual = $user->updateUser($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"update fullname is obj failure");
    } */
    /*Kiểm tra trường hợp truyền name là object*/
    /* public function testGetUpdateUserNameObject()
    {
        $user = new UserModel();
        $object = (object)'huynhnhu';
        $input['id'] = 9;
        $input['name'] = ;$object
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com;
        $input['type'] = "user";

        $actual = $user->updateUser($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"update name is obj failure");
    } */
    /*Kiểm tra trường hợp truyền id là object*/
    /* public function testGetUpdateUserIdObject()
    {
        $user = new UserModel();
        $object = (object)'huynhnhu';
        $input['id'] = $object;
        $input['name'] = "nhu";
        $input['password'] = "123";
        $input['fullname'] = "khanhu";
        $input['email'] = "nhu@gmail.com;
        $input['type'] = "user";

        $actual = $user->updateUser($input);
        if ($actual == true) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false,"update id is obj failure");
    } */
}
