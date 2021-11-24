<?php
require_once 'BaseModel.php';
class Repository extends BaseModel
{

    /**
     * Create function insert full information of user
     * @param $sql
     */
    public function createFullUser($input)
    {
        $sql = "INSERT INTO `users` (`name`,`fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "', '" . $input['email'] . "', '" . $input['type'] . "', '" . $input['password'] . "')";


        $user = $this->insert($sql);

        if (!empty($input['cost'])) {
            //Get id of user
            $sqlID = "SELECT `id` FROM `users` ORDER BY `id` DESC LIMIT 1;";
            $getID = $this->select($sqlID);
            //Insert for table bank
            $sqlBank = "INSERT INTO `banks` (`user_id`,`cost`) VALUES (" .
                "'" . $getID[0]['id'] . "', '" . $input['cost'] . "')";

            $banks = $this->insert($sqlBank);

            return $banks;
        }
        return $user;
    }
    /**
     * Create function update full information of user
     * @param $sql
     */
    public function updateFullUser($input)
    {
        $sql = 'UPDATE users SET 
                name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) . '", 
                fullname = "' . $input['fullname'] . '", 
                email = "' . $input['email'] . '", 
                type = "' . $input['type'] . '", 
                password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];


        $user = $this->update($sql);

        if (!empty($input['cost'])) {
            //Insert for table bank
            $sqlBank = 'UPDATE banks SET 
                cost = "' . $input['cost'] . '"
                WHERE user_id = ' . $input['id'];

            $banks = $this->update($sqlBank);

            return $banks;
        }
        return $user;
    }
    /**
     * Create function update full information of user
     * @param $sql
     */
    public function getFullUser($id){
        if(is_array($id) || is_object($id)){
            return false;
        }
        $sql = 'SELECT * FROM  banks WHERE user_id = '.$id;
        $bank = $this->select($sql);
        if($bank != null){
            $sql = 'SELECT * FROM users, banks WHERE id = '.$id. ' AND banks.user_id = ' . $id;
            $user = $this->select($sql);
        }
        else{
            $sql = 'SELECT * FROM users WHERE id = '.$id;
            $user = $this->select($sql);
        }
        return $user;
    }
}
