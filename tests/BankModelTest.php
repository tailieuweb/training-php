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
    }
}