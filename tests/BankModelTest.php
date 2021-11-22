<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
<<<<<<< HEAD
    //Đặt tên function bắt đầu bằng test nha quý zị
    //Ví dụ: testFindUser()

    /*
     * Test function: deleteBankById()
     * Author: Quyen
     */

    //  test function deleteBankById ok
    public function testDeleteBankByIdOk(){
        $bankModel = new BankModel();
        $idBank = 4;
        $deleteBankById = $bankModel->deleteBankById($idBank);

        if(empty($deleteBankById)){
            $this->assertTrue(true);
         }else{
            $this->assertFalse(false);
         }
    }

    // test function deleteBankById not good
    public function testDeleteBankByIdNg(){
        $bankModel = new BankModel();
        $idBank = 4;
        $deleteBankById = $bankModel->deleteBankById($idBank);

        if(empty($deleteBankById) != 4){
            $this->assertFalse(false);
         }else{
            $this->assertTrue(true);
         }
    }

    // test function deleteBankById string
    public function testDeleteByIdString(){
        $bankModel = new BankModel();
        $idBank = 'quyen';
        $deleteBankById = $bankModel->deleteBankById($idBank);
        
        if(empty($deleteBankById)){
            $this->assertFalse(false);
        }else{
            $this->assertTrue(True);
        }
    }

    // test function deleteBankById null
    public function testDeleteByIdNull(){
        $bankModel = new BankModel();
        $idBank = null;
        $deleteBankById = $bankModel->deleteBankById($idBank);
        
        if(empty($deleteBankById)){
            $this->assertTrue(true);
        }else{
            $this->assertFalse(false);
        }
=======
    /**
     * Test case  findBankById OK
     */
    public function testFindBankByIdOk()
    {
        $bankModel = new BankModel();
        $bankId = 2;
        $cost = 11;

        $bank = $bankModel->findBankById($bankId);
        $actual = $bank[0]['cost'];

        $this->assertEquals($cost, $actual);
    }

     /**
     * Test case findUserById Not good
     */
    public function testFindBankByIdNg()
    {
        $bankModel = new BankModel();
        $bankId = 9999;
        $expected = null;

        $bank = $bankModel->findBankById($bankId);

        if(empty($bank)){
            $this->assertTrue(true);
        }
        else{
            $this->assertFalse(false);
        }
    }

    /**
     * Test case findUserById String
     */
    public function testFindBankByIdStr() 
    {
        $bankModel = new BankModel();
  
        $id = 'abc';
  
  
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
  
        $this->assertEquals($expected, $actual);
  
    }

    /**
     * Test case findUserById Null
     */
    public function testFindBankByIdNull() 
    {
        $bankModel = new BankModel();
        $id = '';
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
  
        $this->assertEquals($expected, $actual);
  
    }

    /**
     * Test case findUserById Object
     */
    public function testFindBankByIdObject() 
    {
        $bankModel = new BankModel();
  
        $id = new stdClass();
        $expected = 'error';
        $actual = $bankModel->findBankById($id);
  
        $this->assertEquals($expected, $actual);
>>>>>>> 1-php-202109/2-groups/9-I/master-phpunit
    }
}