<?php

use PHPUnit\Framework\TestCase;

class TestPHPUnitTien extends TestCase
{
    /**
     * Test case Oki
     */
    public function testGetCheckoutsByUserIdOk()
    {
        $homeModel = new HomeModel();
        $id = 51;
        $expected = 51;
        $homeModel->startTransaction();
        $user = $homeModel->getCheckoutsByUserId($id);
        $actual = $user[0]['user_id'];
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetCheckoutsByUserIdNg()
    {
        $homeModel = new HomeModel();
        $id = 1000;
        $homeModel->startTransaction();
        $user = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testGetCheckoutsByUserIdIsEmpty()
    {
        $homeModel = new HomeModel();
        $id = "";
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testGetCheckoutsByUserIdIsDouble()
    {
        $homeModel = new HomeModel();
        $id = 10.5;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testGetCheckoutsByUserIdIsNegative()
    {
        $homeModel = new HomeModel();
        $id = -2;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testGetCheckoutsByUserIdIsIsString()
    {
        $homeModel = new HomeModel();
        $id = '123';
        $expected = [];
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testGetCheckoutsByUserIdIsIsArray()
    {
        $homeModel = new HomeModel();
        $id = [];
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testGetCheckoutsByUserIdIsIsNull()
    {
        $homeModel = new HomeModel();
        $id = null;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testGetCheckoutsByUserIdIsIsObject()
    {
        $homeModel = new HomeModel();
        $id = new HomeModel();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testGetCheckoutsByUserIdIsIsBool()
    {
        $homeModel = new HomeModel();
        $id = true;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testGetCheckoutsByUserIdIsSpecialCharacter()
    {
        $homeModel = new HomeModel();
        $id = '@@';
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }


    // CHANGE PASSWORD
    /**
     * Test case Oki
     */
    public function testChangePasswordOk()
    {
        $homeModel = new HomeModel();
        $userName = 'tien';
        $password = '333333';
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testChangePasswordNg()
    {
        $homeModel = new HomeModel();
        $userName = "";
        $password = "aaa";
        $homeModel->startTransaction();
        $user = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case password has length < 6
     */
    public function testChangePasswordLengthLessThanSix()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = "asda";
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is null
     */
    public function testChangePasswordWithPasswordNull()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = null;
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
     /**
     * Test case password is null
     */
    public function testChangePasswordWithPasswordEmpty()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = "";
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is array
     */
    public function testChangePasswordWithPasswordArray()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = [];
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is object
     */
    public function testChangePasswordWithPasswordObject()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is boolean
     */
    public function testChangePasswordWithPasswordBoolean()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = true;
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // GET ORDER ITEM BY ID
    /**
     * Test case Oki
     */
    public function testGetOrderItemByIdOk()
    {
        $homeModel = new HomeModel();
        $id = 9;
        $expected = 1;
        $homeModel->startTransaction();
        $order = $homeModel->getOrderItemById($id);
        $actual = $order[0]['quantity'];
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetOrderItemByIdNg()
    {
        $homeModel = new HomeModel();
        $id = 1000;
        $homeModel->startTransaction();
        $order = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        if (empty($order)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testGetOrderItemByIdIsEmpty()
    {
        $homeModel = new HomeModel();
        $id = "";
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testGetOrderItemByIdIsDouble()
    {
        $homeModel = new HomeModel();
        $id = 10.5;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testGetOrderItemByIdIsNegative()
    {
        $homeModel = new HomeModel();
        $id = -2;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testGetOrderItemByIdIsIsString()
    {
        $homeModel = new HomeModel();
        $id = "tien";
        $expected = "Not invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        //var_dump($actual).die();
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testGetOrderItemByIdIsIsArray()
    {
        $homeModel = new HomeModel();
        $id = [];
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testGetOrderItemByIdIsIsNull()
    {
        $homeModel = new HomeModel();
        $id = null;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testGetOrderItemByIdIsIsObject()
    {
        $homeModel = new HomeModel();
        $id = new HomeModel();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testGetOrderItemByIdIsIsBool()
    {
        $homeModel = new HomeModel();
        $id = true;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // GET USER BY MONTH
    /**
     * Test case Oki
     */
    public function testGetUserByMonthOk()
    {
        $homeModel = new HomeModel();
        $month = 11;
        $expected = "Test12";
        $homeModel->startTransaction();
        $user = $homeModel->getUserByMonth($month);
        $actual = $user[0]['username'];
        //var_dump($user[0]['username']).die();
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetUserByMonthNg()
    {
        $homeModel = new HomeModel();
        $month = 13;
        $homeModel->startTransaction();
        $user = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testGetUserByMonthIsEmpty()
    {
        $homeModel = new HomeModel();
        $month = "";
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testGetUserByMonthIsDouble()
    {
        $homeModel = new HomeModel();
        $month = 10.5;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testGetUserByMonthIsNegative()
    {
        $homeModel = new HomeModel();
        $month = -2;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testGetUserByMonthIsIsString()
    {
        $homeModel = new HomeModel();
        $month = '123';
        $expected = [];
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testGetUserByMonthIsIsArray()
    {
        $homeModel = new HomeModel();
        $month = [];
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testGetUserByMonthIsIsNull()
    {
        $homeModel = new HomeModel();
        $month = null;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testGetUserByMonthIsIsObject()
    {
        $homeModel = new HomeModel();
        $month = new HomeModel();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testGetUserByMonthIsIsBool()
    {
        $homeModel = new HomeModel();
        $month = true;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // INSERT ORDER ITEMS
    /**
     * Test case Oki
     */
    public function testInsertOrderItemOk()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = 3;
        $homeModel->startTransaction();
        $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertTrue(true);
    }
    /**
     * Test case Not good
     */
    public function testInsertOrderItemNg()
    {
        $homeModel = new HomeModel();
        $id = 1000;
        $orderID = 9;
        $productID = 90;
        $quantity = 3;
        if (!empty($data['id'])) {
            $actual = 0;
        } else {
            $homeModel->insertOrderItem($orderID, $productID, $quantity);
        }
        $actual = $homeModel->findOrderById($id);
        $homeModel->rollback();
        //var_dump($actual);die();
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testInsertOrderItemIsDuplicate()
    {
        $homeModel = new HomeModel();
        $id_max = $homeModel->lastUserId();
        $orderID = 9;
        $productID = 90;
        $quantity = 3;
        $homeModel->startTransaction();
        $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $actual = $homeModel->lastUserId();
        $expected = $id_max;
        $this->assertEquals($expected, $actual);
    }
    // Test productID
    /**
     * Test case with productID is string
     */
    public function testInsertOrderItemWithProductIDIsString()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = "tien";
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is negative number
     */
    public function testInsertOrderItemWithProductIDIsNegNum()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = -5;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is double
     */
    public function testInsertOrderItemWithProductIDIsDouble()
    {
        $homeModel = new HomeModel();
        $orderID = 10;
        $productID = 3.5;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is empty
     */
    public function testInsertOrderItemWithProductIDIsEmpty()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = "";
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is null
     */
    public function testInsertOrderItemWithProductIDIsNull()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = null;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is array
     */
    public function testInsertOrderItemWithProductIDIsArray()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = [90, 21];
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is object
     */
    public function testInsertOrderItemWithProductIDIsObject()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = new HomeModel();
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is boolean
     */
    public function testInsertOrderItemWithProductIDIsBool()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = true;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test orderID
    /**
     * Test case with orderID is string
     */
    public function testInsertOrderItemWithOrderIdIsString()
    {
        $homeModel = new HomeModel();
        $orderID = "tien";
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is negative number
     */
    public function testInsertOrderItemWithOrderIdIsNegNum()
    {
        $homeModel = new HomeModel();
        $orderID = -5;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is double
     */
    public function testInsertOrderItemWithOrderIdIsDouble()
    {
        $homeModel = new HomeModel();
        $orderID = 10.5;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is empty
     */
    public function testInsertOrderItemWithOrderIdIsEmpty()
    {
        $homeModel = new HomeModel();
        $orderID = "";
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is null
     */
    public function testInsertOrderItemWithOrderIdIsNull()
    {
        $homeModel = new HomeModel();
        $orderID = null;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is array
     */
    public function testInsertOrderItemWithOrderIdIsArray()
    {
        $homeModel = new HomeModel();
        $orderID = [1, 2];
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is object
     */
    public function testInsertOrderItemWithOrderIdIsObject()
    {
        $homeModel = new HomeModel();
        $orderID = new HomeModel();
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is boolean
     */
    public function testInsertOrderItemWithOrderIdIsBool()
    {
        $homeModel = new HomeModel();
        $orderID = true;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test quantity
    /**
     * Test case with Quantity is string
     */
    public function testInsertOrderItemWithQuantityIsString()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = "tien";
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is negative number
     */
    public function testInsertOrderItemWithQuantityIsNegNum()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = -10;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is double
     */
    public function testInsertOrderItemWithQuantityIsDouble()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = 3.5;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is empty
     */
    public function testInsertOrderItemWithQuantityIsEmpty()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = "";
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is null
     */
    public function testInsertOrderItemWithQuantityIsNull()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = null;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is array
     */
    public function testInsertOrderItemWithQuantityIsArray()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = [3, 4];
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is object
     */
    public function testInsertOrderItemWithQuantityIsObject()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = new HomeModel();
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is boolean
     */
    public function testInsertOrderItemWithQuantityIsBool()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = true;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test have orderID and productID
    /**
     * Test case empty quantity
     */
    public function testInsertOrderItemEmptyQuantity()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = "";
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test have orderID and quantity
    /**
     * Test case with orderID is string
     */
    public function testInsertOrderItemEmptyProductId()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = "";
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test have productID and quantity
    /**
     * Test case with orderID is string
     */
    public function testInsertOrderItemEmptyOrderId()
    {
        $homeModel = new HomeModel();
        $orderID = "";
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
