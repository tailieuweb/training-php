<!-- phpunit --coverage-html coverage -->
<?php

use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     *?Test case Okie
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
     *?Test case Not good
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

    public function testSumPositivevsNegative()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumNegativevsNegative()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    public function testSumNumbervsString()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testSumStringvsString()
    {
        $userModel = new UserModel();
        $a = '1';
        $b = '1';

        $actual = $userModel->sumb($a, $b);

        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testSumIntegervsDouble()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 1.5;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 2.5) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /* ***************************
    ?Start Test function FindUser
    ***************************** */
    public function testFindUserByIdWithInteger()
    {
        $user = new UserModel();
        $id = '1';
        $expected = 'gia nam';
        $actual = $user->findUserById($id);
        // var_dump($actual);
        // die();
        $this->assertEquals($expected, $actual[0]['name']);
    }
    public function testFindUserByIdWithString()
    {
        $user = new UserModel();
        $id = 'hai';
        $actual = $user->findUserById($id);
        if ($actual == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /* 
    ******** 
    ?Name 
    ******* */
    public function testFindUserGoodWithName()
    {
        $user = new UserModel();
        $key = "test2";
        $actual = $user->findUser($key);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithNameNotExit()
    {
        $user = new UserModel();
        $keys = "abc";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithNameSpecialSign()
    {
        $user = new UserModel();
        $keys = "-";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithHalfName()
    {
        $user = new UserModel();
        $keys = "te";
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithReverseName()
    {
        $user = new UserModel();
        $keys = '2test';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithSameName()
    {
        $user = new UserModel();
        $keys = 'test2';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithRedundantName()
    {
        $user = new UserModel();
        $keys = 'test2hai';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    /* 
    ******** 
    ?Email 
    ******* */
    public function testFindUserGoodWithEmail()
    {
        $user = new UserModel();
        $keys = "example2001@gmail.com";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithEmailNotExit()
    {
        $user = new UserModel();
        $keys = "abc@gmail.com";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithEmailSpecialSign()
    {
        $user = new UserModel();
        $keys = "fxnam201@gmail";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithHalfEmail()
    {
        $user = new UserModel();
        $keys = "test2";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithSameEmail()
    {
        $user = new UserModel();
        $keys = 'fxnam201@gmail.com';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithReverseEmail()
    {
        $user = new UserModel();
        $keys = 'gmail.com@';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithRedundantEmail()
    {
        $user = new UserModel();
        $keys = 'fxannguyen201@gmail.com.vn';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    //?Other
    public function testFindUserWithNull()
    {
        $user = new UserModel();
        $keys = "";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithNumber()
    {
        $user = new UserModel();
        $keys = "1";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithSpace()
    {
        $user = new UserModel();
        $keys = " ";
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithAllSpecialSign()
    {
        $user = new UserModel();
        $keys = "%;%;%;";
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithTrueFalse()
    {
        $user = new UserModel();
        $keys = true;
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithPositiveNumber()
    {
        $user = new UserModel();
        $keys = 2;
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithNegativeNumber()
    {
        $user = new UserModel();
        $keys = -2;
        $actual = $user->findUser($keys);
        // var_dump($actual);  
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithDoubleType()
    {
        $user = new UserModel();
        $keys = 2.5;
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithHTMLTag()
    {
        $user = new UserModel();
        $keys = '<p>Hi<p>';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithJsTag()
    {
        $user = new UserModel();
        $keys = '<script>alert("Hi")</script>';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithOtherLanguage()
    {
        $user = new UserModel();
        $keys = 'สวัสดี';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithUppercase()
    {
        $user = new UserModel();
        $keys = 'NGUYỄN THÀNH AN';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testFindUserWithEqualLength()
    {
        $user = new UserModel();
        $keys = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    public function testFindUserWithOverLength()
    {
        $user = new UserModel();
        $keys = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
        $actual = $user->findUser($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(false);
        }
        return $this->assertTrue(true);
    }
    /* ***************************
    ?End Test function FindUser
    ***************************** */
    public function testGetUserGoodWithString()
    {
        $user = new UserModel();
        $params = [];
        $params['keyword'] = 'nam';
        // $expected = "LE VAN LAM";
        $actual = $user->getUsers($params);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testGetUserGoodWithNull()
    {
        $user = new UserModel();
        $keys = "";
        // $expected = "LE VAN LAM";
        $actual = $user->getUsers($keys);
        // var_dump($actual);
        // die();
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testAuthGood()
    {
        $user = new UserModel();
        $username = 'thanh an';
        $password = '1234';
        $actual = $user->auth($username, $password);
        if (!empty($actual)) {
            return $this->assertTrue(true);
        }
        return $this->assertTrue(false);
    }
    public function testDeleteUserByIdGood()
    {
        $user = new UserModel();
        $id = '3';
        $actual = $user->deleteUserById($id);
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    /* ***************************
    ?Start Test function UpdateUser
    ***************************** */
    public function testUpdateUserGood()
    {
        $user = new UserModel();
        $input = array('id' => '1', 'name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example2001@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testUpdateUserWithNotId()
    {
        $user = new UserModel();
        $input = array('id' => '', 'name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($input);
        // die();
        if ($actual != true) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNameNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '', 'fullname' => 'nguyen gia name', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test2', 'fullname' => '', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEmailNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test2', 'fullname' => 'thanh nam', 'email' => '', 'type' => 'admin', 'password' => '1234');
        // var_dump($input);
        // die();
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPasswordNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'admin', 'password' => '');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithTypeNull()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => '', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => 'h6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithTypeDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEmailDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3@$', 'fullname' => 'nguyen gia han', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameDifferenceFormat()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han#%', 'email' => 'example#nam.ul', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'test3', 'fullname' => 'nguyen gia han#%', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ******** 
    ?Test Name 
    *********** */
    public function testUpdateUserWithNameTrueFalse()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => true, 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameInteger()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 1, 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNameDouble()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 1.3, 'fullname' => 'nguyen gia han', 'email' => 'example@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithUppercaseName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'THANH AN', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithOverLengthName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeriakenvaunetradevonneyavondalatarneskcaevontaepreonkeinesceshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeriakenvaunetradevonneyavondalatarneskcaevontaepreonkeinesceshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaa', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaune', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithObjectName()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => $userObject, 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'สวัสดี', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '<b>Hello</b>', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => '<script>alert("HI")</script>', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithPositiveName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 2, 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNegativeName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => -2, 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ********
    ?Test Id 
    *********** */
    public function testUpdateUserWithIdTrueFalse()
    {
        $user = new UserModel();
        $input = array('id' => true, 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdInteger()
    {
        $user = new UserModel();
        $input = array('id' => 6, 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdDouble()
    {
        $user = new UserModel();
        $input = array('id' => 6.3, 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIdNotExit()
    {
        $user = new UserModel();
        $input = array('id' => '10000', 'name' => 'thanh an', 'fullname' => 'nguyen gia han', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithUppercaseId()
    {
        $user = new UserModel();
        $input = array('id' => 'SAU', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOverLengthId()
    {
        $user = new UserModel();
        $input = array('id' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthId()
    {
        $user = new UserModel();
        $input = array('id' => '1234567891', 'name' => 'Thanh An', 'fullname' => 'Thanh An Nguyen', 'email' => 'example205@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithObjectId()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => $userObject, 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageId()
    {
        $user = new UserModel();
        $input = array('id' => 'สวัสดี', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagId()
    {
        $user = new UserModel();
        $input = array('id' => '<b>Hello</b>', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagId()
    {
        $user = new UserModel();
        $input = array('id' => '<script>alert("HI")</script>', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithZeroOnTopId()
    {
        $user = new UserModel();
        $input = array('id' => '06', 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPositiveId()
    {
        $user = new UserModel();
        $input = array('id' => 6, 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNegativeId()
    {
        $user = new UserModel();
        $input = array('id' => -6, 'name' => 'Thanh An', 'fullname' => 'nguyen gia han', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ******** 
    ?Test Fullname 
    *********** */
    public function testUpdateUserWithFullNameTrueFalse()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => true, 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithFullNameInteger()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 12, 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithFullNameDouble()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 12.3, 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithUppercaseFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'NGUYEN GIA HAN', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithOverLengthFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'lenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyr', 'email' => 'example206@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithObjectFullName()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => $userObject, 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'สวัสดี', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => '<b>Hello</b>', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => '<script>alert("HI")</script>', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Th', 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithPositiveFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 6, 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithNegativeFullName()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => -6, 'email' => 'example201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* 
    ******** 
    ?Test Email 
    *********** */
    public function testUpdateUserWithTrueFalseEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => true, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIntegerEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 147, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithDoubleEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 147.23, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithUppercaseEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'NGUYEN GIA HAN', 'email' => 'EXAMPLE201@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithOverLengthEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'examplenendrasamecashaunettethalemeicoles206@gmail.com', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithObjectEmail()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => $userObject, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'สวัสดี', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => '<b>Hello</b>', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => '<script>alert("HI")</script>', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen201', 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPositiveEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 6, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNegativeEmail()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => -6, 'type' => 'user', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /*
     ******** 
     ?Test Type 
     *********** */
    public function testUpdateUserWithTrueFalseType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => true, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithIntegerType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 12, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithDoubleType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 12.3, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithSameType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'thanh an', 'fullname' => 'nguyen gia name', 'email' => 'example200@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    public function testUpdateUserWithUppercaseType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'NGUYEN GIA HAN', 'email' => 'EXAMPLE201@gmail.com', 'type' => 'USER', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOverLengthType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'Rhoshandiatellyneshiaunneveshenkescianneshaimondrischlyndasaccarnaerenquellenendrasamecashaunettethalemeicoleshiwhalhiniveonchellecaundenesheaalausondrilynnejeanetrimyranaekuesaundrilynnezekeri', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithEqualLengthType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'examplenendrasamecashaunettethalemeicoles206@gmail.com', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithObjectType()
    {
        $user = new UserModel();
        $userObject = new UserModel();
        $userObject->listuser = array('an', 'truc');
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => $userObject, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherLanguageType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'สวัสดี', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHTMLTagType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => '<b>Hello</b>', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithJsTagType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => '<script>alert("HI")</sc>', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithHalfType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'use', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithPositiveType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 6, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithNegativeType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => -6, 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    public function testUpdateUserWithOtherType()
    {
        $user = new UserModel();
        $input = array('id' => '6', 'name' => 'Thanh An', 'fullname' => 'Nguyen Gia Han', 'email' => 'fxannguyen888@gmail.com', 'type' => 'guest', 'password' => '1234');
        $actual = $user->updateUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(false);
        } else {
            return $this->assertTrue(true);
        }
    }
    /* ***************************
    ?End Test function UpdateUser
    ***************************** */
    public function testInsertUserGood()
    {
        $user = new UserModel();
        $input = array('name' => 'gia nam', 'fullname' => 'nguyen gia name', 'email' => 'example99@gmail.com', 'type' => 'admin', 'password' => '1234');
        $actual = $user->insertUser($input);
        // var_dump($actual);
        // die();
        if ($actual != false) {
            return $this->assertTrue(true);
        } else {
            return $this->assertFalse(true);
        }
    }
    public function testGetInstanceNull()
    {
        $user = new UserModel();
        $actual = $user->getInstance();
        $actual2 = get_class($actual);
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
    public function testGetInstanceNotNull()
    {
        $user = new UserModel();
        $user1 = new UserModel();
        $user->getInstance();
        $actual = $user1->getInstance();
        $actual2 = get_class($actual);
        $expected = 'UserModel';
        $this->assertEquals($expected, $actual2);
    }
    public function testGetUserHaveNotBank()
    {
        $user = new UserModel();
        $actual = $user->getUserHaveNotBank();
        // var_dump($actual);
        if(!empty($actual)){
            return $this->assertTrue(true);
        }else{
            return $this->assertFalse(true);
        }
    }
}
