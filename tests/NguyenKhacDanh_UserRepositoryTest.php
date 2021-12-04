<?php

use PHPUnit\Framework\TestCase;

class NguyenKhacDanh_UserRepositoryTest extends TestCase
{

    /**
     * Test _construct Function in UserRepository - 'Danh' do this
     */
    // Test case testConstruct

    public function testConstruct()
    {
        $repository = new UserRepository;
        $userModel = $repository->userModel;
        $bankModel = $repository->bankModel;
        $check =
            is_object($userModel) && get_class($userModel) == 'UserModel' &&
            is_object($bankModel) && get_class($bankModel) == 'BankModel';

        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testConstructExpectedAndActual
    public function testConstructExpectedAndActual()
    {
        $repository = new UserRepository;
        $userModel = $repository->userModel;
        $bankModel = $repository->bankModel;
        $actual =
            is_object($userModel) && get_class($userModel) == 'UserModel' &&
            is_object($bankModel) && get_class($bankModel) == 'BankModel';
        $expected = true;
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test FindById Function in UserRepository - 'Danh' do this
     */
    // Test case testFindByIdOk

    public function testFindByIdOk()
    {
        $repository = new UserRepository;
        $bankModel = new BankModel;
        $userId = -2;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check != false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testFindByIdString
    public function testFindByIdString()
    {
        $repository = new UserRepository;
        $userId = 'Danh';
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testFindByIdObject
    public function testFindByIdObject()
    {
        $repository = new UserRepository;
        $userId = new UserRepository;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testFindByIdNull
    public function testFindByIdNull()
    {
        $repository = new UserRepository;
        $userId = null;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testFindByIdFloat
    public function testFindByIdFloat()
    {
        $repository = new UserRepository;
        $userId = -1.5;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testFindByIdArray
    public function testFindByIdArray()
    {
        $repository = new UserRepository;
        $userId = array();
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testFindByIdSpecial 
    public function testFindByIdSpecial()
    {
        $repository = new UserRepository;
        $userId = '#$$#%%^';
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $check = $repository->findById($userId);
        if ($check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    /**
     * Test deleteUser Function in UserRepository - 'Danh' do this
     */
    // Test case testDeleteUserOk

    public function testDeleteUserOk()
    {
        $repository = new UserRepository;
        $bankModel = new BankModel;
        $bankModel->startTransaction();
        $userId = -2;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $delete = $repository->deleteUser($userId);
        $check = $repository->findById($userId);
        $bankModel->rollBack();
        if ($delete == true && $check == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $repository->deleteUser($userId);
    }
    // Test case testDeleteUserByIdString

    public function testDeleteUserByIdString()
    {
        $repository = new UserRepository;
        $userModel = new UserModel;
        $userModel->startTransaction();
        $userId = 'Danh';
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $delete = $repository->deleteUser($userId);
        $userModel->rollBack();
        if ($delete == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
     // Test case testDeleteUserByIdArray

     public function testDeleteUserByIdArray()
     {
         $repository = new UserRepository;
         $userModel = new UserModel;
         $userModel->startTransaction();
         $userId = array();
         $input = [
             'id' => $userId,
             'name' => 'Danh',
             'fullname' => 'Nguyen Khac',
             'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
             'type' => 'admin',
             'password' => '12345'
         ];
         $repository->insertUserWithId($input);
         $delete = $repository->deleteUser($userId);
         $userModel->rollBack();
         if ($delete == false) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
     // Test case testDeleteUserByIdFloat

     public function testDeleteUserByIdFloat()
     {
         $repository = new UserRepository;
         $userModel = new UserModel;
         $userModel->startTransaction();
         $userId = -1.5;
         $input = [
             'id' => $userId,
             'name' => 'Danh',
             'fullname' => 'Nguyen Khac',
             'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
             'type' => 'admin',
             'password' => '12345'
         ];
         $repository->insertUserWithId($input);
         $delete = $repository->deleteUser($userId);
         $userModel->rollBack();
         if ($delete == false) {
             $this->assertTrue(true);
         } else {
             $this->assertTrue(false);
         }
     }
    // Test case testDeleteUserByIdNull

    public function testDeleteUserByIdNull()
    {
        $repository = new UserRepository;
        $userModel = new UserModel;
        $userModel->startTransaction();
        $userId = null;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $delete = $repository->deleteUser($userId);
        $userModel->rollBack();
        if ($delete == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByIdObject

    public function testDeleteUserByIdObject()
    {
        $repository = new UserRepository;
        $userModel = new UserModel;
        $userModel->startTransaction();
        $userId = new UserModel;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $delete = $repository->deleteUser($userId);
        $userModel->rollBack();
        if ($delete == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByIdSpecial

    public function testDeleteUserByIdSpecial()
    {
        $repository = new UserRepository;
        $userModel = new UserModel;
        $userModel->startTransaction();
        $userId = '#$%%@';
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $delete = $repository->deleteUser($userId);
        $userModel->rollBack();
        if ($delete == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    // Test case testDeleteUserByIdBool

    public function testDeleteUserByIdBool()
    {
        $repository = new UserRepository;
        $userModel = new UserModel;
        $userModel->startTransaction();
        $userId = true;
        $input = [
            'id' => $userId,
            'name' => 'Danh',
            'fullname' => 'Nguyen Khac',
            'email' => 'Nguyenkhacdanh.tdc2019@gmail.com',
            'type' => 'admin',
            'password' => '12345'
        ];
        $repository->insertUserWithId($input);
        $delete = $repository->deleteUser($userId);
        $userModel->rollBack();
        if ($delete == false) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
}
