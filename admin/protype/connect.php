<?php
namespace SmartWeb\Models;

include_once "config.php";

abstract class Connect 
{
    public  static abstract function connect();
}

class ConnectPDO extends Connect
{
    public static function connect()
    {
        try {
            return  new \PDO("mysql:host=" . SEVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);
        } catch (\PDOException $pe) {
            die("Could not connect to the database" . DATABASE . " :" . $pe->getMessage());
        }
    }
}

class ConnectMySqli extends Connect
{
    public static function connect()
    {
        try {
            $db = new \mysqli(SEVERNAME, USERNAME, PASSWORD, DATABASE);
            if ($db) {
                return  $db;
            }
            throw new  \Exception("Could not connect to the database" . DATABASE);
        } catch (\Throwable $t) {
            die($t->getMessage());
        }
    }
}
