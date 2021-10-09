<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel { 
    public function deleteBankById($id) {
        $sql = 'DELETE FROM banks WHERE id = '.$id;
        return $this->delete($sql);

    }
}