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
    $users = [];
    $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $users; //return array
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

  public static function getInstance()
  {
    if (self::$_instance !== null) {
      return self::$_instance;
    }
    self::$_instance = new self();
    return self::$_instance;
  }
}
