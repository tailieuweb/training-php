<?php
require_once 'BaseModel.php';
class BankModel extends BaseModel
{
    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        $sql = "DELETE FROM banks WHERE id =" . $id ;
        return $this->delete($sql);
    }
}