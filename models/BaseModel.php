<?php
require_once 'configs/database.php';

abstract class BaseModel {
    // Database connection
    protected static $_connection;

    public function __construct() {

        if (!isset(self::$_connection)) {
            self::$_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            // self::$_connection->set_charset(DB_CHARSET);
            mysqli_set_charset(self::$_connection,DB_CHARSET);
            if (self::$_connection->connect_errno) {
                printf("Connect failed");
                exit();
            }
        }

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
    protected function delete($sql) {
        $result = $this->query($sql);
        return $result;
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

    protected function matchRegexInput($param){
        $array_replace = array("'",'"',"<",">");
        $str = str_replace($array_replace,'',$param);
        return $str;
    }
}
