<?php
require_once 'configs/database.php';

abstract class BaseModel {
    // Database connection

    protected static $_connection;
    // Life of session, 3600 = 1h
    private $_csrf_time_live = 3600;
    private $_csrf_value = '';

    public function __construct() {

        if (!isset(self::$_connection)) {
            self::$_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            // Create token
            $token = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

            // Save token in 1h
            setcookie($token, time() + $this->_csrf_time_live);
            $this->_csrf_value = $token;

            if (self::$_connection->connect_errno) {
                printf("Connect failed");
                exit();
            }
            var_dump($token);
        }

    }
    // Get token value
    function get_token_value(){
        return $this->_csrf_value;
    }
    /**
     * Query in database
     * @param $sql
     */
    protected function query($sql) {

        $result = self::$_connection->query($sql);
        return $result;
    }

    /**
     * Select statement
     * @param $sql
     */
    protected function select($sql) {
        $result = $this->query($sql);
        $rows = [];
        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    /**
     * Delete statement
     * @param $sql
     * @return mixed
     */
    protected function delete($sql, $token) {
        if($this->_csrf_value == $token){
            $result = $this->query($sql);
            return $result;
        }

    }

    /**
     * Update statement
     * @param $sql
     * @return mixed
     */
    protected function update($sql) {
        $result = $this->query($sql);
        return $result;
    }

    /**
     * Insert statement
     * @param $sql
     */
    protected function insert($sql) {
        $result = $this->query($sql);
        return $result;
    }

}
