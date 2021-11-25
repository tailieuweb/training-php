<?php
use PHPUnit\Framework\TestCase;
require_once "models/FactoryPattern.php";

class Tuan_BankModelTest extends TestCase
{

    /**
     * Test case Okie
     */
//    public function testSumOk()
//    {
//        $factory = new FactoryPattern();
//       $userModel = $factory->make('user');
//       $a = 1;
//       $b = 2;
//       $expected = 3;
//
//       $actual = $userModel->sumb($a,$b);
//
//       $this->assertEquals($expected, $actual);
//    }

    /**
     * Test case Not good
     */
//   public function testSumNg()
//    {
//        $factory = new FactoryPattern();
//        $userModel = $factory->make('user');
//        $a = 1;
//        $b = 2;
//
//        $actual = $userModel->sumb($a,$b);
//
//        if ($actual != 3) {
//            $this->assertTrue(false);
//        } else {
//            $this->assertTrue(true);
//        }
//    }

    public function testBankAccountisOk()
    {
        $factory = new FactoryPattern();
       $bankModel = $factory->make('bank');
        $BankAccount =  $bankModel->getBankAccounts();
        if (empty($BankAccount)){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }

    public  function testBankAccountwithParameterKeyword(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $params['keyword'] = 'user2';
        $BankAccount =  $bankModel->getBankAccounts($params);
        if (empty($BankAccount)){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }

    public  function testBankAccountWithNoParameter(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $BankAccount =  $bankModel->getBankAccounts();
        if (empty($BankAccount)){
            $this->assertTrue(false);
        }
        else{
            $this->assertTrue(true);
        }
    }

    public  function  testBankAccountisCorrectWithParameter(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $params['keyword'] = 'user2';
        $BankAccount =  $bankModel->getBankAccounts($params);
        $actual = $BankAccount[0]['fullname'];
      $expected = "Nobody";
               $this->assertEquals($expected, $actual);
    }

    public  function  testBankAccountIsEmptyIfParameterNotFind(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $params['keyword'] = 'nobody';
        $BankAccount =  $bankModel->getBankAccounts($params);
        $actual = $BankAccount;
        $expected = [];
        $this->assertEquals($expected, $actual);
    }

    // Test Bank info
    // Check ok
    // Check input but don't have field cost with id
    // Check input have one in two paramater(2 tc)
    // Check Input id don't have in database

    public  function testUpdateBankInfoIsOk()
    {

        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $bankModel->startTransaction();
        $input['cost'] = 1105;
        $input['id'] = 10;
        $bankModel->updateBankInfo($input);
        $params['keyword'] = 'user1';
        $actual =  $bankModel->getBankAccounts($params)[0]['cost'];
        $expected = 1105;
        $this->assertEquals($expected, $actual);
        $bankModel->rollback();
    }


    public  function  testUpdateBankNotHaveCostAndId(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input = [];
      $actual =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected, $actual);
    }

    public  function testUpdateBankHaveJustCostNotHaveID(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['cost'] = 1105;
      $returndata =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected,$returndata);

    }
    public  function  testUpdateBankHaveJusIdNotHaveCost(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['cost'] = 1105;
        $returndata =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected,$returndata);
    }



     // Không update cái nào  nên vẫn ok
    public  function  testUpdateBankHaveIdNotFound(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['cost'] = 1105;
        $input['id'] = 0;
        $bankModel->updateBankInfo($input);
        $params['keyword'] = 'user1';
        $actual =  $bankModel->getBankAccounts($params)[0]['cost'];
        $expected = 111000;
        $this->assertEquals($expected, $actual);
    }

    public  function  testUpdateBankWithIdIsNotNumber(){

        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['cost'] = 1105;
        $input['id'] = 'a';
        $returndata =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected,$returndata);
    }


    public  function testUpdateBankWithIdIsNullValue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['cost'] = 1105;
        $input['id'] = null;
        $returndata =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected,$returndata);
    }

    // Không update giá trị nào
    public  function  testUpdateBankWithIdIsDoubleValue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $bankModel->startTransaction();
        $input['cost'] = 1105;
        $input['id'] = 11.2;
        $returndata =   $bankModel->updateBankInfo($input);
        $params['keyword'] = 'user1';
        $actual =  $bankModel->getBankAccounts($params)[0]['cost'];
        $expected = 111000;
        $this->assertEquals($expected,$returndata);
        $bankModel->rollback();
    }
    public  function  testUpdateBankWithCostIsNotNumber(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['cost'] = 'aa';
        $input['id'] = 9;
        $returndata =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected,$returndata);
    }


    public  function testUpdateBankWithCostIsNullValue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['id'] = 9;
        $input['cost'] = null;
        $returndata =   $bankModel->updateBankInfo($input);
        $expected = false;
        $this->assertEquals($expected,$returndata);
    }

    public  function  testUpdateBankWithCostIsDoubleValue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $bankModel->startTransaction();
        $input['cost'] = 11.2;
        $input['id'] = 9;
        $bankModel->updateBankInfo($input);
        $params['keyword'] = 'user3';
        $actual =  $bankModel->getBankAccounts($params)[0]['cost'];
        $expected = 11.2;
        $this->assertEquals($expected,$actual);
        $bankModel->rollback();
    }








}