<?php
require_once 'configs/database.php';

abstract class BaseModel {
    // Database connection
    protected static $_connection;
    protected static $userInstance;
    protected static $bankInstance;

    public function __construct() {
        //Try catch exception:

        try{
            if(!isset(self::$_connection)){
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                self::$_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
              
               
            }
         
        }
       catch(mysqli_sql_exception $e)
       {
        require_once "Exception.php";
        exit();
       }catch(Exception $a){
        require_once "Exception.php";
        exit();
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

}
