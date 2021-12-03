<?php
require_once('./models/FactoryPattern.php');
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /*
    File: BankModel.
    Id: 01
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id is OK
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByIdOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '11',
            ]
        ];

        $actual = $bankModel->find(1);
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 02
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is negative number
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_NGN()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();

        $actual = $bankModel->find(-1);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel
    Id: 03
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is string
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_String()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '11',
            ]
        ];

        $actual = $bankModel->find("1");
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel
    Id: 04
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Obj()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $id = new Bank(1, 1, 11);

        $actual = $bankModel->find($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel
    Id: 05
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Null()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $id = null;

        $actual = $bankModel->find($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel
    Id: 06
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_Arr()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $id = ["id" => 1];

        $actual = $bankModel->find($id);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel
    Id: 07
    Function: findBankInfoById($id).
    Desc: Test get bank by bank id with input is not exist
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoById_WithInputIs_NotExist()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();

        $actual = $bankModel->find(100);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 08
    Function: findBankInfoById($id).
    Desc: Test if input is special characters -> unaffected to data of another(user) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testFindBankByID_SpecialChars_AffectedToAnotherModel()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();


        $id = '1";TRUNCATE user;##';
        $action = $bankModel->find($id);

        //Array
        $actual = $userModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
        $bankModel->rollback();
    }


    /*
    File: BankModel.
    Id: 09
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id is OK
    Author: Phuong Nguyen.
    */
    public function findBankInfoByUserIDOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '11',
            ]
        ];

        $actual = $bankModel->findByUserId(1);
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 10
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is negative number
    Author: Phuong Nguyen.
    */
    public function testfindBankInfoByUserID_WithInputIs_NGN()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();

        $actual = $bankModel->findByUserId(-1);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 11
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is string
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_String()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");  
        $bankModel->startTransaction();
        $expected = [
            [
                'id' => '1',
                'user_id' => '1',
                'cost' => '11',
            ]
        ];

        $actual = $bankModel->findByUserId("1");
        $this->assertEquals(
            $expected,
            $actual,
            "Expected and actual not equals"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 12
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is obj
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Obj()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $id = new Bank(1, 1, 11);

        $actual = $bankModel->findByUserId($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 13
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is null
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Null()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $id = null;

        $actual = $bankModel->findByUserId($id);
        $this->assertEmpty(
            $actual,
            "actual is not empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 14
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) is array
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_Arr()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();
        $id = ["id" => 1];

        $actual = $bankModel->findByUserId($id);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 13
    Function: findBankInfoByUserID($user_id).
    Desc: Test get bank by user id with input (user_id) not exists
    Author: Phuong Nguyen.
    */
    public function testFindBankInfoByUserId_WithInputIs_NotExist()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();

        $actual = $bankModel->findByUserId(100);
        $this->assertEmpty(
            $actual,
            "actual is empty"
        );
        $bankModel->rollback();
    }

    /*
    File: BankModel.
    Id: 14
    Function: findBankInfoByUserId($id).
    Desc: Test if input is special characters -> unaffected to data of another(user) model 
    Status: OK
    Author: Phuong Nguyen.
    */
    public function testFindBankByUserID_SpecialChars_AffectedToAnotherModel()
    {
        $factory = new FactoryPattern();
        $userModel = $factory->make("user");
        $bankModel = $factory->make("bank");
        $bankModel->startTransaction();


        $id = '1";TRUNCATE user;##';
        $action = $bankModel->findByUserId($id);

        //Array
        $actual = $userModel->read();
        $this->assertNotEmpty(
            $actual[0],
            "actual is empty"
        );
        $bankModel->rollback();
    }

    /////////////////////////// Test getAllBanks//////////////////////////
    /*
    Function:testGetAllBanks()
    Author:Quoc Viet
    */
   
    
    public function testGetAllBanksArrayListOne_Ok() {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $expected = [
            ["id" => "1", 
            "user_id" => "1", 
            "cost" => "0"],
        ] ;

        $actual = $bankModel->getAll();
        $this->assertEquals( $expected[0], $actual[0]);
        $bankModel->rollback();
    }
      /**
    *function testgetBanksAcount_Ok()
    * Author: Quoc Viet
     */
    //get Acount theo so luong
    public function testgetBanksAcount_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();

        $countAr = 4;
        $actual = $bankModel->getAll();
        // var_dump($actual);die();
        $this->assertEquals($countAr, count($actual));
        $bankModel->rollback();
    }
   /**
    *function testGetAllBanksArrayListEnd_Ok()
    * Author: Quoc Viet
     */
    public function testGetAllBanksArrayListEnd_Ok() {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $expected = [
            ["id" => "105", 
            "user_id" => "2", 
            "cost" => "0"],
        ] ;

        $actual = $bankModel->getAll();
        // var_dump($actual);die();
        $this->assertEquals( $expected[0], $actual[3]);
        $bankModel->rollback();
    }

 /////////////////////////// Test InsertbanksInfo//////////////////////////
      /**
      * function testInsertBankInfo_Invalid_Ok()
     * Author: Quoc Viet
      */

   // Test testInsertBankInfo_Invalid_Ok with valid input
    public function testInsertBankInfo_Invalid_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'user_id' => "2",
            'cost' => "0",
        );
        //Execute
        $bankModel->insertBankInfo($input);
        //Actual
        $actual = $bankModel->findBankInfoById(2);
        $this->assertEquals($actual[0]['cost'], $input['cost']);
        $bankModel->rollback();
    }
       /**
     *  function testInsertBankInfoByUser_id_Null_Ok()
     * Author: Quoc Viet
    */
    //Test insert bank with user_id = null
    public function testInsertBankInfoByUser_id_Null_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'user_id' => null,
            'cost' => "1111",
        );
        //Execute
        $bankModel->insertBankInfo($input);
        //Actual
        $actual = $bankModel->findBankInfoById(5);
        var_dump($actual);
        ($actual[0]['user_id']!=null ) ? $this->assertTrue(true) : $this->assertTrue(false);
        $bankModel->rollback();
    }
    /**
    *function testInsertBankInfoUer_id_character_Ok()
   * Author: Quoc Viet
     */
        //Test insert bank with user_id is character
        public function testInsertBankInfoUer_id_character_Ok()
        {
            $bankModel = new BankModel();
            $bankModel->startTransaction();
            $input = array(
                'user_id' => "Viet",
                'cost' => "1000",
            );
            //Execute test
            $bankModel->insertBankInfo($input);
            //Actual
            // var_dump($actual); die;
            $actual = $bankModel->findBankInfoById(3);
            ($actual[0]['user_id'] != "Viet") ? $this->assertTrue(true) : $this->assertTrue(false);
            $bankModel->rollback();
        }
       /**
    *function testInsertBanksInfoCostNull_Ok()
   * Author: Quoc Viet
     */

    //Test insert bank with cost = null
    public function testInsertBanksInfoCostNull_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'user_id' => 1,
            'cost' => null,
        );
        //Execute
        $bankModel->insertBankInfo($input);
      
        $actual = $bankModel->findBankInfoById(3);
          //Actual
        ($actual[0]['cost'] != null) ? $this->assertTrue(true) : $this->assertTrue(false);
        $bankModel->rollback();
    }
    /**
    *function testInsertBankInfoCostCharacter_Ok()
    * Author: Quoc Viet
     */
        //Test insert bank with cost is character
        public function testInsertBankInfoCostCharacter_Ok()
        {
            $bankModel = new BankModel();
            $bankModel->startTransaction();
            $input = array(
                'user_id' => 1,
                'cost' => "viet",
            );
            //Execute test
            $bankModel->insertBankInfo($input);
            //Actual
            $actual = $bankModel->findBankInfoById(3);
            ($actual[0]['cost'] != "viet") ? $this->assertTrue(true) : $this->assertTrue(false);
        }
        $bankModel->rollback();
    /**
    *function testInsertBankInfoUser_id_ArrayList_Ok()
    * Author: Quoc Viet
     */
         //Test insert bank with user_id is array
    public function testInsertBankInfoUser_id_ArrayList_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'user_id' => ["viet", "cute","nam"],
            'cost' => "meo",
        );
        //Execute test
        try {
            $bankModel->insertBankInfo($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
     /**
    *function testInsertBankInfoCost_ArrayList_Ok()
    * Author: Quoc Viet
     */
    //test insert banks arrayList cost
    public function testInsertBankInfoCost_ArrayList_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'user_id' => 1,
            'cost' => ["viet", "cute"],
        );
        //Execute test
        try {
            $bankModel->insertBankInfo($input);
        } catch (Throwable $e) {
           
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
     /**
    *function testInsertBanksInfoUser_idBy_Object_Ok()
    * Author: Quoc Viet
     */
    //tets insert banks user_id object:
    public function testInsertBanksInfoUser_idBy_Object_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'user_id' => $bankModel,
            'cost' => 2001,
        );

        //Execute test
        try {
            $bankModel->insertBankInfo($input);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
    /**
    *function testInsertBanksInfoUseridBy_Object_Ok()
    * Author: Quoc Viet
     */
       //tets insert banks cost object:
       public function testInsertBanksInfoCostBy_Object_Ok()
       {
           $bankModel = new BankModel();
           $bankModel->startTransaction();
           $input = array(
               'user_id' => 1,
               'cost' => $bankModel,
           );
   
           //Execute test
           try {
               $bankModel->insertBankInfo($input);
           } catch (Throwable $e) {
               $this->assertTrue(true);
           }
           $bankModel->rollback();
       }
    /**
    *function testInsertBanksInfoUserid_CostBy_Object_Ok()
    * Author: Quoc Viet
     */
 //tets insert banks user_id and cost object:
 public function testInsertBanksInfoUserid_CostBy_Object_Ok()
 {
     $bankModel = new BankModel();
     $bankModel->startTransaction();
     $input = array(
         'user_id' => $bankModel,
         'cost' => $bankModel,
     );

     //Execute test
     try {
         $bankModel->insertBankInfo($input);
     } catch (Throwable $e) {
         $this->assertTrue(true);
     }
     $bankModel->rollback();
 }
    /**
    *function testInsertBanksInfoUserid_CostBy_Object_Ok()
    * Author: Quoc Viet
     */
 //tets insert banks user_id and cost object:
 public function testInsertBanksInfo_double_Ok()
 {
     $bankModel = new BankModel();
     $bankModel->startTransaction();
     $input = array(
         'user_id' => 1.3,
         'cost' => 1.3,
     );
     //Execute test
     try {
         $bankModel->insertBankInfo($input);
         $this->assertTrue(true);
     } catch (Throwable $e) {
         $this->assertTrue(false);
     }
     $bankModel->rollback();
 }

        
    /*
     //////////////////////////////////////  getBanks  param ///////////////////////
        
    */

    /**
    *function testgetBaksByKeyWord_count_Ok()
    * Author: Quoc Viet
     */
    //Tets lay dung du lieu va so luong:
    public function testgetBaksByKeyWord_count_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $params = [];
        $params['keyword'] = '1';
        $countAr = 1;
        $actual = $bankModel->getBanks($params);
        // var_dump($actual);die();
        $this->assertEquals($countAr, count($actual));
        $bankModel->rollback();
    }


    /**
    *function testgetBanksInfoParamNull_Ok()
    * Author: Quoc Viet
     */

  
    public function testgetBanksInfoParamNull_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $actual = $bankModel->getBanks();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $bankModel->rollback();
    }
    
    /**
    *function testgetBanksParam_OK() truyen day du thong tin
    * Author: Quoc Viet
     */
    public function testgetBanksParam_OK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $keyword = array(
            'keyword' => '4'
        );
        $actual = $bankModel->getBanks($keyword);
        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
        $bankModel->rollback();
    }
      /**
    *function testgetBanksParamInfo_Object_OK() 
    * Author: Quoc Viet
     */
    //Test truyen vao object
    public function testgetBanksParamInfo_Object_OK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => $bankModel,
        );
        try {
            $actual = $bankModel->getBanks($keyword);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
        $bankModel->rollback();
    }
    //test getbanks truyen vao arraylist
    public function testgetBanksParamInfoArrayList_NotOK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => ['vietnguyen'],
        );
        try {
            $actual = $bankModel->getBanks($keyword);
        } catch (Throwable $e) {
            $excute = false;
        }
        $this->assertEquals($excute, $actual);
        $bankModel->rollback();
    }
    //test getbanks truyen vao chuoi rong;
    public function testgetBanksParamInfoCharacter_Empty_NotOK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $actual = null;

        $keyword = array(
            'keyword' => '',
        );
        try {
            $actual = $bankModel->getBanks($keyword);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $this->assertTrue(true);
        $bankModel->rollback();
       
    }
      /**
    *function testgetBanksInfoParamDouble_OK() truyen day du thong tin
    * Author: Quoc Viet
     */
    //Truyen du lieu bang kieu so thuc:
    public function testgetBanksInfoParamDouble_notOK()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $keyword = array(
            'keyword' => 1.4,
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
        $bankModel->rollback();
    }
