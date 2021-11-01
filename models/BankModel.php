<?php

require_once 'BaseModel.php';
require_once 'UserModel.php';


class BankModel extends BaseModel
{
    protected static $_instance;
    // get Bank by id($id)
    public function getBankById($id)
    {
        $id = $this->decryptID($id, $this->getBanks());
        $sql = 'SELECT `banks`.*, `users`.`fullname` as userFullname, `users`.`name` as userName, `users`.`email` as userEmail, `users`.`type` as userType  
        FROM `users` INNER JOIN `banks` 
        WHERE `users`.`id` = `banks`.`user_id` AND `banks`.`id` = ' . $id;
        $bank = $this->select($sql);
        return $bank;
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        // SQL
        $sql = "INSERT INTO `banks`(`user_id`, `cost`) 
        VALUES ('" . $this->BlockSQLInjection($input['user_id']) . "','" . $this->BlockSQLInjection($input['cost']) . "')";
        $bank = $this->insert($sql);

        return $bank;
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBankWithId($id, $user_id, $cost)
    {
        // SQL
        $id = $this->decryptID($id);
        if (!is_numeric($id)) {
            return false;
        }
        $sql = "INSERT INTO `banks`(`id`, `user_id`, `cost`) 
        VALUES ('" . $this->BlockSQLInjection($id) . "','" . $this->BlockSQLInjection($user_id) . "','" . $this->BlockSQLInjection($cost) . "')";
        $bank = $this->insert($sql);
        return $bank;
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $cost = $this->BlockSQLInjection($input['cost']);
        $result = ResultClass::getInstance();
        $id = $this->decryptID($input['id'], $this->getBanks());
        $temp = $this->getBankById($input['id']);
        if (count($temp) > 0) {
            if ($temp[0]['version'] == $input['version']) {
                $sql = 'UPDATE `banks` SET 
                user_id = "' . $input['user_id'] . '", 
                 cost="' . $cost . '",
                 version="' . ($input['version'] + 1) . '"
               WHERE id = ' . $id;
                $banks = $this->update($sql);
                if ($banks == true) {
                    $result->setData("Đã update thành công");
                } else {
                    $result->setError("Lỗi");
                }
            } else {
                $result->setError("Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang");
            }
        } else {
            $result->setError("Không tìm thấy id của bank");
        }

        return $result;
    }


    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        $id = $this->decryptID($id, $this->getBanks());
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }
    /**
     * Get Banks follow User Id
     * Get all Banks
     */
    public function getBanks($params = [])
    {
        if (!empty($params['user-id'])) {
            $userModel = UserModel::getInstance();
            $userId = $this->decryptID($params['user-id'], $userModel->getUsers());
            $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id` AND `banks`.`user_id` = ' . $userId;
            if(!$userId){
                $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id`';
            }
            $banks = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id`';
            $banks = $this->select($sql);
        }
        return $banks;
    }

    public static function getInstance()
    {
        if (self::$_instance != null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}
