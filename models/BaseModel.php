<?php
require_once 'configs/database.php';

abstract class BaseModel {
    // Database connection
    protected static $_connection;

    // Singleton pattern:
    protected static $_user_instance;
    protected static $_bank_instance;
    protected static $_userRepo_instance;

    // Check if this app connect to database successfully:
    protected static $_isConnected = 200;

    public function __construct() {

        if (!isset(self::$_connection)) {
            
            try {
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                self::$_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

                if (self::$_connection->connect_errno) {
                    printf("Connect failed");
                    exit();
                }
                
            } catch (mysqli_sql_exception $e) {
                // var_dump($e); die();
                self::$_isConnected = 400;
            }

        }

    }

    /**
     * Query in database
     * @param $sql
     */
    protected function query($sql) {
        // $result = null;
        // if (!empty(self::$_isConnected) && (self::$_isConnected == 400)) {
        //     // Do nothing if this app can not connect to database server.
        // }
        // else {
        //     $result = self::$_connection->query($sql);
        // }
        // return $result;

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

}
