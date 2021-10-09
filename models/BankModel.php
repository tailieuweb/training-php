<?php

require_once 'BaseModel.php';

class BankModel extends BaseModel
{

    public function getBankById($id)
    {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM banks WHERE id = ' . $id;
        $bank = $this->select($sql);

        return $bank;
    }

    public function findBanks($keyword)
    {
        $sql = 'SELECT * FROM banks WHERE id = ' . $keyword  . ' OR user_id LIKE %' . $keyword . '%';
        $bank = $this->select($sql);

        return $bank;
    }

    /**
     * Search banks
     * @param array $params
     * @return array
     */
    public function getbanks($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE  LIKE "%' . $params['keyword'] . '%"';

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
    private function decryptID($md5Id)
    {
        $banks = $this->getbanks();
        foreach ($banks as $bank) {
            if (md5($bank['id'] . 'TeamJ-TDC') == $md5Id) {
                return $bank['id'];
            }
        }
        return NULL;
    }
}
