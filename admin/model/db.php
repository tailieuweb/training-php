<?php

namespace SmartWeb\DataBase;

include_once "config.php";

use Exception;
//----------------------------------------------------------------------------------------------------------
//creator
abstract class DB
{
    protected static $connect = [];
    public function __construct()
    {
        $this->getConnect();
    }
    public abstract  function getConnect();
    public abstract  function select($sql, array $param = null);
    public abstract  function delete($sql, array $param = null);
    public abstract  function insert($sql, array $param = null);
    public abstract  function update($sql, array $param = null);
    protected  static function bindParam($stmt, $values)
    {
        if (empty($values) || !is_array($values)) {
            return;
        }
        foreach ($values as $key => &$value) {
            $stmt->bindParam(":{$key}", $value);
        }
    }
}

class DBPDO extends DB
{
    private static $name = 'pdo';
    public  function getConnect()
    {
        if (empty(self::$connect[static::$name])) {
            self::$connect[static::$name] =  new ConnectPDO;
        }
        return self::$connect[static::$name];
    }
    public  function insert($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        return $stmt->execute();
    }
    public  function update($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        return $stmt->execute();
    }

    public function select($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public  function delete($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        return $stmt->execute();
    }
}

class DBMYSQL extends DB
{
    private static $name = 'mysqli';
    public  function getConnect()
    {
        if (empty(self::$connect[static::$name])) {
            self::$connect[self::$name]  =  new ConnectMySqli;
        }
        return self::$connect[static::$name];
    }

    public  function insert($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        return $stmt->execute();
    }
    public  function update($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        return $stmt->execute();
    }
    public function select($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        $stmt->execute();
        $result = $stmt->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    public  function delete($sql, array $param = null)
    {
        $stmt = self::$connect[static::$name]->connect()->prepare($sql);
        self::bindParam($stmt, $param);
        return $stmt->execute();
    }
}
//----------------------------------------------------------------------------------------------------------
//product.
abstract class Connect
{
    public abstract function connect();
}

class ConnectPDO extends Connect
{
    public  function connect()
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
    public function connect()
    {
        try {
            $db = new \mysqli(SEVERNAME, USERNAME, PASSWORD, DATABASE);
            if ($db) {
                return  $db;
            }
            throw new  Exception("Could not connect to the database" . DATABASE);
        } catch (\Throwable $t) {
            die($t->getMessage());
        }
    }
}
