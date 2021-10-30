<<<<<<< HEAD
<?php
=======

<?php

>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit
use PHPUnit\Framework\TestCase;

class BankModelTest extends TestCase
{

    /**
<<<<<<< HEAD
     * Test case Okie
     */
    public function testBankOk()
    {
       $userModel = new UserModel();
       $a = 1;
       $b = 2;
       $expected = 3;

       $actual = $userModel->sumb($a,$b);

       $this->assertEquals($expected, $actual);
    }
}
=======
     * Test case Sum Positive Number
     */
    public function testUpdateBankOk()
    {
        $bankModel = new BankModel();
        $id = 1;
        $user_id = 3;
        $cost = "1234";
        $version = 2;
        $bank = $bankModel->updateBank($id);
        $actual = $bank[0]['3'];
        $this->assertEquals($user_id, $actual);
    }
    // public function updateBank($input)
    // {
    //     $cost = $this -> BlockSQLInjection($input['cost']);
    //     $result = new ResultClass();
    //     $id = $this->decryptID($input['id']);
    //     $temp = $this->getBankById($input['id']);
    //     if (count($temp) > 0) {
    //         if ($temp[0]['version'] == $input['version']) {
    //             var_dump($temp[0]['version']);
    //             var_dump($input['version']);
    //             $sql = 'UPDATE `banks` SET 
    //             user_id = "' . $input['user_id'] . '", 
    //              cost="' . $cost . '",
    //              version="' . ($input['version'] + 1) . '"
    //            WHERE id = ' . $id;
    //             $banks = $this->update($sql);
    //             if ($banks == true) {
    //                 $result->setData("Đã update thành công");
    //             } else {
    //                 $result->setError("Lỗi");
    //             }
    //         } else {
    //             $result->setError("Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang");
    //         }
    //     } else {
    //         $result->setError("Không tìm thấy id của bank");
    //     }

    //     return $result;
    // }

}
>>>>>>> 1-php-202109/2-groups/10-J/master-phpunit
