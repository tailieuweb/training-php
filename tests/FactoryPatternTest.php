<?php

use PHPUnit\Framework\TestCase;

class FactoryPatternTest extends TestCase
{
    /**
     * Test case testUpdateBankOk
     */
    public function testUpdateUserFactoryOk()
    {
        $repository = new Repository();
        $id = -1;
        $repository->deleteUserById($id);
        $repository->insertUserWithId($id, "testName1", "testFullName", "testEmail", "testType", "testPassword");
        $user = $repository->findUserById($id);
        $userVersion = $user[0]['version'];
        $input = [
            "id" => $id,
            "name" => "nameUpdate",
            "fullname" => "fullnameUpdate",
            "email" => "emailUpdate",
            "type" => "typeUpdate",
            "password" => "passwordUpdate",
            "version" => $userVersion
        ];
        $userUpdate = $repository->updateUser($input);
        // var_dump($userUpdate);
        // die();
        $check = false;
        if (
            $userUpdate->isSuccess == true &&
            $userUpdate->data == "Đã update thành công" &&
            $userUpdate->error == NULL
        ) {
            $check = true;
        }
        $actual = true;
        $this->assertEquals($check, $actual);
    }
}
