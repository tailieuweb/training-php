<?php
use PHPUnit\Framework\TestCase;

class SingletonPatternTest extends TestCase
{   
    /**
     * Test case singletonUser Ok
     */
     public function testMakeOK()
     {
         $singleton = new SingletonPattern();
         $userModel = new UserModel();

         $singleton = $singleton->make('user');
         $expected = $userModel;
         $actual = $singleton;

         $this->assertEquals($expected, $actual);
     }

     /**
     * Test case singletonUser Null
     */
    public function testMakeNull()
    {
        $singleton = new SingletonPattern();

        $model = '';
        $expected = 'error';
        $actual = $singleton->make($model);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case singletonUser  != user != bank
     */
    public function testMakeKhac()
    {
        $singleton = new SingletonPattern();

        $model = 'le';
        $expected = 'error';
        $actual = $singleton->make($model);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Test case singletonUser  Number
     */
    public function testMakeNumber()
    {
        $singleton = new SingletonPattern();

        $model = 1;
        $expected = 'error';
        $actual = $singleton->make($model);

        $this->assertEquals($expected, $actual);
    }

     /**
     * Test case singleton Not good
     */
     public function testMakeNg()
     {
        $singleton = new SingletonPattern();
        $userModel = new UserModel();
        $bankModel = new BankModel();

        $user = 'user';
        $bank = 'bank';

        if($singleton->make('user') != $userModel && $singleton->make('bank') != $bankModel)
        {
            $this->assertFalse(false);
        }
        else
        {
            $this->assertTrue(true);
        }
     }
}