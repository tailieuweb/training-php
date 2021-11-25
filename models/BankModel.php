<?php

require_once 'BaseModel.php';
$ds       = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
require_once("{$base_dir}models{$ds}IBank.php");
class BankModel extends BaseModel implements IBank
{
    public static function getInstance()
    {
        if (self::$_instance !== null) {
            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }

    public function findBankById($id)
    {

        $sql = 'SELECT * FROM bank WHERE id = ' . $id;
        $banks = $this->select($sql);

        return $banks;
    }

    /**
     * Search banks
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {

        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM bank WHERE name LIKE "%' . $params['keyword'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $banks = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM bank';
            $banks = $this->select($sql);
        }

        return $banks;
    }

    public function insertUser_bank($input)
    {
        // bắt lỗi số lượng value request.
        if (count($input) !== 5) {
            return "Số lượng tham số truyền vào không phù hợp";
        }

        // bắt lỗi câu truy vấn.
        $name = mysqli_real_escape_string(parent::$_connection, $input["name"]);
        $fullname = mysqli_real_escape_string(parent::$_connection, $input["fullname"]);
        $sdt = mysqli_real_escape_string(parent::$_connection, $input["sdt"]);
        $email = mysqli_real_escape_string(parent::$_connection, $input["email"]);
        $stk = mysqli_real_escape_string(parent::$_connection, $input["stk"]);

        // bắt lỗi độ dài value.
        if (strlen($name) < 8 || strlen($name) > 120) {
            return "Name must be between 8 and 120";
        }

        // bắt lỗi độ dài value.
        if (strlen($fullname) < 8 || strlen($fullname) > 120) {
            return "Fullname must be between 8 and 120";
        }

        // bắt lỗi email không hợp lệ (cũng như độ dài chuỗi)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email is not valid";
        }

        // stk bị rỗng.
        if (strlen($stk) == 0) {
            return "Card number is not valid";
        }

        // bắt lỗi stk không phải là số.
        if (!is_numeric($stk)) {
            return "Card number is not valid";
        }

        // bắt lỗi tồn tại "số tài khoản".
        $sql = "SELECT * FROM bank WHERE `stk` = $stk";
        $banks = $this->select($sql);
        if (count($banks) > 0) {
            return "Card number is exists";
        }

        $sql = "INSERT INTO `bank` (`name`, `fullname`, `sdt`, `email`, `stk`) 
        VALUES (?, ?, ?, ?, ?)";
        $result = false;

        // bắt lỗi câu truy vấn.
        $stmt = mysqli_stmt_init(parent::$_connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $result = false;
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $fullname, $sdt, $email, $stk);
            $result = mysqli_stmt_execute($stmt);
        }

        return $result;
    }

    public function updateUser_bank($input)
    {
        $sql = 'UPDATE bank SET 
                 name = "' . $input['name'] . '", 
                 fullname = "' . $input['fullname'] . '",
                 email = "' . $input['email'] . '", 
                 sdt = "' . $input['sdt'] . '", 
                 stk="' . $input['stk'] . '"
                WHERE id = ' . $input['id'];
        $result = $this->update($sql);

        return $result;
    }

    public function cost()
    {
        return $this->getBanks(null);
    }
}
