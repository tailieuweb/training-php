<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel  {

    protected static $_instance;

    private  function __contructor(){}

   




     public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);
        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id,BaseModel $bankModel) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
         $this->delete($sql);
         if($BankModel instanceof BankModel) {
            $bankModel->insertUser($input);
        }
         return $this;
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */

        public function updateUser($input,BaseModel $BankModel) {

            $_id = $input['id'];
            $handleFirst = substr($_id,23);
            $_id = "";
            for ($i=0; $i <strlen($handleFirst)-9 ; $i++) {
                $_id.=$handleFirst[$i];
            }
            $input['id'] = $_id;
            $sql = 'UPDATE users SET 
                     name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                     password="'. md5($input['password']) .'",
                     fullname = "' . $input['fullname'] .'",
                     email = "'	 . $input['email'] .'",
                     type = "' . $input['t1'] .'"
                    WHERE id = ' . $input['id'];
            $user = $this->update($sql);
            if($BankModel instanceof BankModel) {
            $BankModel->updateUser($input);
            }
            return $user;
        }


    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input,BaseModel $bankModel) {
    //    $sql = "INSERT INTO `users`( `name`, `fullname`, `email`, `type`, `password`) VALUES (?,?,?,?,?)";
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
        "'" . $input['name'] . "', '".$input['password']."', '".$input['fullname']."', '".$input['email']."', '".$input['t1']."')";

        //        $sql->bind_param('sssss',$input['name'],$input['fullname'],$input['email'],$input['t1'],$input['password']);
        $user = $this->insert($sql);
        $Lastid = $this->SelectLastid();
        $input['id']=  $Lastid[0]['MAX(id)'];
        if($BankModel instanceof BankModel) {
            $bankModel->insertUser($input);
        }
        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM `users` ORDER BY name;';
        }
        $users = $this->select($sql);
        return $users;
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public  function  SelectLastid(){
            $sql = 'SELECT MAX(id) FROM users';
            $user = $this -> select($sql);
            return $user;
    }
}