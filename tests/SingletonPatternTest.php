<?php
use PHPUnit\Framework\TestCase;

class SingletonPatternTest extends TestCase
{   
    /**
     * Test case singletonUser Ok
     */
     public function testSingletonUserOK()
     {
         $singleton = new SingletonPattern();
         $userModel = new UserModel();

         $singleton = $singleton->make('user');
         $expected = $userModel;
         $actual = $singleton;

         $this->assertEquals($expected, $actual);
     }

     /**
     * Test case singletonBank Ok
     */
     public function testSingletonBankOK()
     {
         $singleton = new SingletonPattern();
         $bankModel = new BankModel();

         $singleton = $singleton->make('bank');
         $expected = $bankModel;
         $actual = $singleton;

         $this->assertEquals($expected, $actual);
     }

     /**
     * Test case singleton Not good
     */
     public function testSingletonPatternNg()
     {
        $singleton = new SingletonPattern();
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $user = 'user';
        $bank = 'bank';

        if($singleton->make('user') == $userModel && $singleton->make('bank') == $bankModel)
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertFalse(false);
        }
     }
}