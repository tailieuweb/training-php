<?php

declare(strict_types=1);

namespace SmartWeb\Models;

require_once "connect.php";

//----------------------------------------------------------------------------------------------------------
//creator
interface IDB
{
    public function select($sql);
    public function notSelect($sql);
}
abstract class DB implements IDB
{
    protected static $con;
    protected function bindParam($stmt, $values)
    {
        if (empty($values) || !is_array($values)) {
            return;
        }
        foreach ($values as $key => &$value) {
            $stmt->bindParam(":{$key}", $value);
        }
    }
}
//mysqli
class DBMYSQL extends DB
{
    public function __construct()
    {
        if (empty(static::$con))
            static::$con = ConnectMySqli::connect();
        return $this->con;
    }
    public function notSelect($sql, $param = null)
    {
        $stmt = $this->con->prepare($sql);
        $this->bindParam($stmt, $param);
        return $stmt->execute();
    }
    public function select($sql, $param = null)
    {
        $stmt = $this->con->prepare($sql);
        $this->bindParam($stmt, $param);
        $stmt->execute();
        $result = $stmt->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
//pdo
class DBPDO extends DB
{
    public function __construct()
    {
        if (empty(static::$con))
            static::$con = ConnectPDO::connect();
        return static::$con;
    }

    public function notSelect($sql, $param = null)
    {
        $stmt = static::$con->prepare($sql);
        $this->bindParam($stmt, $param);
        return $stmt->execute();
    }
    public function select($sql, $param = null)
    {
        $stmt = static::$con->prepare($sql);
        $this->bindParam($stmt, $param);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}
