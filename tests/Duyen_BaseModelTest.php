<?php
use PHPUnit\Framework\TestCase;

class BaseModelTest extends TestCase{

  

    public function testSelectOk(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = 9;
        $userId = 3;
        $bank = $bankModel->findBankInfoById($id);
        $actual = $bank[0]['user_id'];
        $this->assertEquals($userId,$actual);
    }
}