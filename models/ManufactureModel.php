<?php
require_once 'BaseTwoAdmin.php';
class ManufactureModel extends BaseTwoAdmin
{
    public function getManufactures()
    {
        $sql = 'SELECT * FROM `manufactures`';
        $manus = $this->select($sql);
        return $manus;
    }
    public function findManufactureById($id)
    {
        $manufac = 'SELECT manu_id FROM manufactures';
        $manu = $this->select($manufac);
        $ma = null;
        foreach ($manu as $man) {
            $md5 = md5($man['manu_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
            $sql = 'SELECT * FROM manufactures WHERE manu_id = ' . $man['manu_id'];
            $manus = $this->select($sql);
            }
        }
        // $sql = 'SELECT * FROM manufactures WHERE manu_id = ' . $id;
        // $manus = $this->select($sql);
        return $manus;
    }
    public function insertManufacture($input)
    {
        if(!empty($input['manu_name'])){
            $sql = "INSERT INTO manufactures (`manu_name`) VALUES (" .
            "'" . $input['manu_name'] . "')";
        $manus = $this->insert($sql);
        return $manus;
        }else{
            return false;
        }
        
    }
    public function updateManufacture($input)
    {
        if(!empty($input['manu_name'])){
            $manufac = 'SELECT * FROM manufactures';
            $manufactures = $this->select($manufac);
            $ma = null;
            foreach ($manufactures as $manu) {
                $md5 = md5($manu['manu_id'] . 'chuyen-de-web-2');
                if ($md5 == $input['manu_id']) {
                    if($input['version'] == md5($manu['version'].'chuyen-de-web-2')){
                        $versionNew = (int)$manu['version'] + 1;
    
                        $sql = 'UPDATE manufactures SET 
                        manu_name = "' . $input['manu_name'] . '",
                        version = "' . $versionNew. '"
                        WHERE manu_id = ' .  $manu['manu_id'];
    
                        $ma = $this->update($sql);
                    }else{
                        return false;
                    }
                   
                }
            }
            return $ma;
        }else{
            return false;
        }
    }
    public function deleteManufacture($id)
    {
        $manufac = 'SELECT manu_id FROM manufactures';
        $manu = $this->select($manufac);
        $ma = null;
        foreach ($manu as $man) {
            $md5 = md5($man['manu_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
            $sql = 'DELETE FROM manufactures WHERE manu_id = ' . $man['manu_id'];
            $ma = $this->delete($sql);
            }
        }
        $sql = 'DELETE FROM manufactures WHERE manu_id = ' . $id;
        return $ma;
    }

    protected static $_instance;
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}