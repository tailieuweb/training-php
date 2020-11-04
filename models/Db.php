<?php
class Db
{
    public static $connection = NULL;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$connection->set_charset('utf8-mb4');
        }
        return self::$connection;
    }
    public function select($sql)
    {
        $sql->execute();
        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function escape($string)
    {
        return mysqli_real_escape_string(self::$connection, trim($string));
    }
}
