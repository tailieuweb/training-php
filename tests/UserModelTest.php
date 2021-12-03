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
    public function testUpdateUserSpecialCharactersNg(){
        $userModel = new UserModel();
        $pattern = '/[0-9A-Za-z]/';
        $user = array(
            'id' => 5,
            'name' => "@#$",
            'fullname' =>'DangDuyHuy',
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(!preg_match($pattern, $user['name'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    public function testUpdateUserFloatNg(){
        $userModel = new UserModel();
        $user = array(
            'id' => 5,
            'name' => 2.5,
            'fullname' =>'DangDuyHuy',
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(is_float($user['name']) || is_float($user['fullname']) || is_float($user['email']) || is_float($user['type']) || is_float($user['password'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
    public function testUpdateUserBool(){
        $userModel = new UserModel();
        $user = array(
            'id' => 74,
            'name' => true,
            'fullname' =>false,
            'email' => 'duyhuy@gmail.com',
            'type' => 'admin',
            'password' => md5('user3')
        );
        $userModel->updateUser($user);
        if(is_bool($user['name']) || is_bool($user['fullname']) || is_bool($user['email']) || is_bool($user['type']) || is_bool($user['password'])){  
            
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }   
    }
}