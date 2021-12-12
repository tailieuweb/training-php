<?php
use Tests\TestCase;
use App\Customer;

class CustomerModelTest extends TestCase
{
    //TEST OF FUNCTION testFindCustomerByPersonId
    public function testFindCustomerByPersonIdWithOK()
    {
       $customerModel = Customer::getInstance();
       //
       $expected = new stdClass;
       $expected->id = 1;
       $expected->person_id = 1;
       $expected->type = "normal";
       $expected->status = 1;
       $expected->token = "6PPD1ON1RE";
       $expected->created_at = null;
       $expected->updated_at = null;
       $id = 1;
       $actual = $customerModel->getCustomerByPersonId($id);
       $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdNotGood()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $id = 123;
        $actual = $customerModel->getCustomerByPersonId($id);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdNumberId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $id = -5;
        $actual = $customerModel->getCustomerByPersonId($id);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdNullId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $actual = $customerModel->getCustomerByPersonId(null);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdNoData()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $actual = $customerModel->getCustomerByPersonId(0);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdStringNumberId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $actual = $customerModel->getCustomerByPersonId("1");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdByStringId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $actual = $customerModel->getCustomerByPersonId("abcd");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdBySpecialKeyId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $actual = $customerModel->getCustomerByPersonId("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdByArrayId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $actual = $customerModel->getCustomerByPersonId([]);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdByObjectId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $key = new stdClass;
        $actual = $customerModel->getCustomerByPersonId($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdByBooleanId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $key = true;
        $actual = $customerModel->getCustomerByPersonId($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdByDoubleId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $key = 1.345;
        $actual = $customerModel->getCustomerByPersonId($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindCustomerByPersonIdByFloatId()
    {
        $customerModel = Customer::getInstance();
        $expected = false;
        $key = 1.345;
        $actual = $customerModel->getCustomerByPersonId($key);
        $this->assertEquals($expected, $actual);
    }
}