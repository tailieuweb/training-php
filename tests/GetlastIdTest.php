<?php
use PHPUnit\Framework\TestCase;

class GetlastIdTest extends TestCase
{
    /**
     * Test case Okie
     */
    public function testGetLastIdOk() {
        $userModel = new UserModel();
        $expected = '63';
        $userModel->startTransaction();
        $user = $userModel->getLastID();
        $userModel->rollback();
        $actual = $user[0]["MAX(id)"];
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Okie
     */
    public function  testGetLastIdNullOk() {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = $userModel->getLastID();
        $userModel->rollback();
        if(!empty($user[0]["MAX(id)"])) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
       
    }
     /**
     * Test case Not good
     */
    public function  testGetLastIdNg() {
        $userModel = new UserModel();
        $userModel->startTransaction();
        $user = $userModel->getLastID();
        $userModel->rollback();
        // var_dump($user[0]["MAX(id)"]);die();
        if(empty($user[0]["MAX"])) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case Okie
     */
    
}