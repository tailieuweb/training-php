<?php
use PHPUnit\Framework\TestCase;

class WhishlistModelTest extends TestCase
{
    //getWhishlistByUserID
    public function testGetWhishlistByUserIdOk()
    {
        $userId = 48;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistByUserID($userId);
        if(!empty($actual)){
        $this->assertTrue(true);
        }
    }
    public function testGetWhishlistByUserIdNotExist()
    {
        $userId = 26151;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistByUserID($userId);
        //var_dump($actual);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistByUserIdString()
    {
        $userId = 'asdasd';
        $homeModel = new HomeModel();
        $expected = 0;
        $actual = count($homeModel->getWhishlistByUserID($userId));
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdEmpty()
    {
        $userId = '';
        $homeModel = new HomeModel();
        $expected = false;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdObject()
    {
        $userId = new stdClass();
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdBool()
    {
        $userId = true;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdDouble()
    {
        $userId = 46.00000000;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdNull()
    {
        $userId = null;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdStringValueNumber()
    {
        $userId = '48';
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistByUserID($userId);
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistByUserIdNegative()
    {
        $userId = -46;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdArray()
    {
        $userId = ['use_id' => 46];
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    //insertWhishList pro_id = 92 user_id = 25
    public function testInsertWhishlistOk()
    {
        $pro_id = md5(92 . 'chuyen-de-web-2');
        $user_id = 25;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testInsertWhishlistProductIdNotExist()
    {
        $pro_id = md5(9999990 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdString()
    {
        $pro_id = md5('asdasd' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdEmptyOne()
    {
        $pro_id = md5('' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdEmptyTwo()
    {
        $pro_id = '';
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdObject()
    {
        $pro_id = new stdClass();
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdBoolOne()
    {
        $pro_id = true;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdBoolTwo()
    {
        $pro_id = md5(true . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdDouble()
    {
        $pro_id = md5(92.00000000 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdNullOne()
    {
        $pro_id = null;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdNullTwo()
    {
        $pro_id = md5(null . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdStringValueNumber()
    {
        $pro_id = md5('92' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdNegative()
    {
        $pro_id = md5(-90 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistProductIdArray()
    {
        $pro_id = ['pro_id' => '90'];
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertWhishlistUserIdNotExist()
    {
        $pro_id = md5(1000 . 'chuyen-de-web-2');
        $user_id = 21231235;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        //var_dump($actual).die();
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdString()
    {
        $pro_id = md5('asdasd' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdEmptyOne()
    {
        $pro_id = md5('' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdEmptyTwo()
    {
        $pro_id = '';
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdObject()
    {
        $pro_id = new stdClass();
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdBoolOne()
    {
        $pro_id = true;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdBoolTwo()
    {
        $pro_id = md5(true . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdDouble()
    {
        $pro_id = md5(92.00000000 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdNullOne()
    {
        $pro_id = null;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdNullTwo()
    {
        $pro_id = md5(null . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdStringValueNumber()
    {
        $pro_id = md5('92' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdNegative()
    {
        $pro_id = md5(-90 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdArray()
    {
        $pro_id = ['pro_id' => '9000'];
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id, $user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    //deleteWhishList
    public function testDeleteWhishlistIdOk()
    {
        $id = md5(702 . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        if(!empty($actual)){
            $this->assertTrue(true);
        }
    }
    public function testDeleteWhishlistIdNotExist()
    {
        $id = md5(5646546 . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdString()
    {
        $id = md5('asdasd' . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdEmptyOne()
    {
        $id = md5('' . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdEmptyTwo()
    {
        $id = '';
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdObject()
    {
        $id = new stdClass();
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdBoolOne()
    {
        $id = true;
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdBoolTwo()
    {
        $id = md5(true.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdDouble()
    {
        $id = md5(702.0000000000.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdNullOne()
    {
        $id = md5(null.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdNullTwo()
    {
        $id = null;
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdStringValueNumber()
    {
        $id = md5('702'. 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdNegative()
    {
        $id = md5('-143'. 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdArray()
    {
        $id = ['pro_id' => '143'];
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    //getWhishlistExist user_id = 46 , pro_id = 106
    public function testGetWhishlistExistOk()
    {
        $userId = 48;
        $productId = 90;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(!empty($actual)){
            $this->assertTrue(true);
        }
    }
    public function testGetWhishlistExistUserIdNotExist()
    {
        $userId = 13213;
        $productId = 90;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistExistUserIdString()
    {
        $userId = 'ádsad';
        $productId = 96;
        $expected = 0;
        $homeModel = new HomeModel();
        $actual = count($homeModel->getWhishlistExist($userId,$productId));
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdEmpty()
    {
        $userId = '';
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdObject()
    {
        $userId = new stdClass();
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdBool()
    {
        $userId = true;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdDouble()
    {
        $userId = 46.000000000000;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdNull()
    {
        $userId = null;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdStringValueNumber()
    {
        $userId = '48';
        $productId = 106;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistExistUserIdNegative()
    {
        $userId = -46;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdArray()
    {
        $userId = ['user_id' => 46];
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdNotExist()
    {
        $userId = 46;
        $productId = 21313321;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistExistProductIdString()
    {
        $userId = 46;
        $productId = 'adgb';
        $expected = 0;
        $homeModel = new HomeModel();
        $actual = count($homeModel->getWhishlistExist($userId,$productId));
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdEmpty()
    {
        $userId = 46;
        $productId = '';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdObject()
    {
        $userId = 46;
        $productId = new stdClass();
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdBool()
    {
        $userId = 46;
        $productId = true;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdDouble()
    {
        $userId = 46;
        $productId = 90.00000000000000000;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdNull()
    {
        $userId = 46;
        $productId = null;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdStringValueNumber()
    {
        $userId = 48;
        $productId = '106';
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistExistProductIdNegative()
    {
        $userId = 46;
        $productId = -90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdArray()
    {
        $userId = 46;
        $productId = ['pro_id' => 90];
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }

}