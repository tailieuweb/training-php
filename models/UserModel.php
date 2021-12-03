<?php

use phpDocumentor\Reflection\Types\This;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    private static $_instance;

    public function findUserById($id)
    {
        if(is_object($id) || $id<0 || is_double($id) || empty($id)
        || is_array($id)){
            return 'Not invalid';
        }
        if (is_numeric($id) || is_string($id)) {
            $sql = 'SELECT * FROM users WHERE id = ' . $id;
            // var_dump($sql);
            // die();
            $user = $this->select($sql);
            return $user;
        } else {
            return false;
        }
    }

    public function findUser($keyword)
    {
        // var_dump(self::$_connection);
        // die();
        if ($keyword != null) {
            if (!is_bool($keyword) && strlen($keyword) <= 255) {
                $sql = "SELECT * FROM users WHERE name LIKE ? OR email LIKE ?";
                $stm = self::$_connection->prepare($sql);
                $name = '%' . $keyword . '%';
                $stm->bind_param('ss', $name, $name);
                // var_dump($stm);
                // die();
                $stm->execute();
                $users = [];
                $users = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
                return $users;
                //code tiep
            }
        } else {
            return false;
        }
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        // $md5Password = md5($password);
        // $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        // $user = $this->select($sql);
        // return $user;
        if (is_numeric($userName) || is_array($userName) || is_object($userName) || is_double($userName)
            || !is_string($userName)) {
            return 'Not invalid';
        }
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $password . '"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id)
    {
        if(is_object($id) || is_string($id) || $id<0 || is_double($id) || empty($id)
        || is_array($id)){
            return false;
        }
        else{
            $sql = 'DELETE FROM users WHERE id = ' . $id;
            return $this->delete($sql);
        }
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        $regex_email = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        $regex_not_special_sign = "/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹa-zA-Z0-9*\s]+$/";
        $regex_id = "/^[0-9*\s]+$/";
        // var_dump($input['email']);
        // die();
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);
        // var_dump($users);
        // die();
        if (
            $input['id'] != null and $input['name'] != null and $input['fullname'] != null and $input['email'] != null and $input['type'] != null and $input['password'] != null and !is_object($input['name']) and !is_object($input['id']) and !is_object($input['fullname']) and !is_object($input['email']) && preg_match($regex_not_special_sign, $input['fullname'])
            and preg_match($regex_not_special_sign, $input['name']) and preg_match($regex_email, $input['email']) && preg_match($regex_id, $input['id']) && is_bool($input['fullname']) != true && is_bool($input['name']) != true && is_bool($input['email']) != true && is_bool($input['type']) != true && strlen($input['name']) <= 100 && strlen($input['fullname']) < 100
        ) {
            if ($input['type'] == 'user' or $input['type'] == 'admin') {
                foreach ($users as $value) {
                    if ($value['id'] === $input['id']) {
                        $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '", 
                 fullname = "' . $input['fullname'] . '",
                 email = "' . $input['email'] . '",
                 type = "' . $input['type'] . '",
                 password="' . $input['password'] . '"
                WHERE id = ' . $input['id'];

                        // var_dump(is_bool($input['type']));
                        // var_dump($sql);
                        // die();
                        $user = $this->update($sql);
                        return $user;
                    }
                }
            }
        } else {
            // var_dump(preg_match($regex_not_special_sign, $input['name']));
            // var_dump($input['name']);
            // die();
            return false;
        }
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `fullname`, `email`, `type`, `password`) VALUES (" .
            "'" . $input['name'] . "', '" . $input['fullname'] . "', '" . $input['email'] . "', '" . $input['type'] . "', '" . $input['password'] . "')";
        $user = $this->insert($sql);
        // var_dump($sql);
        return $user;
    }


    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            // if(is_numeric(($params['keyword']))){
            //    return 'Not invalid';
            // }
            $sql = 'SELECT * FROM users 
            WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }
        return $users;
    }

    //!TODO: Get All Users Have Not Bank Account,Thanh An
    public  function getUserHaveNotBank()
    {
        $sql = "SELECT * FROM users WHERE NOT EXISTS (SELECT * FROM banks WHERE users.id = banks.user_id)";
        $users = $this->select($sql);
        return $users;
    }

    public static function getInstance()
    {
        if (self::$_instance !== null) {
            // var_dump('returning instance user');
            return self::$_instance;
        }
        // var_dump('creating instance user');
        self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * For testing
     * @param $a
     * @param $b
     */
    public function sumb($a, $b)
    {
        if (is_string($a) == true || is_string($b) == true) {
            return false;
        } else {
            return $a + $b;
        }
    }

    // public function test()
    // {
    //     $pattern = '/[a-z]/';
    //     $string = 'Học lập trình web online tại toidicode.com';
    //     if (preg_match($pattern, $string)) {
    //         echo 'chuỗi chứa toàn chữ';
    //     } else {
    //         echo 'chuỗi không chứa hết chữ';
    //     }
    // }

    public function startTransaction()
    {
        self::$_connection->begin_transaction();
    }

    public function rollback()
    {
        self::$_connection->rollback();
    }
}
