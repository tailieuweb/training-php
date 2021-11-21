<?php
// require './models/Pattern/UserRepositoryPattern.php';
require_once './models/BaseModel.php';
class UserModel extends BaseModel
{
    private static $instanceUserModel = NULL;
    public $x;
    public function __construct()
    {
        // return self::$instanceUserModel;
    }
    public static function getInstance() : UserModel{
        if(self::$instanceUserModel == NULL){
            self::$instanceUserModel = new UserModel();
        }
        return self::$instanceUserModel;
    }

    public function findUserById($id) {
        $id = BaseModel::matchRegexInput($id);
        $sql = BaseModel::connectDatabase()->prepare("SELECT * FROM users WHERE id = ?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $user = array();
        $user = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $user;
    }

    public function find($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        // $user = $this->select($sql);
        // return $user;
        // $sql_stmt = mysqli_prepare($_connection,'SELECT * FROM users WHERE user_name LIKE   ? OR user_email LIKE ?');
        // mysqli_stmt_bind_param($sql_stmt,'ss',$keyword,$keyword);
        // $user = mysqli_stmt_execute($sql_stmt);
        // return $user;
    }
    

    public function auth($userName, $password) {
        if(is_string($userName) || is_string($password)){
            $md5Password = md5($password);
            $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';
            $user = $this->select($sql);
        }
        else{
            $user = [];
        }
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id) {
        if(is_numeric($id)){    
            if(is_float($id)){
                return false;
            }   
            else{
                $sql = 'DELETE FROM users WHERE id = '.$id;
                return $this->delete($sql);
            }   
           
        } 
        else{
            return false;
        }
    }



    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input, $bankModel) { 
        if(isset($input['user_id'])){
            $bankModel->updateBank($input);
        }
        else{
            $t = base64_decode($input['version']);
            $str = substr($t,18);
            $temp = 'SELECT version FROM users WHERE id = '.$input['id'].'';
            $newTemp = $this->select($temp);
            if($newTemp[0]['version'] == $str){
                $newV = $str+1;
                $sql = 'UPDATE users SET 
                    name = "' . $input['name'] .'", 
                    email = "'.$input['email'].'",
                    fullname = "'.$input['fullname'].'",
                    password="'. md5($input['password']) .'", type = "'.$input['type'].'", version = "'.$newV.'"
                    WHERE id = ' . $input['id'] ;
                $user = $this->update($sql);  
                //header('location: list_users.php?success');
                return $user;           
            } 
            else{                
                //header('location: list_users.php?err');  
                return false;
            }    
        }
           
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input, $bankModel) {
        if(isset($input['user_id'])){
            $bankModel->insertBank($input);
        }
        else{
            $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`,`fullname`,`email`,`type`,`version`) VALUES (" .
            "'" . $input['name'] . "', '"
            . md5($input['password']) . "', '"
            . $input['fullname'] . "', '"
            . $input['email'] . "', '"
            . $input['type']
            . "', '"
            . 1
            . "')";   
            $user = $this->insert($sql);
            return $user;
        }      
                 
    }

    /**
     * Search users
     * @param array $param
     * @return array
     */
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';
           
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = $this->select($sql);
            // $users = self::$_connection->multi_query($sql);
            
        } else {
           
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
         return  $users;
    }
    public function removeSpecialCharacter($string){
        $array = ["'",'"',"<",">","*","","!","/","%",";","#"];
        $string = str_replace($array,'',$string);
        return $string;
    }


}
