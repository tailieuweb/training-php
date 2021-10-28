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
       $a = 3;
       $b = 2;
       $expected = 5;

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
    //sum am
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
    // am va duong
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
    //thuc duong
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
    //thuc am
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
        //thuc am va duong
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
        //chuoi va thuc so
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
        //chuoi va chuoi
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