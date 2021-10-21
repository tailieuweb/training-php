<?php

require_once 'BaseModel.php';
require_once './repository/UserRepository.php';

class UserModel extends BaseModel{
    use UserRepository;

    public function findUserById($id) {
        $sql = $this->findUId($id);
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = $this->findU($keyword);
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
        $sql = $this->login($userName,$password);
        $user = $this->select($sql);
		//var_dump($sql);die();
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        $sql = $this->del($id);
        return $this->delete($sql);

    }



    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        $sql = $this->updateU($input);

        $user = $this->update($sql);
        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = $this->insertU($input);
        $user = $this->insert($sql);
        return $user;
                
    }

    /**
     * Search users
     * @param array $param
     * @return array
     */
    public function updateVersion($input){
        $version = $input['version'] + 1;
        $sql = $this->updateVs($input);
        $user = $this->update($sql);
        //var_dump($input['version']); die(); 
        return $user;
    }
    public function getVersion($id){
        $sql = $this->getVs($id);
        $users = $this->select($sql);
       // var_dump($users[0]['version']);die();
        return $users[0]['version'];
    }
    public function getUsers($params = []) {
        //Keyword
       
        if (!empty($params['keyword'])) {
           
            $sql = $this->findByName($params['keyword']);

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);
            
        } else {
            $sql = $this->selectUser();
            $users = $this->select($sql);
        }
        return $users;
       
    }

    public static function getInstance() {
        if (self::$_instance !== null){
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}