<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
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

        $bankModel->startTransaction();
        $deleteBankById = $bankModel->deleteBankById($idBank);

        if(empty($deleteBankById)){
            $this->assertTrue(true);
         }else{
            $this->assertFalse(false);
         }
         
        $bankModel->rollback();
    }

    // test function deleteBankById not good
    public function testDeleteBankByIdNg(){
        $bankModel = new BankModel();
        $idBank = 4;
        $bankModel->startTransaction();
        $deleteBankById = $bankModel->deleteBankById($idBank);

        if(empty($deleteBankById) != 4){
            $this->assertFalse(false);
         }else{
            $this->assertTrue(true);
         }
         $bankModel->rollback();
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
    }
    
    // test function deleteBankById array
    public function testDeleteByIdArray(){
        $bankModel = new BankModel();
        $idBank = array(1,2,3);
        
        try{
            $bankModel->deleteBankById($idBank);
        }catch(Throwable $e){
            $this->assertTrue(True);
        }
    }

    // test function deleteBankById Object
    public function testDeleteByIdObject(){
        $bankModel = new BankModel();
        $idBank = new stdClass();
        
        
        try{
            $bankModel->deleteBankById($idBank);
        }catch(Throwable $e){
            $this->assertTrue(True);
        }
    }
    // test function deleteBankById actual number
    public function testDeleteBankByIdActualNumber()
    {
        $bankModel = new BankModel();
        $idBank = 3.14;
        $deleteBankById = $bankModel->deleteBankById($idBank);

        if (empty($deleteBankById)) {
            $this->assertFalse(false);
        } else {
            $this->assertTrue(True);
        }
    }
    
    // test function deleteBankById negative number
    public function testDeleteBankByIdNegativeNumber()
    {
        $bankModel = new BankModel();
        $idBank = -3;
        $deleteBankById = $bankModel->deleteBankById($idBank);

        if (empty($deleteBankById)) {
            $this->assertFalse(false);
        } else {
            $this->assertTrue(True);
        }
    }
}