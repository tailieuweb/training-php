<?php

require_once 'BaseModel.php';
require_once 'Result.php';

<<<<<<< HEAD
class UserModel extends BaseModel  {
=======
class UserModel extends BaseModel {
<<<<<<< HEAD
    public function getAll() {
        $sql = 'SELECT * FROM users';
        $user = $this->select($sql);
        return $user;
    }
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet

    protected static $_instance;

    private  function __contructor(){}

   




     public function findUserById($id) {
=======
    protected static $_instance;

    private  function __contructor(){}

    public function findUserById($id) {
        $id = $this->decryptID($id);
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);
        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
<<<<<<< HEAD
        $user = $this->select($sql);
        return $user;
=======
        //$users = self::$_connection->multi_query($sql);
        //Normal 
        $users = $this->select($sql);
        return $users;
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
<<<<<<< HEAD
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';
=======
        $sql = 'SELECT * FROM users 
        WHERE name = "' . mysqli_real_escape_string(self::$_connection, $userName) . '" 
        AND password = "'.$md5Password.'"';
        $user= self::$_connection->multi_query($sql);
        //Normal 
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
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
<<<<<<< HEAD
=======
    public function updateUser($input)
    {

        $sql = 'UPDATE users SET 
<<<<<<< HEAD
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name'])  . '", 
                 fullname="' . $input['fullname'] . '",
                 email="' . $input['email'] . '",
                 password="' . $input['password'] . '",
                 type="' . $input['type'] . '"
                WHERE id = ' . $input['id'];
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet

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


=======

                 name = "' . mysqli_real_escape_string(self::$_connection, strip_tags($input['name'])) .'", 
                 password="'. strip_tags(md5($input['password'])) .'",
                 fullname="'. strip_tags($input['fullname']) .'",
                 email="'. strip_tags($input['email']) .'",
                 type="'. strip_tags($input['type']) .'",
                WHERE id = ' . strip_tags($input['id']);
        $user = $this->update($sql);
        return $user;
    }
    
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
    /**
     * Insert user
     * @param $input
     * @return mixed
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function insertUser($input,BaseModel $bankModel) {
    //    $sql = "INSERT INTO `users`( `name`, `fullname`, `email`, `type`, `password`) VALUES (?,?,?,?,?)";
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
        "'" . $input['name'] . "', '".$input['password']."', '".$input['fullname']."', '".$input['email']."', '".$input['t1']."')";

        //        $sql->bind_param('sssss',$input['name'],$input['fullname'],$input['email'],$input['t1'],$input['password']);
=======
    public function insertUser($input)
    {
        $password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `users`(`name`,`password`,`fullname`, `email`, `type`) 
        VALUES ('" . strip_tags($input['name']) . "',
        '" . strip_tags(md5($input['password'])) . "',
        '" . strip_tags($input['fullname']) . "',
        '" . strip_tags($input['email']) . "',
        '" . strip_tags($input['type']) . "')";
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
        $user = $this->insert($sql);
        $Lastid = $this->SelectLastid();
        $input['id']=  $Lastid[0]['MAX(id)'];
        if($bankModel instanceof BankModel) {
            $bankModel->insertUser($input);
        }
=======
    public function insertUser($input) {
       $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`) VALUES (" .
                "'" . $input['name'] . "',
                 '".md5($input['password'])."',
                 '".$input['fullname']."',
                 '".$input['email']."',
                 '".$input['type']."')";
        //$user = self::$_connection->multi_query($sql);
        //Normal: 
        $user = $this->insert($sql);
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
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
            $sql = 'SELECT * FROM users
            WHERE u.name LIKE "%' . $params['keyword'] .'%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            //Normal 
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `users` ORDER BY name;';
        }
        $users = $this->select($sql);
        return $users;
    }
<<<<<<< HEAD

<<<<<<< HEAD
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
=======
=======
    // Decrypt id
    private function decryptID($md5Id)
    {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if (md5($user['id'] . 'TeamB-TDC') == $md5Id) {
                return $user['id'];
            }
        }
        return NULL;
    }
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
    // Singleton pattern:
    public static function getInstance() {
        if (self::$userInstance !== null) {
            return self::$userInstance;
        }
        self::$userInstance = new self();
        return self::$userInstance;
    }
<<<<<<< HEAD
    // Sum test
     public function sumb($a,$b)
    {
        return $a + $b;
>>>>>>> 1-php-202109/2-groups/2-B/2-49-Viet
    }
=======
>>>>>>> 1-php-202109/2-groups/2-B/3-52-Nhu
}