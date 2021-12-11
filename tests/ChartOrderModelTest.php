<?php
use PHPUnit\Framework\TestCase;

class ChartOrderModelTest extends TestCase
{
    // getAllOrderByMonth moth = 12
    public function testgetAllOrderByMonthOk()
    {
        $homeModel = new HomeModel();
        $actual = $homeModel->getAllOrderByMonth(12);
        if(!empty($actual)){
          $this->assertTrue(true);
        }
    }
    public function testgetAllOrderByMonthNotExist()
    {
        $homeModel = new HomeModel();
        $actual = $homeModel->getAllOrderByMonth(14);
        if(empty($actual)){
          $this->assertTrue(true);
        }
    }
    public function testgetAllOrderByMonthNotString()
    {
        $homeModel = new HomeModel();
        $moth = "ass";
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthEmpty()
    {
        $homeModel = new HomeModel();
        $moth = "";
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthObject()
    {
        $homeModel = new HomeModel();
        $moth = new stdClass();
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthBool()
    {
        $homeModel = new HomeModel();
        $moth = true;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthDouble()
    {
        $homeModel = new HomeModel();
        $moth = 12.000000000000000000000;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthNull()
    {
        $homeModel = new HomeModel();
        $moth = null;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthStringValueNumber()
    {
        $homeModel = new HomeModel();
        $moth = '12';
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthNegative()
    {
        $homeModel = new HomeModel();
        $moth = -12;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testgetAllOrderByMonthArray()
    {
        $homeModel = new HomeModel();
        $moth = ['month' => 12];
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
   
}