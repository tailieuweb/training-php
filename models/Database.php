<?php


class Database
{
    public static $connect = null;

    public function __construct()
    {
        if (self::$connect == null) {
            self::$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            self::$connect->set_charset('utf8mb4');
        }
        if (self::$connect == null) {
            echo "CAN'T CONNECT TO DATABASE";
        }

        return self::$connect;
    }

    public function __destruct()
    {
        self::$connect = null;
    }
}