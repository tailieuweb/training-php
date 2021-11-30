<?php
require_once 'BaseModel.php';

class UserModel extends BaseModel
{

  private static $_instance;

  //singleton pattern
  public static function getInstance()
  {
    if (self::$_instance !== null) {
      return self::$_instance;
    }
    self::$_instance = new self();
    return self::$_instance;
  }

  public function findUserById($id = 0)
  {
    if (!is_integer($id)) return [];
    //-------------------------------------------------------------
    $sql = "SELECT * FROM users WHERE id = $id";
    $user = $this->select($sql);
    return $user; //return array
  }
  //
  public function checkUserExist($id)
  {
    if (!is_integer($id) || empty($id)) {
      return "error";
    } else {
      $sql = 'SELECT * FROM users WHERE  `id` =' . $id;
      $users = $this->query($sql);
      if ($users->num_rows == 0) {
        return false;
      } else {
        return true;
      }
    }
  }
  //--------------------------------------------------------------
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
    if (!is_integer($id)) {
      return "error";
    }
    if ($this->checkUserExist($id) == true) {
      $sql = 'DELETE FROM users WHERE id = ' . $id;
      return $this->delete($sql);
    } else {
      return "User doesn't exist";
    }
  }
  //--------------------------------------------------------------
  public function updateUser($input)
  {
    if (empty($input)) {
      return "error";
    }
    if (empty($input['id']) || empty($input['name']) || empty($input['fullname']) || empty($input['email']) || empty($input['password']) || empty($input['type'])) {
      return "error";
    }
    if (
      is_integer(($input['id'])) == false  || $input['id'] == 'e'
      || is_string($input['name'])  == false || is_string($input['fullname']) == false || is_string($input['email']) == false
      || is_string($input['type']) == false || is_string($input['password']) == false
      || strlen($input['name']) == 0 || strlen($input['fullname']) == 0 || strlen($input['email']) == 0
      || strlen($input['type']) == 0 || strlen($input['password']) == 0
    ) {
      return "error";
    }
    if ($this->checkUserExist($input['id']) == false) {
      return "User not exist";
    } else {
      $sql = self::$_connection->prepare("UPDATE `users` SET `name`=?,`fullname`=?,`email`=?,`type`=?,`password`=? WHERE `id` =?");
      $sql->bind_param("sssssi", $input['name'], $input['fullname'], $input['password'], $input['email'], $input['type'], $input['id']);
      return $sql->execute();
    }
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
    $users = null;
    if (!empty($params['keyword'])) {
      $stmt = self::$_connection->prepare("SELECT * FROM users WHERE name LIKE CONCAT('%',?,'%')");
      if ($stmt) {
        $stmt->bind_param("s", $params['keyword']);
        $stmt->execute();
        $users = array();
        $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      }
    } else {
      $sql = 'SELECT * FROM users';
      $users = $this->select($sql);
    }
    return $users;
  }
}
