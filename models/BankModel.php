<?php

require_once 'BaseModel.php';
require_once 'UserModel.php';
class BankModel extends BaseModel {
    /**
     * Get Banks follow User Id
     * Get all Banks
     */
    public function getBanks($params = []) {
         if (!empty($params['user-id'])) {
            $userModel = new UserModel();
            $user = $userModel->findUserById($params['user-id']);
            $userId = NULL;
            if(!empty($user)){
                $userId = $user[0]['id'];
            }
            $sql = 'SELECT * FROM banks WHERE user_id = '.$userId;
            $banks = $this->select($sql);
        } else{
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }
        return $banks;
    }
    // Decrypt id
    private function decryptID($md5Id){
        $banks = $this->getBanks();
        foreach($banks as $bank){
            if(md5($bank['id'].'TeamJ-TDC') == $md5Id){
                return $bank['id'];
            }
        }
        return NULL;
    }
}