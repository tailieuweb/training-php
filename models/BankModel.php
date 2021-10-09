<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
    /**
     * Get all users
     * Search users
     */
    public function getBanks($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';
            $users = self::$_connection->query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        return $users;
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