<?php
use Tests\TestCase;
use App\Protype;

class ProtypeModelTest extends TestCase
{
   //testGetProtypeByTypeId
   //test 
   public function testGetProtypeByTypeIdWithOK()
   {
      $ProtypeModel = new Protype();
      //
      $expected = "Shoes";
      $id = 2;
      $actual = $ProtypeModel->getProtypeByTypeId($id);
      $this->assertEquals($expected, $actual[0]->protype_name);
   }
   //
   public function testGetProtypeByTypeIdNumberId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $id = -5;
       $actual = $ProtypeModel->getProtypeByTypeId($id);
       $this->assertEquals($expected, $actual);
   }
   //a
   public function testGetProtypeByTypeIdNullId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeByTypeId(null);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdNoData()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeByTypeId(0);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdStringNumberId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeByTypeId("1");
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdByStringId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeByTypeId("abcd");
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdBySpecialKeyId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeByTypeId("/**//#@^%$");
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdByArrayId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeByTypeId([]);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdByObjectId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = new stdClass;
       $actual = $ProtypeModel->getProtypeByTypeId($key);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdByBooleanId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = true;
       $actual = $ProtypeModel->getProtypeByTypeId($key);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testGetProtypeByTypeIdByDoubleId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = 1.345;
       $actual = $ProtypeModel->getProtypeByTypeId($key);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testFindProtypeByAccountIdByFloatId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = 1.345;
       $actual = $ProtypeModel->getProtypeByTypeId($key);
       $this->assertEquals($expected, $actual);
   }
   //testGetProtypeByTypeId
   public function testGetProtypeNameByTypeIdWithOK()
   {
      $ProtypeModel = new Protype();
      //
      $expected = new stdClass;
      $expected->id = 3;
      $expected->protype_name = "Hot";
      $expected->type_id = 1;
      $expected->protype_image = "fabio-alves-MNzyXXfnnCg-unsplash.jpg";
      $expected->created_at = null;
      $expected->updated_at = "2021-12-06 12:48:18";
      $id = 3;
      $actual = $ProtypeModel->getProtypeNameById($id);
      $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdNumberId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $id = -5;
       $actual = $ProtypeModel->getProtypeNameById($id);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdNullId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeNameById(null);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdNoData()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeNameById(0);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdStringNumberId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeNameById("1");
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdByStringId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeNameById("abcd");
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdBySpecialKeyId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeNameById("/**//#@^%$");
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdByArrayId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $actual = $ProtypeModel->getProtypeNameById([]);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdByObjectId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = new stdClass;
       $actual = $ProtypeModel->getProtypeNameById($key);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdByBooleanId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = true;
       $actual = $ProtypeModel->getProtypeNameById($key);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testgetProtypeNameByIdByDoubleId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = 1.345;
       $actual = $ProtypeModel->getProtypeNameById($key);
       $this->assertEquals($expected, $actual);
   }
   //
   public function testFindProtypeNameByIdByFloatId()
   {
       $ProtypeModel = new Protype();
       $expected = false;
       $key = 1.345;
       $actual = $ProtypeModel->getProtypeNameById($key);
       $this->assertEquals($expected, $actual);
   }
}