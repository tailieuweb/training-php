<?php
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
     * Test case Okie
     */
     public function testDeleteBalanceByUserIdOk(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
         $id = 11;
         $userId = 4;
         $bank = $bankModel->findBankInfoById($id);
         $bankDel = $bankModel->deleteBalanceByUserId($userId);
         $actual = $bank[0]['user_id'];
         $this->assertEquals($userId,$actual);

     }

  
    public function testFindBankInfoByIdOk(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = 11;
        $userId = 4;
        $bank = $bankModel->findBankInfoById($id);
        $actual = $bank[0]['user_id'];
        $this->assertEquals($userId,$actual);
       }


       public function testFindBankInfoByUserIdOk(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = 11;
        $userId = 4;
        $bank = $bankModel->findBankInfoByUserId($userId);
        $actual = $bank[0]['id'];
        $this->assertEquals($id,$actual);
       }

      
    /**
     * Test case Not good
     */
    public function testDeleteBalanceByUserIdNg()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 10;
        $bank = $bankModel->deleteBalanceByUserId($userId);

        if (isset($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testFindBankInfoByIdNg(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = 20;
        $bank = $bankModel->findBankInfoById($id);

        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFindBankInfoByUserIdNg(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 15;
        $bank = $bankModel->findBankInfoByUserId($userId);

        if (empty($bank)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

       /**
     * Test case Id Str
     */
    public function testDeleteBalanceByUserIdIsStr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 'edf';
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsStr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = 'abc';
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsStr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 'xyz';
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }

         /**
     * Test case Id empty Str
     */
    public function testDeleteBalanceByUserIdIsEmptyStr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = '';
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsEmptyStr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = '';
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsEmptyStr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = '';
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }

           /**
     * Test case Id Null
     */
    public function testDeleteBalanceByUserIdIsNull(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = null;
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsNull(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = null;
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsNull(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = null;
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }

                /**
     * Test case Id Object
     */
    public function testDeleteBalanceByUserIdIsObject(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = new stdClass();
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsObject(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id =  new stdClass();
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsObject(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = new stdClass();
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }

        /**
     * Test case Id Arr
     */
    public function testDeleteBalanceByUserIdIsArr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = [];
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsArr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id =  [];
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsArr(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = [];
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }

   

       /**
     * Test case id double
     */
   
    public function testDeleteBalanceByUserIdIsDouble(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 8.0;
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsDouble(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id =  4.0;
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsDouble(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 5.0;
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }



        /**
     * Test case id zero
     */
  
     
    public function testDeleteBalanceByUserIdIsZero(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 0;
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsZero(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = 0;
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsZero(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = 0;
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }



      /**
     * Test case id negative
     */
  
     
    public function testDeleteBalanceByUserIdIsNegative(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = -8;
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsNegative(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id =  -4;
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsNegative(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = -5;
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }



     

       /**
     * Test case id is true
     */
  
     
    public function testDeleteBalanceByUserIdIsTrue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = true;
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsTrue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = true;
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsTrue(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = true;
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }


     /**
     * Test case id is false
     */
   
    public function testDeleteBalanceByUserIdIsFalse(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = false;
        $expected = false;
        $actual = $bankModel->deleteBalanceByUserId($userId);
        $this->assertEquals($expected,$actual);
    }
  

    public function testFindBankInfoByIdIsFalse(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $id = false;
        $expected = false;
        $actual = $bankModel->findBankInfoById($id);
        $this->assertEquals($expected,$actual);
       }


       public function testFindBankInfoByUserIdIsFalse(){
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $userId = false;
        $expected = false;
        $actual = $bankModel->findBankInfoByUserId($userId);
        $this->assertEquals($expected,$actual);
       }


}