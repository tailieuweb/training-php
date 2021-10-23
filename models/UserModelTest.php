<?php

class UserModelTest{
    public function testSumOk(){
        $userModel = new UserModel();
        $a = 1;
        $b = 2;
        $expected = 3;

        $actual = $userModel->sumb($a,$b);

        $this->assertEquals($expected,$actual);
    }

    public function testSumNg(){
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a,$b);

        if($actual !=3){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }

    public function testSumStr(){
        
    }
}