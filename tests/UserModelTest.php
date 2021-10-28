<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case #1 Okie
     */
    public function testSumOk()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a, $b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case #1 Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    /**
     * Test case #2 good
     */
    public function testSubOk()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $expected = -3;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

      /**
     * Test case #2 Not good
     */
    public function testSubNg()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $actual = $userModel->sumb($a, $b);

        if ($actual != -3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

      /**
     * Test case #3 good
     */
    public function testSumAndSubOk()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = -2;
        $expected = -1;

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

      /**
     * Test case #3 Not good
     */
    public function testSumAndSubNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != -1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

    /**
     * Test case #4.1 Okie
     */
    public function testSumRealOk()
    {
       $userModel = new UserModel();
       $a = 1.05;
       $b = 2.05;
       $expected = 3.1;

       $actual = $userModel->sumb($a, $b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case #4.1 Not good
     */
    public function testSumRealng()
    {
        $userModel = new UserModel();
        $a = 1.05;
        $b = 2.05;

        $actual = $userModel->sumb($a, $b);

        if ($actual < 3 && $actual > 3.1) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

        /**
     * Test case #4.2 Okie
     */
    public function testSubRealOk()
    {
       $userModel = new UserModel();
       $a = -1.05;
       $b = -2.05;
       $expected = -3.1;

       $actual = $userModel->sumb($a, $b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case #4.2 Not good
     */
    public function testSubRealng()
    {
        $userModel = new UserModel();
        $a = -1.05;
       $b = -2.05;

        $actual = $userModel->sumb($a, $b);

        if ($actual < -3.1 && $actual > -3.2) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    /*
    * Test case #4.3 Okie
    */
   public function testSumAndSubRealOk()
   {
      $userModel = new UserModel();
      $a = 1.05;
      $b = -2.05;
      $expected = -1;

      $actual = $userModel->sumb($a, $b);

      $this->assertEquals($expected, $actual);
   }

   /**
    * Test case #4.3 Not good
    */
   public function testSumAndSubRealng()
   {
       $userModel = new UserModel();
       $a = 1.05;
        $b = -2.05;

       $actual = $userModel->sumb($a, $b);

       if ($actual < -1 && $actual > -1.1) {
           $this->assertTrue(false);
       } else {
           $this->assertTrue(true);
       }
   }

      /**
     * Test case #5 good
     */
    public function testStrAndNumOk()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 1;
        $expected = 'err';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

      /**
     * Test case #5 Not good
     */
    public function testStrAndNumNg()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = -2;

        $actual = $userModel->sumb($a, $b);

        if ($actual != 'err') {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }

          /**
     * Test case #6 good
     */
    public function testStrOk()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'b';
        $expected = 'ab';

        $actual = $userModel->sumb($a, $b);

        $this->assertEquals($expected, $actual);
    }

      /**
     * Test case #6 Not good
     */
    public function testStrNg()
    {
        $userModel = new UserModel();
        $a = 'a';
        $b = 'b';

        $actual = $userModel->sumb($a, $b);

        if ($actual != 'ab') {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
}