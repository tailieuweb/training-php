<?php
use Tests\TestCase;
use App\Person;

class PersonModelTest extends TestCase
{
    //TEST OF FUNCTION testFindPersonByAccountId
    public function testFindPersonByAccountIdWithOK()
    {
       $PersonModel = Person::getInstance();
       //
       $expected = new stdClass;
       $expected->id = 1;
       $expected->account_id = 1;
       $expected->full_name = "Nguyễn Hữu Thắng";
       $expected->gender = "Male";
       $expected->address = "K3, Tân Hiệp, Kiên Giang";
       $expected->date_of_birth = "2000-01-01";
       $expected->phone = "0844370344";
       $expected->email = "nguyenhuuthang12c8@gmail.com";
       $expected->created_at = null;
       $expected->updated_at = null;
       $id = 1;
       $actual = $PersonModel->getPersonByAccountId($id);
       $this->assertEquals($expected, $actual);
    }
    // test not ok
    public function testFindPersonByAccountIdNotGood()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $id = 123;
        $actual = $PersonModel->getPersonByAccountId($id);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdNumberId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $id = -5;
        $actual = $PersonModel->getPersonByAccountId($id);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdNullId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $actual = $PersonModel->getPersonByAccountId(null);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdNoData()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $actual = $PersonModel->getPersonByAccountId(0);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdStringNumberId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $actual = $PersonModel->getPersonByAccountId("1");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdByStringId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $actual = $PersonModel->getPersonByAccountId("abcd");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdBySpecialKeyId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $actual = $PersonModel->getPersonByAccountId("/**//#@^%$");
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdByArrayId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $actual = $PersonModel->getPersonByAccountId([]);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdByObjectId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $key = new stdClass;
        $actual = $PersonModel->getPersonByAccountId($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdByBooleanId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $key = true;
        $actual = $PersonModel->getPersonByAccountId($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdByDoubleId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $key = 1.345;
        $actual = $PersonModel->getPersonByAccountId($key);
        $this->assertEquals($expected, $actual);
    }
    //
    public function testFindPersonByAccountIdByFloatId()
    {
        $PersonModel = Person::getInstance();
        $expected = false;
        $key = 1.345;
        $actual = $PersonModel->getPersonByAccountId($key);
        $this->assertEquals($expected, $actual);
    }
}