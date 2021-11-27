<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testGetVersionByUserIDOk(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = 2;
        $version = 7;
        $user = $userModel->getVersionByUserID($userId);
        $actual = $user[0]['version'];
        $this->assertEquals($version,$actual);
    }

  /**
     * Test case Not good
     */
    public function testGetVersionByUserIDNg(){
        $factory = new FactoryPattern();
        $userModel = $factory->make('user');
        $userId = 10;
        $user = $userModel->getVersionByUserID($userId);
        if(empty($user)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

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