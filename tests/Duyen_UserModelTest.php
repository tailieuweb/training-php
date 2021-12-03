<?php
use PHPUnit\Framework\TestCase;

class Duyen_UserModelTest extends TestCase
{
      /**
     * Test case instance
     */

    public function testGetInstanceCorrect(){
        $expected = false;
        $actual = UserModel::getInstance() instanceof BankModel;
        print_r("\t=> Actual: " . $actual . "\n");
        $this->assertEquals($expected,$actual);
    }
    /**
     * Test case Okie
     */

     

    public function testGetVersionByUserIDOk(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = 2;
        $version = 7;
        $actual = $userModel->getVersionByUserID($userId);
        $this->assertEquals($version,$actual);
    }


  /**
     * Test case Not good
     */
   
     

    /**
     * Test case Id str
     */
    public function testGetVersionByUserIDIsStr(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = 'abc';
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId);
        $this->assertEquals($expected,$actual);
    }

     /**
     * Test case Id empty Str
     */
    public function testGetVersionByUserIDIsEmptyStr(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = '';
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId);
        $this->assertEquals($expected,$actual);
    }
    
    /**
     * Test case Id null
     */
    public function testGetVersionByUserIDIsNull(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = null;
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId);
        $this->assertEquals($expected,$actual);
    }


      /**
     * Test case Id Object
     */

    public function testGetVersionByUserIDObject(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = new stdClass();
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId); 
        $this->assertEquals($expected,$actual);
    }

    
    /**
     * Test case Id arr
     */
    public function testGetVersionByUserIDIsArray(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = [];
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId);
        $this->assertEquals($expected,$actual);
    }

    

    /**
     * Test case id double
     */
    public function testGetVersionByUserIDIsDouble(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = 1.0;
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId); 
        $this->assertEquals($expected,$actual);
    }

      /**
     * Test case id zero
     */
    public function testGetVersionByUserIDIsZero(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = 0;
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId); 
        $this->assertEquals($expected,$actual);
    }


      /**
     * Test case id negative
     */
    public function testGetVersionByUserIDIsNegative(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = -1;
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId); 
        $this->assertEquals($expected,$actual);
    }

    
       /**
     * Test case id is true
     */
    public function testGetVersionByUserIDIsTrue(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = true;
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId); 
        $this->assertEquals($expected,$actual);
    }

     /**
     * Test case id is false
     */
    public function testGetVersionByUserIDIsFalse(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = false;
        $expected = false;
        $actual = $userModel->getVersionByUserID($userId); 
        $this->assertEquals($expected,$actual);
    }
}