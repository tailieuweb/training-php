<?php
require_once 'configs/database.php';

 class BaseModel {
    // Database connection
    private $connection;
    private static $instance = NULL;
    
    private function __construct()
    {
        return $this->connection;
    }

    public function connectDatabase()  {
        $this->connection =new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT) or die('Connection Failed' or mysqli_connect_error());
        return $this->connection;    
    }

    public static function getInstance() : BaseModel{
        if(self::$instance == NULL){
            self::$instance = new BaseModel();
        }
        return self::$instance;
    }


    // public static function connectDatabase(){
    //     return self::$_connection;
    // }
   
    /**
     * Query in database
     * @param $sql
     */
    protected function query($sql) {
        $result =   $this->connectDatabase()->query($sql);
        return $result;
    }

    /**
     * Select statement
     * @param $sql
     */
    protected function select($sql) {
        $result = $this->connectDatabase()->query($sql);
        $rows = [];
        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function select_result($sql){
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
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


    public static function matchRegexInput($param){
        $array_replace = array("'",'"',"<",">");
        $str = str_replace($array_replace,'',$param);
        return $str;
    }
    public static function matchRegexLogin($username,$password){
        $check_username = preg_match('/^[A-Z-a-z-0-9]+$/',$username);
        $check_password = preg_match('/^[A-Z-a-z-0-9]+$/',$password);
        if($check_username == 1 && $check_password == 1){
            return true;
        }
        else{
            return false;
        }
    }
    // protected abstract function CreateProduct1();
    // protected abstract function CreateProduct2();
}
