<?php
use PHPUnit\Framework\TestCase;

class SingletonPatternTest extends TestCase
{   
    /**
     * Test case singleton User Ok
     */
     public function testMakeUserOk()
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
     * Test case singletonUser  Number
     */
    public function testMakeObject()
    {
        $singleton = new SingletonPattern();
        $model = new stdClass();;
        $expected = 'error';
        $actual = $singleton->make($model);

        $this->assertEquals($expected, $actual);
    }

     /**
     * Test case singleton User Not good
     */
     public function testMakeUserNg()
     {
        $singleton = new SingletonPattern();
        $userModel = new UserModel();

        $user = 'user';

        if($singleton->make('user') != $userModel)
        {
            $this->assertFalse(false);
        }
        else
        {
            $this->assertTrue(true);
        }
     }

     /**
     * Test case singleton Bank Not good
     */
     public function testMakeBankNg()
     {
        $singleton = new SingletonPattern();
        $bankModel = new BankModel();

        $bank = 'bank';

        if($singleton->make('bank') != $bankModel)
        {
            $this->assertFalse(false);
        }
        else
        {
            $this->assertTrue(true);
        }
     }
}