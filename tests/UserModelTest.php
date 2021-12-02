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

       $actual = $userModel->sumb($a,$b);

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

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testUpdateUserOK(){
        $userModel = new UserModel();
        $user = array(  
            'id' => 5,        
            'name' => 'dangduyhuy',
            'fullname' => 'DangDuyHuy',
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('dangduyhuy')
        );         
        $expected = true;
        $actual = $userModel->updateUser($user);
        $this->assertEquals($actual, $expected);   
    }
    public function testUpdateUserNGNull(){
        $userModel = new UserModel();
        $user = array(
            'id' => '',        
            'name' => '',
            'fullname' => '',
            'type' => '',
            'email' => '',
            'password' => md5('')
        );
        $expected = true;
        $actual = $userModel->updateUser($user);
        $this->assertEquals($expected,$actual); 
        if(!empty($user['name']) && !empty($user['fullname']) && !empty($user['type']) && !empty($user['email']) && !empty($user['password'])){            
            $this->assertTrue(false);
        }else{
            $this->assertTrue(true);
        }   
    }
   
}