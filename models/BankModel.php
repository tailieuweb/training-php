<?php 
require_once 'BaseModel.php';
class BankModel  extends BaseModel {
 /**
     * Search users
     * @param array $param
     * @return array
     */
    public function getListBank($params = []) {
        //Keyword
       
        if (!empty($params['keyword'])) {
           
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = self::$_connection->multi_query($sql);
            
        } else {
            $sql = 'SELECT * FROM banks';
            $bank = $this->select($sql);
        }
        return $bank;
       
    }
}