// //////////////////////////////////////////////////Update BanksInfo//////////////////////////////////

    /**
    *function testUpdateBanksInfo_Ok()
    * Author: Quoc Viet
     */
    //test update banks ok
    public function testUpdateBanksInfo_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'id'=>1,
            'user_id' => 1,
            'cost' => "706",
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
        $bankModel->rollback();
    }
    /**
    *function testUpdateBanksInfoCostEmpty_notOk()
    * Author: Quoc Viet
     */
    //test upddate  banks  cost empty
    public function testUpdateBanksInfoCostEmpty_notOk()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'id'=>1,
            'user_id' => 1,
            'cost' => "",
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
        $bankModel->rollback();
    }
    /**
    *function testUpdateBanksInfoCostString_notOk()
    * Author: Quoc Viet
     */
  //test update banks cost charactor:
  public function testUpdateBanksInfoCostString_notOk()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'id'=>1,
            'user_id' => 1,
            'cost' => "viet",
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
        $bankModel->rollback();
    }
      /**
    *function testUpdateBanksInfoCostNull_notOk()
    * Author: Quoc Viet
     */
   //test update banks cost null:
    public function testUpdateBanksInfoCostNull_notOk()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = array(
            'id'=>2,
            'user_id' =>null,
            'cost' => null,
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
        $bankModel->rollback();
    }
    /**
    *function testUpdateBanksInfoIdEmpty_notOk()
    * Author: Quoc Viet
     */
    //test upadte banks id array empty:
    public function testUpdateBanksInfoIdEmpty_notOk()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = [
            'id' => '',
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBankInfo($input);
        $this->assertEquals(false, $actual);
        $bankModel->rollback();
    }
     /**
    *function testUpdateBanksInfoIdNull_Ok()
    * Author: Quoc Viet
     */
    //test update banks id null
    public function testUpdateBanksInfoIdNull_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = [
            'id' => null,
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBankInfo($input);
        $this->assertEquals(false, $actual);
        $bankModel->rollback();
    }
    /**
    *function testUpdateBanksInfoIdCharacter()
    * Author: Quoc Viet
     */
    //test update banks id character:
    public function testUpdateBanksInfoIdCharacter()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
        $input = [
            'id' => 'viet',
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBankInfo($input);
        $this->assertEquals(false, $actual);
        $bankModel->rollback();
    }
    
