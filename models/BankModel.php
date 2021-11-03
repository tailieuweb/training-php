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

    public function getBankByUserId($id){
        $sql = "SELECT * FROM banks WHERE id =". $id;
        return $this->select($sql);
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}