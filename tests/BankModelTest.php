<?php
require_once('./models/FactoryPattern.php');
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{
    /////////////////////////// Test getAllBanks//////////////////////////
    /*
    Function:testGetAllBanks()
    Author:Quoc Viet
    */
   
    
    public function testGetAllBanksArrayListOne_Ok() {
        $bankModel = new BankModel();
        $expected = [
            ["id" => "1", 
            "user_id" => "1", 
            "cost" => "0"],
        ] ;

        $actual = $bankModel->getAll();
        $this->assertEquals( $expected[0], $actual[0]);
    }
      /**
    *function testgetBanksAcount_Ok()
    * Author: Quoc Viet
     */
    //get Acount theo so luong
    public function testgetBanksAcount_Ok()
    {
        $bankModel = new BankModel();

        $countAr = 4;
        $actual = $bankModel->getAll();
        // var_dump($actual);die();
        $this->assertEquals($countAr, count($actual));
    }
   /**
    *function testGetAllBanksArrayListEnd_Ok()
    * Author: Quoc Viet
     */
    public function testGetAllBanksArrayListEnd_Ok() {
        $bankModel = new BankModel();
        $expected = [
            ["id" => "105", 
            "user_id" => "2", 
            "cost" => "0"],
        ] ;

        $actual = $bankModel->getAll();
        // var_dump($actual);die();
        $this->assertEquals( $expected[0], $actual[3]);
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
        $input = array(
            'user_id' => "2",
            'cost' => "0",
        );
        //Execute
        $bankModel->insertBankInfo($input);
        //Actual
        $actual = $bankModel->findBankInfoById(2);
        $this->assertEquals($actual[0]['cost'], $input['cost']);
    }
       /**
     *  function testInsertBankInfoByUser_id_Null_Ok()
     * Author: Quoc Viet
    */
    //Test insert bank with user_id = null
    public function testInsertBankInfoByUser_id_Null_Ok()
    {
        $bankModel = new BankModel();
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
    }
    /**
    *function testInsertBankInfoUer_id_character_Ok()
   * Author: Quoc Viet
     */
        //Test insert bank with user_id is character
        public function testInsertBankInfoUer_id_character_Ok()
        {
            $bankModel = new BankModel();
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
        }
       /**
    *function testInsertBanksInfoCostNull_Ok()
   * Author: Quoc Viet
     */

    //Test insert bank with cost = null
    public function testInsertBanksInfoCostNull_Ok()
    {
        $bankModel = new BankModel();
        $input = array(
            'user_id' => 1,
            'cost' => null,
        );
        //Execute
        $bankModel->insertBankInfo($input);
      
        $actual = $bankModel->findBankInfoById(3);
          //Actual
        ($actual[0]['cost'] != null) ? $this->assertTrue(true) : $this->assertTrue(false);
    }
    /**
    *function testInsertBankInfoCostCharacter_Ok()
    * Author: Quoc Viet
     */
        //Test insert bank with cost is character
        public function testInsertBankInfoCostCharacter_Ok()
        {
            $bankModel = new BankModel();
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
    /**
    *function testInsertBankInfoUser_id_ArrayList_Ok()
    * Author: Quoc Viet
     */
         //Test insert bank with user_id is array
    public function testInsertBankInfoUser_id_ArrayList_Ok()
    {
        $bankModel = new BankModel();
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
    }
     /**
    *function testInsertBankInfoCost_ArrayList_Ok()
    * Author: Quoc Viet
     */
    //test insert banks arrayList cost
    public function testInsertBankInfoCost_ArrayList_Ok()
    {
        $bankModel = new BankModel();
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
    }
     /**
    *function testInsertBanksInfoUser_idBy_Object_Ok()
    * Author: Quoc Viet
     */
    //tets insert banks user_id object:
    public function testInsertBanksInfoUser_idBy_Object_Ok()
    {
        $bankModel = new BankModel();
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
    }
    /**
    *function testInsertBanksInfoUseridBy_Object_Ok()
    * Author: Quoc Viet
     */
       //tets insert banks cost object:
       public function testInsertBanksInfoCostBy_Object_Ok()
       {
           $bankModel = new BankModel();
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
       }
    /**
    *function testInsertBanksInfoUserid_CostBy_Object_Ok()
    * Author: Quoc Viet
     */
 //tets insert banks user_id and cost object:
 public function testInsertBanksInfoUserid_CostBy_Object_Ok()
 {
     $bankModel = new BankModel();
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
 }
    /**
    *function testInsertBanksInfoUserid_CostBy_Object_Ok()
    * Author: Quoc Viet
     */
 //tets insert banks user_id and cost object:
 public function testInsertBanksInfo_double_Ok()
 {
     $bankModel = new BankModel();
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
        $params = [];
        $params['keyword'] = '1';
        $countAr = 1;
        $actual = $bankModel->getBanks($params);
        // var_dump($actual);die();
        $this->assertEquals($countAr, count($actual));
    }


    /**
    *function testgetBanksInfoParamNull_Ok()
    * Author: Quoc Viet
     */

  
    public function testgetBanksInfoParamNull_Ok()
    {
        $bankModel = new BankModel();

        $actual = $bankModel->getBanks();

        if ($actual != null) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    
    /**
    *function testgetBanksParam_OK() truyen day du thong tin
    * Author: Quoc Viet
     */
    public function testgetBanksParam_OK()
    {
        $bankModel = new BankModel();
        $keyword = array(
            'keyword' => '4'
        );
        $actual = $bankModel->getBanks($keyword);
        if ($actual != []) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
      /**
    *function testgetBanksParamInfo_Object_OK() 
    * Author: Quoc Viet
     */
    //Test truyen vao object
    public function testgetBanksParamInfo_Object_OK()
    {
        $bankModel = new BankModel();
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
    }
    //test getbanks truyen vao arraylist
    public function testgetBanksParamInfoArrayList_NotOK()
    {
        $bankModel = new BankModel();
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
    }
    //test getbanks truyen vao chuoi rong;
    public function testgetBanksParamInfoCharacter_Empty_NotOK()
    {
        $bankModel = new BankModel();
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
       
    }
      /**
    *function testgetBanksInfoParamDouble_OK() truyen day du thong tin
    * Author: Quoc Viet
     */
    //Truyen du lieu bang kieu so thuc:
    public function testgetBanksInfoParamDouble_notOK()
    {
        $bankModel = new BankModel();
        $keyword = array(
            'keyword' => 1.4,
        );
        $actual = $bankModel->getBanks($keyword);
        $excute = [];
        $this->assertEquals($excute, $actual);
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
        $input = array(
            'id'=>1,
            'user_id' => 1,
            'cost' => "706",
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
    }
    /**
    *function testUpdateBanksInfoCostEmpty_notOk()
    * Author: Quoc Viet
     */
    //test upddate  banks  cost empty
    public function testUpdateBanksInfoCostEmpty_notOk()
    {
        $bankModel = new BankModel();
        $input = array(
            'id'=>1,
            'user_id' => 1,
            'cost' => "",
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
    }
    /**
    *function testUpdateBanksInfoCostString_notOk()
    * Author: Quoc Viet
     */
  //test update banks cost charactor:
  public function testUpdateBanksInfoCostString_notOk()
    {
        $bankModel = new BankModel();
        $input = array(
            'id'=>1,
            'user_id' => 1,
            'cost' => "viet",
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
    }
      /**
    *function testUpdateBanksInfoCostNull_notOk()
    * Author: Quoc Viet
     */
   //test update banks cost null:
    public function testUpdateBanksInfoCostNull_notOk()
    {
        $bankModel = new BankModel();
        $input = array(
            'id'=>2,
            'user_id' =>null,
            'cost' => null,
        );
        $actual = $bankModel->updateBankInfo($input);
        $this->assertTrue($actual);
    }
    /**
    *function testUpdateBanksInfoIdEmpty_notOk()
    * Author: Quoc Viet
     */
    //test upadte banks id array empty:
    public function testUpdateBanksInfoIdEmpty_notOk()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => '',
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBankInfo($input);
        $this->assertEquals(false, $actual);
    }
     /**
    *function testUpdateBanksInfoIdNull_Ok()
    * Author: Quoc Viet
     */
    //test update banks id null
    public function testUpdateBanksInfoIdNull_Ok()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => null,
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBankInfo($input);
        $this->assertEquals(false, $actual);
    }
    /**
    *function testUpdateBanksInfoIdCharacter()
    * Author: Quoc Viet
     */
    //test update banks id character:
    public function testUpdateBanksInfoIdCharacter()
    {
        $bankModel = new BankModel();
        $input = [
            'id' => 'viet',
            'user_id' => '10',
            'cost' => '5000',
            ];
        $actual = $bankModel->updateBankInfo($input);
        $this->assertEquals(false, $actual);
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
         $id=5;
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue($actual);
    }
     /**
    *function testDeleteBanksInfoIdString_Ok()
    * Author: Quoc Viet
     */
    //test delete bank id String
    public function testDeleteBanksInfoIdString_Ok()
    {
        $bankModel = new BankModel();
         $id="viet cute";
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue(true,$actual);
    }
      /**
    *function testDeleteBanksInfoIdNull_Ok()
    * Author: Quoc Viet
     */
    //test delete banks id =null
    public function testDeleteBanksInfoIdNull_Ok()
    {
        $bankModel = new BankModel();
         $id=null;
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue(true,$actual);
    }
       /**
    *function testDeleteBanksInfoCharacterEmpty_Ok()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoCharacterEmpty_Ok()
    {
        $bankModel = new BankModel();
         $id='';
        $actual = $bankModel->deleteBalanceById($id);
        $this->assertTrue(true,$actual);
    }
       /**
    *function testDeleteBanksInfoObject_Ok()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoObject_Ok()
    {  $bankModel = new BankModel();
        $id = $bankModel;
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
          /**
    *function testDeleteBanksInfoDouble_notOk()
    * Author: Quoc Viet
     */
    //test delete banks id double
    public function testDeleteBanksInfoDouble_notOk()
    {  $bankModel = new BankModel();
        $id = 1.2;
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
       /**
    *function testDeleteBanksInfo_character_Special_Ok()
    * Author: Quoc Viet
     */
    public function testDeleteBanksInfo_character_Special_Ok()
    { 
         $bankModel = new BankModel();
        $id ='#$%^$^"';
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
              /**
    *function testDeleteBanksInfoDouble_notOk()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoArrayList_notOk()
    {  $bankModel = new BankModel();
        $id = ["viet"];
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }
                 /**
    *function testDeleteBanksInfoDouble_notOk()
    * Author: Quoc Viet
     */
    //test delete banks id character empty
    public function testDeleteBanksInfoScript_notOk()
    {  $bankModel = new BankModel();
        $id = "<script>1</script>";
        //Execute test
        try {
            $bankModel->deleteBalanceById($d);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
    }

}