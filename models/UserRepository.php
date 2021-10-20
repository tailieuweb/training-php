<?php
trait UserRepository{
    public function del($id) {     
        return 'DELETE FROM users WHERE id = '.$id;     
    }
    public function findUId($id) {
        return 'SELECT * FROM users WHERE id = '.$id;
    }
    public function findU($keyword) {
        return 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function login($userName, $password) {
        $md5Password = md5($password);
        return 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateU($input) {
        return 'UPDATE users SET 
               email = "'.$input['email'].'",
                name = "'.$input['name'].'",
                 fullname = "'.$input['fullname'].'",
                 password="'. md5($input['password']) .'",
                  type = "'.$input['type'].'"
                WHERE id = ' . $input['id'];
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertU($input) {
        return "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`,`version`) VALUES (" .
        "'" . $input['name'] . "', '"
        . md5($input['password']) . "', '"
        . $input['fullname'] . "', '"
        . $input['email'] . "', '"
        . $input['type']
        . "', '"
        . 1
        . "')";       
    }

    /**
     * Search users
     * @param array $param
     * @return array
     */
    public function updateVs($input){
        $version = $input['version'] + 1;
        return 'UPDATE users SET              
                 version = "'.$version.'"
                WHERE id = ' . $input['id'];
    }
    public function getVs($id){
        return'SELECT version FROM users WHERE id = ' . $id;
    }
    // public function getUsers($params = []) {   
    //     if (!empty($params['keyword'])) {
           
    //         return 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';
    //         $users = self::$_connection->multi_query($sql);
            
    //     } else {
    //         return 'SELECT * FROM users';
    //     }       
    // }
}