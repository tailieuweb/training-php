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
     
       
    /*Test  insert user nhập đúng OK*/
    public function testInsertUserOK()
    {
        $userModel = new UserModel();
        $bankModel = new BankModel();
        $user = array(
            'name' => 'minh an',
            'fullname' => 'minhan',
            'type' => 'user',
            'email' => 'toithap1999@gmail.com',
            'password' => '12345'
        );
        $excute = true;

        $actual = $userModel->insertUser($user, $bankModel);
        $this->assertEquals($excute, $actual);
    }
     /*Test  insert nhập sai user Not OK*/
 public function testInsertUserNG()
 {
     $userModel = new UserModel();
     $bankModel = new BankModel();
     $actual = null;
     $user = array(
         'name' => 'minh an',
         'fullname' => 'minhan',
         'type' => 'user',
         'email' => 'toithap1999@gmail.com',
         'password' => '12345'
     );
     try {
         $actual = $userModel->insertUser('abcdefgh',  $bankModel);
     } catch (Throwable $e) {
         $excute = false;
     }
     $this->assertEquals($excute, $actual);
 }
/*Test insert user truyền vào chuỗi*/
public function testInsertUserStringNotOK()
{
   $userModel = new UserModel();
   $bankModel = new BankModel();
   $actual = null;
   $user = array(
       'name' => 'minh an',
           'fullname' => 'minhan',
           'type' => 'user',
           'email' => 'toithap1999@gmail.com',
           'password' => '12345'
   );
   try {
       $actual = $userModel->insertUser("sssdasad",  $bankModel);
   } catch (Throwable $e) {
       $excute = false;
   }
   $this->assertEquals($excute, $actual);
}
     /*Test insert user truyền vào số nguyên*/
     public function testInsertUserIntegerNotOK()
     {
         $userModel = new UserModel();
         $bankModel = new BankModel();
         $actual = null;
         $user = array(
             'name' => 'minh an',
             'fullname' => 'minhan',
             'type' => 'user',
             'email' => 'toithap1999@gmail.com',
             'password' => '12345'
         );
         try {
             $actual = $userModel->insertUser(111,  $bankModel);
         } catch (Throwable $e) {
             $excute = false;
         }
         $this->assertEquals($excute, $actual);
     }
 
      /*Test insert user truyền vào số nguyên*/
      public function testInsertUserRealnumberNotOK()
      {
          $userModel = new UserModel();
          $bankModel = new BankModel();
          $actual = null;
          $user = array(
              'name' => 'minh an',
              'fullname' => 'minhan',
              'type' => 'user',
              'email' => 'toithap1999@gmail.com',
              'password' => '12345'
          );
          try {
              $actual = $userModel->insertUser(14.1,  $bankModel);
          } catch (Throwable $e) {
              $excute = false;
          }
          $this->assertEquals($excute, $actual);
      }
  

  /*  Test hàm getUser khi không có dữ liệu truyền vào  OK */
public function testGetUserNotDataOK()
{
    $userModel = new UserModel();

    $actual = $userModel->getUsers();

    if ($actual != null) {
        $this->assertTrue(true);
    } else {
        $this->assertTrue(false);
    }
}


     /*Test hàm getUser khi có dữ liệu truyền vào là kiểu đối tượng*/
     public function testGetUserObjectNotOK()
     {
         $userModel = new UserModel();
         $actual = null;
 
         $keyword = array(
             'keyword' => $userModel,
         );
         try {
             $actual = $userModel->getUsers($keyword);
         } catch (Throwable $e) {
             $excute = false;
         }
         $this->assertEquals($excute, $actual);
     }


 /*Test hàm getUser khi có dữ liệu truyền vào là Array*/
 public function testGetUserArrayNotOK()
 {
     $userModel = new UserModel();
     $actual = null;

     $keyword = array(
         'keyword' => ['ad'],
     );
     try {
         $actual = $userModel->getUsers($keyword);
     } catch (Throwable $e) {
         $excute = false;
     }
     $this->assertEquals($excute, $actual);
 }
  /* Test hàm getUser khi có dữ liệu truyền vào  OK  */
  public function testGetUserOK()
  {
      $userModel = new UserModel();
      $keyword = array(
          'keyword' => 'admin'
      );
      $actual = $userModel->getUsers($keyword);
      if ($actual != []) {
          $this->assertTrue(true);
      } else {
          $this->assertTrue(false);
      }
  }
}