<?php
use PHPUnit\Framework\TestCase;
require_once './models/BankModel.php';

class BankModelTest extends TestCase
{
   public function testFindBankByIdOk() {
      $BankModel = new BankModel();
      
      $id = 2;
      $expected = '1';
      
      $Bank = $BankModel->findBankById($id);        
      $this->assertEquals($expected, $Bank[0]['user_id']);    
   }
            
   public function testFindBankByIdNg() {
      $BankModel = new BankModel();
      
      $id = 999999;
           
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindBankByIdNgAm() {
      $BankModel = new BankModel();
      
      $id = -999999;         
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testFindBankByIdSoThuc() {
      $BankModel = new BankModel();
      
      $id = 11.22;
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankByIdSpecialCharacters() {
      $BankModel = new BankModel();
      
      $id = '[@$]';
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankByIdIsArray() {
      $BankModel = new BankModel();
      
      $id = [];
      
      $Bank = $BankModel->findBankById($id);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankByIdStr() {
      $BankModel = new BankModel();
      
      $id = 'asdf';
      
      
      $expected = 'error';
      $actual = $BankModel->findBankById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testFindBankByIdNull() {
      $BankModel = new BankModel();
      $id = null;
      $expected = 'error';
      $actual = $BankModel->findBankById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testFindBankByIdObject() {
      $BankModel = new BankModel();    
      $id = new stdClass();
      $expected = 'error';
      $actual = $BankModel->findBankById($id);      
      $this->assertEquals($expected, $actual);      
   }
   public function testFindBankOk() {
      $BankModel = new BankModel();
      $key = 2;
      $expected = 2;
      
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($expected, $Bank[0]['user_id']);
      
   }
   public function testFindBankNg() {
      $BankModel = new BankModel();
      
      $key = 999999;
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankNgAm() {
      $BankModel = new BankModel();
      
      $key = -999999;
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankSoThuc() {
      $BankModel = new BankModel();
      
      $key = 11.22;
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankSpecialCharacters() {
      $BankModel = new BankModel();
      
      $key = '[@$]';
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankIsArray() {
      $BankModel = new BankModel();
      
      $key = [];
      
      $Bank = $BankModel->findBank($key);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testFindBankStr() {
      $BankModel = new BankModel();
      
      $key = '3';
               
      $expected = '3';
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
   public function testFindBankNull() {
      $BankModel = new BankModel();
      
      $key = null;
               
      $Bank = $BankModel->findBank($key);
      if ($Bank=='error') {
         $this->assertTrue(true);
         } else {
         $this->assertTrue(false);
         }
   }
   public function testFindBankObject() {
      $BankModel = new BankModel();
      
      $key = new stdClass();
               
      $mongDoi = 'error';
      $Bank = $BankModel->findBank($key);
      
      $this->assertEquals($mongDoi, $Bank);   
   }
   public function testDeleteBankByIdOk() {

      $BankModel = new BankModel();
      
      $id = 13;         
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank=='success') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }            
   }
   public function testDeleteBankByIdNg() {
      $BankModel = new BankModel();
      
      $id = 999999;
      
      
      $del = $BankModel->deleteBankById($id);
      
      if ($del==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
      }
   public function testDeleteBankByIdNgAm() {
      $BankModel = new BankModel();
      
      $id = -999999;         
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testDeleteBankByIdSoThuc() {
      $BankModel = new BankModel();
      
      $id = 11.22;
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteBankByIdSpecialCharacters() {
      $BankModel = new BankModel();
      
      $id = '[@$]';
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteBankByIdIsArray() {
      $BankModel = new BankModel();
      
      $id = [];
      
      $Bank = $BankModel->deleteBankById($id);
      
      if ($Bank==false) {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testDeleteBankByIdStr() {
      $BankModel = new BankModel();
      
      $id = 'asdf';
      
      
      $expected = false;
      $actual = $BankModel->deleteBankById($id);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testDeleteBankByIdNull() {
      $BankModel = new BankModel();
      $id = null;
      $expected = false;
      $actual = $BankModel->deleteBankById($id);
      $this->assertEquals($expected, $actual);   
   }
   
   public function testDeleteBankByIdObject() {
      $BankModel = new BankModel();    
      $id = new stdClass();
      $expected = false;
      $actual = $BankModel->deleteBankById($id);      
      $this->assertEquals($expected, $actual);      
   }
   public function testGetBanksOk() {
      $BankModel = new BankModel();
      
      $expected = '1';
      
      $Bank = $BankModel->getBanks();        
      $this->assertEquals($expected, $Bank[1]['user_id']);    
   }
                  
   public function testGetBanksNg() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 2;
        
      $Bank = $BankModel->getBanks($params);
      $expected = '2';
             
      $this->assertEquals($expected, $Bank[0]['user_id']);      
   }
   public function testGetBanksNgAm() {
      $BankModel = new BankModel();
      
      $params['keyword'] = -999999;
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }     
   }
   public function testGetBanksSoThuc() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 1.1;
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetBanksSpecialCharacters() {
      $BankModel = new BankModel();
      
      $params['keyword'] = '[@$]';
        
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetBanksIsArray() {
      $BankModel = new BankModel();
      
      $params['keyword'] = [];
      
      $Bank = $BankModel->getBanks($params);
      
      if ($Bank=='error') {
      $this->assertTrue(true);
      } else {
      $this->assertTrue(false);
      }
   }
   public function testGetBanksStr() {
      $BankModel = new BankModel();
      
      $params['keyword'] = 'asdf';
      
      
      $expected = 'error';
      $actual = $BankModel->getBanks($params);
      
      $this->assertEquals($expected, $actual);   
   }
   
   
   public function testGetBanksNull() {
      $BankModel = new BankModel();
      $params['keyword'] = null;
      $expected = '1';
      
      $Bank = $BankModel->getBanks($params);        
      $this->assertEquals($expected, $Bank[0]['user_id']);   
   }
   
   public function testGetBanksObject() {
      $BankModel = new BankModel();    
      $params['keyword'] = new stdClass();
      $expected = 'error';
      $actual = $BankModel->getBanks($params);      
      $this->assertEquals($expected, $actual);      
   }
   //_____________________________________/**Test InsertBank */___________________________________________
    /**
     * Test case Ok
     */
    public function testInsertBankOk()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => "1",
            "cost" => "100",
            "ver" => "2",
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with duplicate ID.
     */
    public function testInsertBankUserNgDuplicateId()
    {
        $bankModel = new BankModel();
        $existing_id = $bankModel->getID();
        $param = array(
            "user_id" => $existing_id,
            "cost" => "0",
            "ver" => "",
        );

        $bankModel->insertBank($param);
        $actual = $bankModel->getID();
        $expected = $existing_id + 1;

        print_r("\t=> The last ID before: " . $existing_id  . "\n");
        print_r("\t=> The last ID after: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with null values
     */
    public function testInsertBankUserNgNullValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => null,
            "cost" => null,
            "ver" => null,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with empty string values
     */
    public function testInsertBankUserNgEmptyStringValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "user_id" => "",
            "cost" => "",
            "ver" => "",
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with boolean values
     */
    public function testInsertBankUserNgBooleanValues()
    {
        $bankModel = new BankModel();
        $boolean = true;

        $param = array(
            "user_id" => $boolean,
            "cost" => $boolean,
            "ver" => $boolean,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * Add new user with array values
     */
    public function testInsertBankUserNgArrayValues()
    {
        $bankModel = new BankModel();
        $arr = [1, 5, 8];

        $param = array(
            "user_id" => $arr,
            "cost" => $arr,
            "ver" => $arr,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case:
     * Add new user with  object values
     */
    public function testInsertBankUserNgObjectValues()
    {
        $bankModel = new BankModel();
        $obj = new DtClass();

        $param = array(
            "user_id" => $obj,
            "cost" => $obj,
            "ver" => $obj,
        );

        $actual = $bankModel->insertBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");
        $this->assertEquals($expected, $actual);
    }

    //____________________________/** Test Update Bank */___________________________________________________________

     /**
     * Test case UpdatebankOk
     */
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();

        $param = array(
            "id"  => "4",
            "user_id" => "3",
            "cost" => "5",
            "ver" => "1",
        );

        $actual = $bankModel->updateBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with null values.
     */
    public function testUpdateBankNgNullValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "id"  => null,
            "user_id" => null,
            "cost" => null,
            "ver" => null,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with null values.
     */
    public function testUpdateBankNgEmptyStringValues()
    {
        $bankModel = new BankModel();

        $param = array(
            "id"  => "" ,
            "user_id" => "",
            "cost" => "",
            "ver" => "",
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with  object values.
     */
    public function testUpdateBankNgObjectValues()
    {
        $bankModel = new BankModel();
        $obj = new DtClass();
        $param = array(
            "id"  => $obj ,
            "user_id" => $obj,
            "cost" => $obj,
            "ver" => $obj,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with boolean values.
     */
    public function testUpdateBankNgBooleanValues()
    {
        $bankModel = new BankModel();
        $boolean = true;
        $param = array(
            "id"  => $boolean ,
            "user_id" => $boolean,
            "cost" => $boolean,
            "ver" => $boolean,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 1;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case:
     * update user with  array values..
     */
    public function testUpdateBankNgArrayValues()
    {
        $bankModel = new BankModel();
        $arr = [1, 2, 3, 4, 5];
        $param = array(
            "id"  => $arr ,
            "user_id" => $arr,
            "cost" => $arr,
            "ver" => $arr,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case:
     * update user with  letter values..
     */
    public function testUpdateBankNgLetterValues()
    {
        $bankModel = new BankModel();
        $letter = 'e';
        $param = array(
            "id"  => $letter ,
            "user_id" => $letter,
            "cost" => $letter,
            "ver" => $letter,
        );

        $actual = $bankModel->updateBank($param);
        $expected = 0;

        print_r("\t=> Actual: " . $actual  . "\n");

        $this->assertEquals($expected, $actual);
    }

}