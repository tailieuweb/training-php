<?php

use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
     /**
     * Test _construct Function in UserRepository - 'Danh' do this
     */
    // Test case testConstruct
  
    public function testConstruct(){
        $repository = new UserRepository;
        $userModel=$repository->userModel;
        $bankModel=$repository->bankModel;
        $check= 
        is_object($userModel) && get_class($userModel) == 'UserModel' &&
        is_object($bankModel) && get_class($bankModel) == 'BankModel';

        if ($check == true) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
        // Test case testConstructExpectedAndActual
    public function testConstructExpectedAndActual(){
        $repository = new UserRepository;
        $userModel=$repository->userModel;
        $bankModel=$repository->bankModel;
        $actual= 
        is_object($userModel) && get_class($userModel) == 'UserModel' &&
        is_object($bankModel) && get_class($bankModel) == 'BankModel';
        $expected = true;
        $this->assertEquals($expected, $actual);
        
    }
}
