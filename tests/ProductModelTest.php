<?php

use PHPUnit\Framework\TestCase;

class ProductModelTest extends TestCase
{
    public function testDeleteProductNG()
    {
        $product = new product();
        $productid = 10.220;
        $excute = null;
        $actual = $product->delete_product($productid);
        if ($actual == false) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
      
    }
        public function testDeleteProductOK()
        {
            $product = new product();
            $id = 107;
            $excute = true;
            $key = $product->delete_product($id);
            $actual = $product->delete_product($id);
    
            if ($key == []) {
                $this->assertTrue(true);
            } else {
                $this->assertEquals($excute, $actual);
            }
        }
        public function testDeleteProductByObject()
    {
        $product = new product();
        $id = new product();
        $delete = $product->delete_product($this->assertIsObject($id));
        $expected = true;
        $this->assertEquals($expected, $delete);
    }
    public function testDeleteProductByArray()
    {
        $product = new product();
        $id = ["sa","as"];
        $delete = $product->delete_product($this->assertIsArray($id));
        $expected = true;
        $this->assertEquals($expected, $delete);
    }
    public function testDeleteProductByID_Double()
    {
        $product = new product();
        $delete = $product->delete_product($this->assertIsFloat(2.5));
        $expected = true;
        $this->assertEquals($expected, $delete);
    }
    public function testDeleteBankByStr()
    {
       
        $product = new product();
        $delete = $product->delete_product('a');
        $expected = true;
        $this->assertEquals($expected, $delete);
    }
    public function testInsertProductOk(){
        $product = new product();
        $product = array(
            'productId' => '155',
            'productName' => 'ULTRABOOST 20 BLACK',
            'catId' => '26',
            'brandId' => '5',
            'size' => '40',
            'price' => '2220',
            'quantity' => '99',
            'image' => '585a64a700.jpg',
            'type' => '1',
            'typdescriptione' => 'CONTROL ON THE EARTH, COMFORTABLE IN EVERY STEP OF RUNNING. Every new day. Every new run. Make the most of it. This high-performance shoe features a foot-hugging knit upper. The seams in the booster are precisely positioned to create support in the right places. Soft elastane heel for a more comfortable grip. Elastic cushioning returns energy to every stride, making it feel like running forever.'
            
        );
        $expected = true; 
        $actual = $product->insert_product($product);
        $this->assertEquals($actual,$expected);   
    }
}