<?php
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    /**
     * Test case Okie
     */
    public function testSumOk()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }

    /**
     * Test case Not good
     */
    public function testSumNg()
    {
        $userModel = new UserModel();
        $a = 1;
        $b = 2;

        $actual = $userModel->sumb($a,$b);

        if ($actual != 3) {
            $this->assertTrue(false);
        } else {
            $this->assertTrue(true);
        }
    }
    public function testSumAm()
    {
        $userModel = new UserModel();
        $a = -1;
        $b = -2;
        $actual = $userModel->sumb($a,$b);

      if($actual != -3)
      {
          $this->assertTrue(false); 
      }
      else
      {
          $this->assertTrue(true); 
      }
      
    }
    public function testSumAmAndDuong()
      {
          $userModel = new UserModel();
          $a = -1;
          $b = 2;
          $actual = $userModel->sumb($a,$b);
  
        if($actual != 1)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
    }
    public function testSumThucDuong()
      {
          $userModel = new UserModel();
          $a = 1.5;
          $b = 1.5;
          $actual = $userModel->sumb($a,$b);
  
        if($actual != 3)
        {
            $this->assertTrue(false); 
        }
        else
        {
            $this->assertTrue(true); 
        }
        
    }
    public function testSumThucAm()
        {
            $userModel = new UserModel();
            $a = -1.5;
            $b = -1.5;
            $actual = $userModel->sumb($a,$b);
    
          if($actual != -3)
          {
              $this->assertTrue(false); 
          }
          else
          {
              $this->assertTrue(true); 
          }
        }
        public function testSumThucAmAndDuong()
        {
            $userModel = new UserModel();
            $a = -1.5;
            $b = 1.5;
            $actual = $userModel->sumb($a,$b);
    
          if($actual != 0)
          {
              $this->assertTrue(false); 
          }
          else
          {
              $this->assertTrue(true); 
          }
        }
      
        public function testSumChuoiAndSo()
        {
            $userModel = new UserModel();
            $a = 'a';
            $b = 1.5;
            $actual = $userModel->sumb($a,$b);
    
          if($actual != 'error')
          {
              $this->assertTrue(false); 
          }
          else
          {
              $this->assertTrue(true); 
          }
        }
        public function testSumChuoiAndChuoi()
        {
            $userModel = new UserModel();
            $a = 'a';
            $b = 'a';
            $actual = $userModel->sumb($a,$b);
    
          if($actual != 'error')
          {
              $this->assertTrue(false); 
          }
          else
          {
              $this->assertTrue(true); 
          }
        }
}