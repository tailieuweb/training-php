<?php

require_once 'BaseModel.php';
require_once 'UserModel.php';
class BankModel extends BaseModel
{
    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        //$password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `banks`(`user_id`, `cost`) 
        VALUES ('" . $input['user_id'] . "','" . $input['cost'] . "')";
        $bank = $this->insert($sql);

        return $bank;
    }


    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        $id = $this->decryptID($id);
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        $id = $this->decryptID($input['id']);
        $sql = 'UPDATE `banks` SET 
                 user_id = "' . $input['user_id'] . '", 
                  cost="' . $input['cost'] . '"
                WHERE id = ' . $id;
        $banks = $this->update($sql);
        var_dump($input['user_id']);
        var_dump($input['cost']);
        return $banks;
    }



    /**
     * Get Banks follow User Id
     * Get all Banks
     */
    public function getBanks($params = [])
    {
        if (!empty($params['user-id'])) {
            $userModel = new UserModel();
            $user = $userModel->findUserById($params['user-id']);
            $userId = NULL;
            if (!empty($user)) {
                $userId = $user[0]['id'];
            }
            $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id` AND `banks`.`user_id` = ' . $userId;
            $banks = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `users`,`banks` WHERE `users`.`id` = `banks`.`user_id`';
            $banks = $this->select($sql);
        }
        return $banks;
    }
    // Decrypt id
    private function decryptID($md5Id)
    {
        $banks = $this->getBanks();
        foreach ($banks as $bank) {
            if (md5($bank['id'] . 'TeamJ-TDC') == $md5Id) {
                return $bank['id'];
            }
        }
        return NULL;
    }
}
