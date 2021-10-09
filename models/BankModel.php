<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {
    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id) {
        $id = $this->decryptID($id);
        var_dump($id);
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getBanks($params = []) {
        
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE user_id LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM banks';
            $banks = $this->select($sql);
        }

        return $banks;
    }
    // Decrypt id
    private function decryptID($md5Id){
        $banks = $this->getBanks();
        foreach($banks as $banks){
            if(md5($banks['id'].'TeamJ-TDC') == $md5Id){
                return $banks['id'];
            }
        }
        return NULL;
    }
}