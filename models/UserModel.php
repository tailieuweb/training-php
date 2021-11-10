<?php

use function PHPUnit\Framework\isEmpty;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
  public static function getInstance()
  {
    if (self::$_instance !== null) {
      return self::$_instance;
    }
    self::$_instance = new self();
    return self::$_instance;
  }
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
  function checkUserExist($id)
  {
    if (is_null($id) || is_string($id) || !is_numeric($id) || empty($id)) {
      return "error";
    }
    $sql = 'SELECT * FROM users WHERE  `id` =' . $id;
    $user = $this->select($sql);
    if (empty($user)) {
      return false;
    }
    if ($user[0]["id"] == $id) {
      return true;
    }
  }
  //todo--------------------------------------------------------------
  public function deleteUserById($id)
  {
    if (is_null($id) || is_string($id) || !is_numeric($id) || empty($id)) {
      return "error";
    }
    if ($this->checkUserExist($id) == true) {
      $sql = 'DELETE FROM users WHERE id = ' . $id;
      $check = $this->delete($sql);
      return true;
    } else {
      return "User doesn't exis";
    }
  }
  //--------------------------------------------------------------
  public function updateUser($input)
  {

    if (
      is_numeric(($input['id'])) == false || $input['id'] == 'e'
      || is_string($input['name']) == false || is_string($input['fullname']) == false || is_string($input['email']) == false
      || is_string($input['type']) == false || is_string($input['password']) == false
      || strlen($input['name']) == 0 || strlen($input['fullname']) == 0 || strlen($input['email']) == 0
      || strlen($input['type']) == 0 || strlen($input['password']) == 0
    ) {
      return "error";
    }

    if ($this->checkUserExist(($input['id'])) == true) {
      $sql = 'UPDATE users SET 
      name = "' . mysqli_real_escape_string(self::$_connection, $input['name'])  . '", 
      fullname="' . ($input['fullname']) . '",
      email="' . ($input['email']) . '",
      password="' . (md5($input['password'])) . '",
      type="' . $input['type'] . '"
      WHERE id = ' . ($input['id']);
      $user = $this->update($sql);
      return true;
    } else {
      return "User not exist";
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
