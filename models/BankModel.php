<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{
    /**
     * Get bank account
     * @param array $params
     * @return array
     */
    public function getBank($params = [])
    {
        $sql = "SELECT * FROM `banks` INNER JOIN users ON banks.user_id=users.id";
        $banks = $this->select($sql);
        return $banks;
    }
}
