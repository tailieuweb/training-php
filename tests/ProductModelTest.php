<?php
use Tests\TestCase;
use App\Product;

class ProductModelTest extends TestCase
{
    public function testFindProductByIdWithOK()
    {
       $ProductModel = Product::getInstance();
       //
       $expected = new stdClass;
       $expected->id = 14;
       $expected->manu_id = 1;
       $expected->protype_id = 2;
       $expected->name = "Black T-shirt woman";
       $expected->pro_image = "faith-yarn-hgtWvsq5e2c-unsplash.jpg";
       $expected->origin = "Japan";
       $expected->price = 1500000;
       $expected->promotion_price = 400000;
       $expected->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nisi turpis, cursus vel fringilla ac, congue sed risus. Sed quis tortor ut quam lobortis commodo. In quis lorem nec urna sagittis vestibulum id ac libero. Sed eu orci eget sapien commodo luctus vitae ac felis. Nam iaculis ut erat vitae tristique. Mauris eget consequat tortor. Nulla fermentum enim non vulputate lobortis.";
       $expected->feature = 1;
       $expected->created_at = "2021-12-06 13:00:36";
       $expected->updated_at = "2021-12-06 13:00:36";
       $id = 14;
       $actual = $ProductModel->getProductById($id);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdNotGood()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $id = 123;
        $actual = $ProductModel->getProductById($id);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdNumberId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $id = -5;
        $actual = $ProductModel->getProductById($id);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdNullId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $actual = $ProductModel->getProductById(null);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdNoData()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $actual = $ProductModel->getProductById(0);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdStringNumberId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $actual = $ProductModel->getProductById("1");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdByStringId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $actual = $ProductModel->getProductById("abcd");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdBySpecialKeyId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $actual = $ProductModel->getProductById("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdByArrayId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $actual = $ProductModel->getProductById([]);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdByObjectId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $key = new stdClass;
        $actual = $ProductModel->getProductById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdByBooleanId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $key = true;
        $actual = $ProductModel->getProductById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdByDoubleId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $key = 1.345;
        $actual = $ProductModel->getProductById($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindProductByIdByFloatId()
    {
        $ProductModel = Product::getInstance();
        $expected = false;
        $key = 1.345;
        $actual = $ProductModel->getProductById($key);
        $this->assertEquals($expected, $actual);
    }
}