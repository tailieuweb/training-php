<?php
require_once 'models/BaseModel.php';
class BankModel extends BaseModel
{
    public function insertBank($input)
    {
        if ($input == new stdClass && $input == ''){
            return false;
        }
        if($input['user_id'] == '' && $input['cost'] == '' && $input['user_id'] == null && $input['cost'] == null)
        {
            return false;
        }
        else if(is_numeric($input['user_id'])&& is_numeric($input['cost']) )
        {
            $sql = "INSERT INTO `app_web1`.`banks` (`user_id`, `cost`) VALUES (" .
            "'" . $input['user_id'] . "', '" . $input['cost'] . "')";

        $user = $this->insert($sql);

        return $user;
        }
    }

    public function updateBank($input)
    {
        if($input['user_id'] == '' && $input['cost'] == ''){
            return false;
        }
        else if(is_numeric($input['user_id'])&& is_numeric($input['cost'])) {
            $sql = 'UPDATE banks SET 
            user_id = ' . $input['user_id'] . ', 
            cost = ' . $input['cost'] . '
             WHERE id = ' . $input['id'];

            $bank = $this->update($sql);

            return $bank;
        }
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        $sql = 'DELETE FROM banks WHERE id = ' . $id;
        return $this->delete($sql);
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function findBankById($id)
    {
        if($id == ''){
            return 'error';
        }
        if(is_string($id)){
            return 'error';
        }
        // else if($id == new stdClass){
        //     return 'error';
        // }
        else{
            $sql = 'SELECT * FROM banks WHERE id = ' . $id;
            $bank = $this->select($sql);
    
            return $bank;
        }
    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM banks WHERE name LIKE "%' . $params['keyword'] . '%"';
        } else {
            $sql = 'SELECT * FROM banks';
        }

        $users = $this->select($sql);

        return $users;
    }
}
