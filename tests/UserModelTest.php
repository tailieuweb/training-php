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

       $this->assertEquals(3, $actual);
    }

    // /**
    //  * Test case Not good
    //  */
    // public function testSumNg()
    // {
    //     $userModel = new UserModel();
    //     $a = 1;
    //     $b = 2;

    //     $actual = $userModel->sumb($a,$b);

    //     if ($actual != 3) {
    //         $this->assertTrue(false);
    //     } else {
    //         $this->assertTrue(true);
    //     }
    // }
    public function testSumOk2()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }
    
    public function testFindUserOk(){
        // $userModel = new UserModel();
        // $user_name = 'user1';
        // $actual = 'user1';
        // $user = $userModel->findUser($user_name);
        // $this->assertEquals($user,$actual);

        $userModel = new UserModel();

        $user_name = 'user1';      
        $mongDoiUsername = 'user1';   
        $keyword = $userModel->findUser($user_name);
        $this->assertEquals($mongDoiUsername, $keyword[0]['name']);
        
    }     
    public function testFindUserByIdOk() {
        $userModel = new UserModel();

        $id = 2;
        $mongDoiUsername = 'user1';

        $user = $userModel->findUserById($id);

        $this->assertEquals($mongDoiUsername, $user[0]['name']);

    }
    public function testFindUserByIdNg() {
        $userModel = new UserModel();

        $id = 999999;


        $user = $userModel->findUserById($id);

        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    
}