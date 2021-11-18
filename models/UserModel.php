<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
  public function findUserById($id = 0)
  {
    if (!is_integer($id)) return [];
    //-------------------------------------------------------------
    $sql = "SELECT * FROM users WHERE id = $id";
    $user = $this->select($sql);
    return $user; //return array
  }
  //--------------------------------------------------------------
  //user admin , pass admin
  public function auth($userName = "", $password = "")
  {
    //not string -> fail
    if (!is_string($userName) || !is_string($password)) return [];
    //-------------------------------------------------------------
    $encodePassword = md5($password);
    $sql = "SELECT * FROM users WHERE name = ? AND password = ?";
    $stmt = self::$_connection->prepare($sql);
    $stmt->bind_param("ss", $userName, $encodePassword);
    $stmt->execute();
    $users=[];
    $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $users; //return array
  }
}
