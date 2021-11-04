<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {
    //singleton pattern user
    public static function getInstance(){
        if(self::$_user_instance  != null){
            return self::$_user_instance;
        }
        self::$_user_instance = new self;
        return self::$_user_instance;
    }
    
// sreach user --> insert id
    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR email LIKE %'.$keyword.'%';
        $user = $this->select($sql);

        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    // sql injection -> fix login-> ma hoa ki tu
    public function auth($userName, $password) {
        $md5Password = md5($password);
    //Login Pass khi để 1(SQL Injection)
        //SELECT * FROM users WHERE name = "' . $userName . '" AND  password = "'.$md5Password.'" OR "1"'
        //SELECT * FROM users WHERE name = "hacker2" AND password = "12345" OR "1"
        // $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND  password = "'.$md5Password.'"';
        
		$username = mysqli_real_escape_string(self::$_connection, $_POST['username']);
		$md5password = mysqli_real_escape_string(self::$_connection, $_POST['password']);
		$sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND  password = "'.$md5Password.'"';
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }
    // tach chuoi ra khoi the html -->strip_tags() 
    // hoac dung mysql_real_escape_string()
    //SQL injection
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        //create var BankModel
        $bankModel = new BankModel();
        //update PROXY bank
        if($input['user_id'] != null){
            $bankModel -> updateBank($input);
        }
        else{

                $sql = 'UPDATE users SET 
                        name = "' . $input['name'] .'", 
                        fullname = "' .  mysqli_real_escape_string(self::$_connection, $input['fullname']) .'", 
                        email = "' . strip_tags($input['email']) .'", 
                        type = "' . $input['type'] .'", 
                        password="'. md5($input['password']) .'"
                        WHERE id = ' . $input['id'];
                $user = $this->update($sql);
        
                return $user;
        }
        
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    // sql injection
    public function insertUser($input) {
        //create var BankModel
        $bankModel = new BankModel();
        //insert PROXY bank
        if($input['user_id'] != null){
            $bankModel->insertBank($input);
        }
        else{

            $sql = "INSERT INTO `app_web1`.`users` (`name`,`fullname`,`email`,`type`,`password`) 
            VALUES (" . "'" . $input['name'] . "', '".mysqli_real_escape_string(self::$_connection,$input['fullname']). "', '" . strip_tags($input['email']) . "', '" . $input['type'] . "','".md5($input['password']) . "')";
    
            $user = $this->insert($sql);
    
            return $user;
        }
    }
    // end strip_tags
    // SQL Injection -> search -> fix
    public function getUsers($params = []) {
        //Keywordngan chan ca tu khoa gia tri va cai ki tu
        if (!empty($params['keyword'])) {
            $params['keyword'] = str_replace(
                array(
                    ',', ';', '#', '/', '%', 'select', 'update', 'insert', 'delete', 'truncate',
                    
                    'union', 'or', '"', "'", 'SELECT', 'UPDATE', 'INSERT', 'DELETE', 
                    
                    'TRUNCATE', 'UNION', 'OR'
                ),
                array(''),
                $params['keyword']
            );
            $sql = 'SELECT * FROM users WHERE name LIKE "%' .$params['keyword'] .'%"';
            var_dump($sql);
            // echo sprintf($sql,mysql_real_escape_string($params['keyword']));
            // var_dump($sql);
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
        } else {

            $sql = 'SELECT * FROM users join types on users.type = types.type_id';

            $users = $this->select($sql);

        }

        return $users;
    }
    public function getTypes($params = []) {
        $sql = 'SELECT * FROM types';
        $types = $this->select($sql);

        return $types;
    }
}