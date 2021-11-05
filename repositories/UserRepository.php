<?php

require_once 'models/BaseModel.php';
class UserRepository extends BaseModel
{
  public function findUserById($id)
  {
    $sql = 'SELECT * FROM users WHERE id = ' . $id;
    $user = $this->select($sql);
    return $user;
  }
  //--------------------------------------------------------------
  public function auth($userName, $password)
  {
    $md5Password = md5($password);
    $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "' . $md5Password . '"';
    $user = $this->select($sql);
    return $user;
  }
  //--------------------------------------------------------------
  public function deleteUserById($id)
  {
    $sql = 'DELETE FROM users WHERE id = ' . $id;
    return $this->delete($sql);
  }
  //--------------------------------------------------------------
  public function updateUser($input)
  {
    $sql = 'UPDATE users SET 
                 name = "' . $input['name'] . '", 
                 password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];
    $user = $this->update($sql);
    return $user;
  }
  //--------------------------------------------------------------
  public function insertUser($input)
  {
    $name = htmlspecialchars($input['name']);
    $fullname = htmlspecialchars($input['fullname']);
    $email = htmlspecialchars($input['email']);
    $type = htmlspecialchars($input['type']);
    $password = md5($input['password']);
    $sql = "INSERT INTO `users` (`name`, `fullname`, `email`, `type`, `password`)
                VALUES ('$name', '$fullname', '$email', '$type', '$password') ";
    $user = $this->insert($sql);
    return $user;
  }
  //--------------------------------------------------------------
  public function getUsers($params = [])
  {
    //Keyword
    if (!empty($params['keyword'])) {
      $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';
      $users = $this->select($sql);
    } else {
      $sql = 'SELECT * FROM users';
      $users = $this->select($sql);
    }
    return $users;
  }
  public function sumb($a, $b)
  {
    return $a + $b;
  }
}
