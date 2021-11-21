<?php

declare(strict_types=1);

namespace SmartWeb;

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

    protected function bind_params($stmt, $params)
    {
        if (empty($params) || !is_array($params)) {
            return;
        }
        call_user_func_array(array($stmt, 'bind_param'), $params);
    }
}
//mysqli
class DBMYSQL extends DB
{
    public function __construct()
    {
        if (empty(static::$con))
            static::$con = ConnectMySqli::connect();
        return static::$con;
    }
    public function notSelect($sql, $param = null)
    {
        $stmt = static::$con->prepare($sql);
        return $stmt->execute();
    }
    public function select($sql,  $param = null)
    {
        $stmt = static::$con->prepare($sql);
        $this->bind_params($stmt, $param);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
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
