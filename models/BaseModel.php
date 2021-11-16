<?php
require_once 'configs/database.php';

abstract class BaseModel
{
  protected static $_connection;
  //--------------------------------------------------------------
  public function __construct()
  {
    try {
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      self::$_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    } catch (mysqli_sql_exception $e) {
      return $e->getMessage();
    }
  }
  //--------------------------------------------------------------
  protected function query($sql)
  {
    $result = self::$_connection->query($sql);
    return $result;
  }
  //--------------------------------------------------------------
  protected function select($sql)
  {
    $result = $this->query($sql);
    $rows = [];
    if (!empty($result)) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }
    return $rows;
  }
}
