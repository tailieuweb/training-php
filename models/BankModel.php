<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel {

    public function findBankById($id)
    {
        if(!is_numeric($id)) return 'error';
        
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }

    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id) {
        if(is_numeric($id)){    
            if(is_float($id)){
                return false;
            }   
            else{
                $sql = 'DELETE FROM users WHERE id = '.$id;
                return $this->delete($sql);
            }   
           
        } 
        else{
            return false;
        }
    }
    /**
     * Update bank
     * @param $input
     * @return mixed
     */
    public function updateBank($input) {
        if($input['user_id'] > 0 && $input['cost'] > 0 ){
            $sql = "UPDATE `banks` SET `user_id` = " . "'" . $input['user_id'] . "', cost = " . "'" . $input['cost'] . "' WHERE id = " . "'" . $input['id'] . "'";
            $bank = $this->update($sql);
            return $bank;
        }
    }

    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input) {
        if($input['user_id'] > 0 && $input['cost'] > 0 ){
        $sql = "INSERT INTO `app_web1`.`banks` (`user_id`,`cost`) VALUES (" . "'" . $input['user_id'] . "', '" . $input['cost'] . "')";
        $bank = $this->insert($sql);
        return $bank;
        }
    }

    /**
     * Search banks
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {
        if (isset($params['keyword'])) {
            if (is_integer($params['keyword']) == true || is_string($params['keyword']) == true) {
                $sql = 'SELECT * FROM banks WHERE user_id  LIKE "%' . $params['keyword'] . '%"';
                $bank = $this->select($sql);
                if ($bank != null) {
                    return $bank;
                }
                return $bank = 'error';
            }
            return $bank = 'error';
        } else {
            $sql = 'SELECT * FROM banks';
            $bank = $this->select($sql);
        }

        return $bank;
    }
}