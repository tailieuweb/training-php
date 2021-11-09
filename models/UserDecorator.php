<?php
require_once 'Result.php';
require_once 'BaseModel.php';

class UserDecorator extends BaseModel
{
    protected static $_instance;
    public $userModel;
    //constructor
    public function __construct()
    {
        $this->userModel = UserModel::getInstance();
    }

    public function insertUser($input, $bankModel)
    {
        $result = false;
        // USER
        $checkEmailStyle = $this->checkEmailStyle($input['email']);
        $checkEmailExist = $this->checkEmailExist($input['email']);
        if ($checkEmailExist || !$checkEmailStyle) {
            return false;
        }
        $password = md5($input['password']);
        // SQL
        $sql = "INSERT INTO `users`(`name`, `fullname`, `email`, `type`, `password`) 
        VALUES ('" . $this->BlockSQLInjection($input['name']) . "','" . $this->BlockSQLInjection($input['fullname']) . "','" . $this->BlockSQLInjection($input['email']) . "','" . $this->BlockSQLInjection($input['type']) . "','" . $this->BlockSQLInjection($password) . "')";
        $user = $this->insert($sql);
        // BANK
        if ($user) {
            $user1 = $this->userModel->findUserByEmail($input['email']);
            $userId = $user1['id'];
            $bank = $bankModel->insertBank($userId, $input['cost-decorator']);
            if ($bank) {
                $result = true;
            }
        }
        return $result;
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
            $keyword = $this->BlockSQLInjection($params['keyword']);
            $sql = 'SELECT * 
                    FROM `users` 
                    WHERE `name` LIKE "%' . $keyword . '%"' . ' OR `fullname` LIKE "%' . $keyword . '%" OR `email` LIKE "%' . $keyword . '%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM `users` ORDER BY `id`';
            $users = $this->select($sql);
        }

        return $users;
    }
    /**
     * Check Email Style
     */
    private function checkEmailStyle($email)
    {
        if (!is_string($email)) {
            return false;
        }
        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)) {
            return true;
        }
        return false;
    }
    /**
     * Check Email Style
     */
    private function checkEmailExist($email)
    {
        if (!is_string($email)) {
            return false;
        }
        foreach ($this->getUsers() as $user) {
            if ($user['email'] == $email) {
                return true;
            }
        }
        return false;
    }
    public static function getInstance()
    {

        if (self::$_instance != null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        if (!empty(self::$code) && (self::$code == 400)) {
            return 400;
        }
        return self::$_instance;
    }
}