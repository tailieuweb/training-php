<?php
use PHPUnit\Framework\TestCase;
require_once './models/FactoryPattern.php';

class Liem_UserRepository extends TestCase
{
    # update_UserAndBankAccount()
    /**
     * Test updateUserAndBankAccount() execute
     */
    public function testUpdateUserAndBankAccountOk()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    /**
     * Array param
     * Test array param is string
     */
     public function testArrayParamIsStringNg()
     {
         $factory = new FactoryPattern();
         $userRepo = $factory->make('UserRepository');
         $input = "aaa";
 
         $actual = $userRepo->update_UserAndBankAccount($input);
         if($actual == "Params invalid") {
            $this->assertTrue(true);
         }
         else {
            $this->assertTrue(false);
         }
     }

     /**
     * Test array param is null
     */
      public function testArrayParamIsNullNg()
      {
          $factory = new FactoryPattern();
          $userRepo = $factory->make('UserRepository');
          $input = null;
  
          $actual = $userRepo->update_UserAndBankAccount($input);
          if($actual == "Params invalid") {
             $this->assertTrue(true);
          }
          else {
             $this->assertTrue(false);
          }
      }

    /**
     * Test array param is number
     */
       public function testArrayParamIsNumberNg()
       {
           $factory = new FactoryPattern();
           $userRepo = $factory->make('UserRepository');
           $input = 1;
   
           $actual = $userRepo->update_UserAndBankAccount($input);
           if($actual == "Params invalid") {
              $this->assertTrue(true);
           }
           else {
              $this->assertTrue(false);
           }
       }

       /**
         * Test array param is object
         */
       public function testArrayParamIsObjectNg()
       {
           $factory = new FactoryPattern();
           $userRepo = $factory->make('UserRepository');
           $input = (object) array();
   
           $actual = $userRepo->update_UserAndBankAccount($input);
           if($actual == "Params invalid") {
              $this->assertTrue(true);
           }
           else {
              $this->assertTrue(false);
           }
       }

       /**
         * Test array param is bool
         */
       public function testArrayParamIsBoolNg()
       {
           $factory = new FactoryPattern();
           $userRepo = $factory->make('UserRepository');
           $input = false;
   
           $actual = $userRepo->update_UserAndBankAccount($input);
           if($actual == "Params invalid") {
              $this->assertTrue(true);
           }
           else {
              $this->assertTrue(false);
           }
       }

       /**
        * Cost param
        * Test cost param is string
        */
    public function testCostParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = "aaa";

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test cost param is bool
     */
    public function testCostParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = false;

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test cost param is array
     */
    public function testCostParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = array();

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test cost param is null
     */
    public function testCostParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = null;

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test cost param is object
     */
    public function testCostParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = (object) array();

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Id param
     * Test id param is string
     */
    public function testIdParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 'aaa';

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test id param is bool
     */
    public function testIdParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = false;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test id param is array
     */
    public function testIdParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = array();

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test id param is null
     */
    public function testIdParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = null;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test id param is object
     */
    public function testIdParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = (object) array();

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Bank id
     * Test bank id param is string
     */
    public function testBankIdParamIsStringNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 'aaa';
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

     /**
     * Test bank id param is bool
     */
    public function testBankIdParamIsBoolNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = false;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

     /**
     * Test bank id param is array
     */
    public function testBankIdParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = array();
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

     /**
     * Test bank id param is null
     */
    public function testBankIdParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = null;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

     /**
     * Test bank id param is object
     */
    public function testBankIdParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = (object) array();
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

     /**
      * Name param
     * Test name param is number
     */
    public function testNameParamIsNumberNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 123;
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

     /**
     * Test name param is array
     */
    public function testNameParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = array();
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test name param is object
     */
    public function testNameParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = (object) array();
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test name param is null
     */
    public function testNameParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = null;
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * FullName param
     * Test fullname param is number
     */
    public function testFullNameParamIsNumberNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 123;
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test fullname param is array
     */
    public function testFullNameParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = array();
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test fullname param is object
     */
    public function testFullNameParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = (object) array();
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test fullname param is null
     */
    public function testFullNameParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = null;
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Email param
     * Test email param is number
     */
    public function testEmailParamIsNumberNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 123;
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test email param is array
     */
    public function testEmailParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = array();
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test email param is object
     */
    public function testEmailParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = (object) array();
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test email param is null
     */
    public function testEmailParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = null;
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Password param
     * Test password param is number
     */
    public function testPasswordParamIsNumberNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = 123;
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test password param is array
     */
    public function testPasswordParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = array();
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test password param is object
     */
    public function testPasswordParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = (object) array();
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test password param is null
     */
    public function testPasswordParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = null;
        $input['type'] = rand(0, 1) == 0 ? 'user' : 'admin';
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Type param
     * Test type param is number
     */
    public function testTypeParamIsNumberNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = 123;
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test type param is array
     */
    public function testTypeParamIsArrayNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = array();
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test type param is object
     */
    public function testTypeParamIsObjectNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = (object) array();
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }

    /**
     * Test type param is null
     */
    public function testTypeParamIsNullNg()
    {
        $factory = new FactoryPattern();
        $userRepo = $factory->make('UserRepository');

        // Data user update
        $input['name'] = 'user4';
        $input['ver'] = rand(1, 100);
        $input['fullname'] = 'user4';
        $input['email'] = 'user4@gmail.com';
        $input['password'] = rand(1000, 9999) . hash('sha256', 'user4', true) . rand(1000, 9999);
        $input['type'] = null;
        $input['id'] = 4;

        // Data banks update
        $input['bank_id'] = 4;
        $input['cost'] = rand(100000, 999999);

        $actual = $userRepo->update_UserAndBankAccount($input);
        if($actual == 'Invalid value') {
            $this->assertTrue(true);
        }
        else {
            $this->assertTrue(false);
        }
    }
}