//     //////////////////////////////////////////// Delete BanksInfo//////////////

   /**
    *function testDeleteBanksInfo_Ok()
    * Author: Quoc Viet
     */
    //test delete banks ok
    public function testDeleteBanksInfo_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
         $id=5;
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue($actual);
        $bankModel->rollback();
    }
     /**
    *function testDeleteBanksInfoIdString_Ok()
    * Author: Quoc Viet
     */
    //test delete bank id String
    public function testDeleteBanksInfoIdString_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
         $id="viet cute";
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue(true,$actual);
        $bankModel->rollback();
    }
      /**
    *function testDeleteBanksInfoIdNull_Ok()
    * Author: Quoc Viet
     */
    //test delete banks id =null
    public function testDeleteBanksInfoIdNull_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
         $id=null;
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue(true,$actual);
        $bankModel->rollback();
    }
       /**
    *function testDeleteBanksInfoCharacterEmpty_Ok()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoCharacterEmpty_Ok()
    {
        $bankModel = new BankModel();
        $bankModel->startTransaction();
         $id='';
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue(true,$actual);
        $bankModel->rollback();
    }
       /**
    *function testDeleteBanksInfoObject_Ok()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoObject_Ok()
    {  $bankModel = new BankModel();
        $bankModel->startTransaction();
        $id = $bankModel;
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
          /**
    *function testDeleteBanksInfoDouble_notOk()
    * Author: Quoc Viet
     */
    //test delete banks id double
    public function testDeleteBanksInfoDouble_notOk()
    {  $bankModel = new BankModel();
        $bankModel->startTransaction();
        $id = 1.2;
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
       /**
    *function testDeleteBanksInfo_character_Special_Ok()
    * Author: Quoc Viet
     */
    public function testDeleteBanksInfo_character_Special_Ok()
    { 
         $bankModel = new BankModel();
         $bankModel->startTransaction();
        $id ='#$%^$^"';
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
              /**
    *function testDeleteBanksInfoDouble_notOk()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoArrayList_notOk()
    {  $bankModel = new BankModel();
        $bankModel->startTransaction();
        $id = ["viet"];
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }
                /**
    *function testDeleteBanksInfoDouble_notOk()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoScript_notOk()
    {  $bankModel = new BankModel();
        $bankModel->startTransaction();
        $id = "<script>1</script>";
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $bankModel->rollback();
    }

}
