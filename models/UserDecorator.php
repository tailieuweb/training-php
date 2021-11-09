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

    public function updateUser($input, $bankMode)
    {

        $result = ResultClass::getInstance();
        $id = $this->decryptID($input['id']);
        $user = $this->findUserById($input['id']);

        if ($user) {
            if ($user['version'] == $input['version']) {
                $sql = 'UPDATE `users` SET 
                name = "' . $this->BlockSQLInjection($input['name']) . '", 
                 fullname="' . $this->BlockSQLInjection($input['fullname']) . '",
                 email="' . $this->BlockSQLInjection($input['email']) . '",
                 type="' . $this->BlockSQLInjection($input['type']) . '",
                 password="' . md5($input['password']) . '",
                 version="' . ($input['version'] + 1) . '"
                 WHERE id = ' . $id;
                $user = $this->update($sql);
                if ($user == true) {
                    $bank = $bankMode->updateBank($id, $input['cost']);
                    if ($bank == true) {
                        $result->setData("Đã update thành công");
                    }
                } else {
                    $result->setError("Lỗi");
                }
            } else {
                $result->setError("Dữ liệu đã được cập nhật trước đó! Xin hãy reload lại trang");
            }
        } else {
            $result->setError("Không tìm thấy id của user");
        }
        return $result;
    }
    public function deleteUser($id, $bankModel)
    {
        $result = false;
        $id = $this->decryptID($id);
        $sql = 'DELETE FROM users WHERE id = ' . $id;
        $user =  $this->delete($sql);
        if ($user) {
            $bank = $bankModel->deleteBankByUserId($id);
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
    // Find User By id
    public function findUserById($id)
    {
        $id = $this->decryptID($id);
        $sql = 'SELECT * FROM users WHERE id = ' . $id;
        $user = $this->select($sql);

        return isset($user[0]) ? $user[0] : false;
    }
    /**
     * Decrypt id
     */
    private function decryptID($md5Id)
    {
        if (!is_numeric($md5Id) && !is_string($md5Id)) {
            return null;
        }
        if (is_numeric($md5Id)) {
            if ($md5Id <= 0) {
                return $md5Id;
            }
        }
        foreach ($this->getUsers() as $item) {
            if (md5($item['id'] . 'TeamJ-TDC') == $md5Id) {
                return $item['id'];
            }
        }
        return NULL;
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