<?php

use function PHPSTORM_META\type;

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $id = $this->hashToId($id);
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
    public function deleteUserById($id) {
        $id = $this->hashToId($id);
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
            $sql = 'UPDATE users SET 
            name = "' . $input['name'] .'", 
            fullname = "' . $input['fullname'] .'",
            type =  "' . $input['type'] .'",
            email =  "' . $input['email'] .'",
            password ="'. md5($input['password']) .'"
           WHERE id = ' . $input['id'];
   $user = $this->update($sql);

   return $user;
        
       
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
    
            $password = md5($input['password']);
            // SQL
            $sql = "INSERT INTO `users`(`name`, `fullname`, `email`, `type`, `password`) 
            VALUES ('" .($input['name']) . "','" . ($input['fullname']) . "','" . ($input['email']) . "','" . ($input['type']) . "','" . ($password) . "')";
            $user = $this->insert($sql);
    
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
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }

    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b) {
        if(!is_numeric($a)) return 'error';
        if(!is_numeric($b)) return 'error';
        return $a + $b;
    }

    private function hashToId($hashId){
        $hashId = substr($hashId, 3, -3);
        $users = $this->getUsers();
        foreach($users as $user){

            if (md5($user['id']) == $hashId) {
                return $user['id'];
            }
            
        }

        return null;
    }
}