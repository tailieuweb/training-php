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
  public function auth($userName = "", $password = "")
  {
    if (
      empty($userName) || empty($password) ||
      !is_string($userName) || !is_string($password)
    ) return [];
    $md5Password = md5($password);
    $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $md5Password . '"';
    $user = $this->select($sql);
    return $user; //return array
  }
}
