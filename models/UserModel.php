<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
  public function findUserById($id = 0)
  {
    if (!is_integer($id)) return [];
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
    $userName = trim($userName);
    $userName = stripcslashes($userName);
    $userName = htmlspecialchars($userName);
    $encodePassword = md5($password);
    $sql = "SELECT * FROM users WHERE name = '$userName' AND password = '$encodePassword'";
    $user = $this->select($sql);
    return $user; //return array
  }
}
