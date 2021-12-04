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
            // $banks = self::$_connection->multi_query($sql);
            $banks = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM bank';
            $banks = $this->select($sql);
        }

        return $banks;
    }


    public function insertUser_bank($input = [])
    {

        /**
         * *********** Bắt lỗi giá trị truyền vào *********** 
         */

        // kiểm tra $input phải là một mảng. ok
        if (!is_array($input)) {
            return "Parameter is not array";
        }

        if (count($input) == 0) {
            return "Input empty";
        }

        // bắt lỗi số lượng giá trị trong mảng. ok
        if (count($input) !== 5) {
            return "Number of input parameter is not accord";
        }

        // bắt lỗi key name không phù hợp, (name, fullname, sdt, email, stk); ok
        // buộc người dùng truyển vào đúng định dạng mảng thì mới hợp lệ.
        if (
            !array_key_exists('name', $input) ||
            !array_key_exists('fullname', $input) ||
            !array_key_exists('sdt', $input) ||
            !array_key_exists('email', $input) ||
            !array_key_exists('stk', $input)
        ) {
            return "Key value is not match";
        }

        /** 
         * *********** Bắt lỗi kiểu dữ liệu cho từng giá trị. *********** 
         */

        // kiểm tra name có phải là string không.
        if (!is_string($input['name'])) {
            return "Name value is not string";
        }
        // kiểm tra kiểu dữ liệu cho name.
        // Must start with letter. ok
        // 6-32 characters. ok
        // Letters and numbers only. ok
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,120}$/', $input["name"])) {
            return "Name must start with letter and must be between 6 and 120 characters";
        }

        // kiểm tra fullname có phải là string không. ok
        if (!is_string($input['fullname'])) {
            return "Fullname value is not string";
        }

        // bắt lỗi độ dài fullname. ok
        if (strlen($input["fullname"]) < 6 || strlen($input["fullname"]) > 120) {
            return "Fullname must be between 6 and 120";
        }

        // stk bị rỗng.ok
        if (strlen($input["stk"]) == 0) {
            return "Card number is not valid";
        }

        // bắt lỗi stk không phải là số.ok
        if (!is_numeric($input["stk"])) {
            return "Card number is not valid";
        }

        // sdt bị rỗng.ok
        if (strlen($input["sdt"]) == 0) {
            return "Phone number is not valid";
        }

        // bắt lỗi sdt không phải là số.ok
        if (!is_numeric($input["sdt"])) {
            return "Phone number is not valid";
        }

        // bắt lỗi email không hợp lệ (cũng như độ dài chuỗi) ok
        if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
            return "Email is not valid";
        }

        /**
         * *********** bắt lỗi câu truy vấn. ok *********** 
         */
        $name = mysqli_real_escape_string(parent::$_connection, $input["name"]);
        $fullname = mysqli_real_escape_string(parent::$_connection, $input["fullname"]);
        $sdt = mysqli_real_escape_string(parent::$_connection, $input["sdt"]);
        $email = mysqli_real_escape_string(parent::$_connection, $input["email"]);
        $stk = mysqli_real_escape_string(parent::$_connection, $input["stk"]);

        // bắt lỗi tồn tại "số tài khoản".ok
        $sql = "SELECT * FROM bank WHERE `stk` = $stk";
        $banks = $this->select($sql);
        if (count($banks) > 0) {
            return "Card number is exists";
        }

        $sql = "INSERT INTO `bank` (`name`, `fullname`, `sdt`, `email`, `stk`) 
            VALUES (?, ?, ?, ?, ?)";
        $result = false;

        // bắt lỗi câu truy vấn.ok
        $stmt = mysqli_stmt_init(parent::$_connection);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $fullname, $sdt, $email, $stk);
            $result = mysqli_stmt_execute($stmt);
        }

        return $result;
    } // my magic number: 141211515

    public function updateUser_bank($input = [])
    {

        /**
         * *********** Bắt lỗi giá trị truyền vào *********** 
         */

        // kiểm tra $input phải là một mảng. ok
        if (!is_array($input)) {
            return "Parameter is not array";
        }

        if (count($input) == 0) {
            return "Input empty";
        }

        // bắt lỗi số lượng giá trị trong mảng. ok
        if (count($input) !== 6) {
            return "Number of input parameter is not accord";
        }

        // bắt lỗi key name không phù hợp, (name, fullname, sdt, email, stk); ok
        // buộc người dùng truyển vào đúng định dạng mảng thì mới hợp lệ.
        if (
            !array_key_exists('id', $input) ||
            !array_key_exists('name', $input) ||
            !array_key_exists('fullname', $input) ||
            !array_key_exists('sdt', $input) ||
            !array_key_exists('email', $input) ||
            !array_key_exists('stk', $input)
        ) {
            return "Key value is not match";
        }

        /** 
         * *********** Bắt lỗi kiểu dữ liệu cho từng giá trị. *********** 
         */

        // kiểm tra id có là số nguyên.
        if (!is_numeric($input['id'])) {
            return "Id value is not number";
        }

        // yêu cầu id là số thực.
        // kiểm tra id nhập vào là số nguyên dương.
        $check = filter_var($input['id'], FILTER_VALIDATE_INT);
        if (!($check !== FALSE)) {
            return "Id must integer value";
        }

        // kiểm tra id nhập vào là số nguyên dương.
        if ($input['id'] < 0) {
            return "Id value is negative";
        }

        // kiểm tra name có phải là string không.
        if (!is_string($input['name'])) {
            return "Name value is not string";
        }
        // kiểm tra kiểu dữ liệu cho name.
        // Must start with letter. ok
        // 6-32 characters. ok
        // Letters and numbers only. ok
        if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,120}$/', $input["name"])) {
            return "Name must start with letter and must be between 6 and 120 characters";
        }

        // kiểm tra fullname có phải là string không. ok
        if (!is_string($input['fullname'])) {
            return "Fullname value is not string";
        }

        // bắt lỗi độ dài fullname. ok
        if (strlen($input["fullname"]) < 6 || strlen($input["fullname"]) > 120) {
            return "Fullname must be between 6 and 120";
        }

        // stk bị rỗng.ok
        if (strlen($input["stk"]) == 0) {
            return "Card number is not valid";
        }

        // bắt lỗi stk không phải là số.ok
        if (!is_numeric($input["stk"])) {
            return "Card number is not valid";
        }

        // sdt bị rỗng.ok
        if (strlen($input["sdt"]) == 0) {
            return "Phone number is not valid";
        }

        // bắt lỗi sdt không phải là số.ok
        if (!is_numeric($input["sdt"])) {
            return "Phone number is not valid";
        }

        // bắt lỗi email không hợp lệ (cũng như độ dài chuỗi) ok
        if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
            return "Email is not valid";
        }

        /**
         * *********** bắt lỗi câu truy vấn. ok *********** 
         */
        $id = mysqli_real_escape_string(parent::$_connection, $input["id"]);
        $name = mysqli_real_escape_string(parent::$_connection, $input["name"]);
        $fullname = mysqli_real_escape_string(parent::$_connection, $input["fullname"]);
        $sdt = mysqli_real_escape_string(parent::$_connection, $input["sdt"]);
        $email = mysqli_real_escape_string(parent::$_connection, $input["email"]);
        $stk = mysqli_real_escape_string(parent::$_connection, $input["stk"]);

        //  chuyển đổi id thành số.
        $id = intval($id);

        // bắt lỗi không tìm thấy đối tượng để cập nhập.
        $sql = "SELECT * FROM bank WHERE `id` = $id";
        $found_bank_by_id = $this->select($sql);
        if (count($found_bank_by_id) <= 0) {
            return "Not found bank to update";
        }

        // chỉ khi số tài khoản được cập nhập khác với số cũ thì mới thực hiện so sánh với 
        // stk khác trong danh sách. nếu số hiện tại muốn cập nhập vẫn trùng với số mới thì không cần so sánh với csdl.
        // trường hợp lỗi cập nhập số tài khoản khác là không thể, vì stk được lấy theo ID.

        if ($found_bank_by_id[0]['stk'] != $stk) {
            // bắt lỗi tồn tại "số tài khoản".ok
            $sql = "SELECT * FROM bank WHERE `stk` = $stk";
            $banks = $this->select($sql);
            if (count($banks) > 0) {
                return "Card number is exists";
            }
        }

        $sql = "UPDATE bank SET `name` = ?, fullname = ?, email = ?, sdt = ?, stk = ?
        WHERE id = ?";

        $result = false;

        // bắt lỗi câu truy vấn.ok
        $stmt = mysqli_stmt_init(parent::$_connection);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssi", $name, $fullname, $sdt, $email, $stk, $id);
            $result = mysqli_stmt_execute($stmt);
        }

        return $result;
    }

    public function cost()
    {
        return $this->getBanks(null);
    }
}
