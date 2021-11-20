<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel
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
                 fullname = "' . $input['fullname'] . '", 
                 email = "' . $input['email'] . '",
                 type = "' . $input['type'] . '",
                 password="' . md5($input['password']) . '"
                WHERE id = ' . $input['id'];
    $user = $this->update($sql);
    return $user;
  }
  //--------------------------------------------------------------
  public function insertUser($input)
  {
    $user = null;

    if (empty($input) || is_numeric($input) || is_object($input) || is_string($input)) {
      return false;
    }
    if (!empty($input['password']) && !empty($input['name']) && !empty($input['type'])) {

      $result = $this->query('SELECT name FROM users WHERE name = "' . $input['name'] . '"');
      if ($result->num_rows == 0) {
        // row not found, do stuff...
        if (is_string($input['password']) && !preg_match("/(\s)/i", $input['password'])) {
          $password = md5($input['password']);
        } else {
          return false;
        }
        $name = htmlspecialchars($input['name']);
        $fullname = '';
        if (isset($input['fullname'])) {
          $fullname = htmlspecialchars($input['fullname']);
        }
  
        $email = '';
        if (isset($input['email'])) {
          $email = htmlspecialchars($input['email']);
        }
  
        $type = htmlspecialchars($input['type']);
  
        $sql = "INSERT INTO `users` (`name`, `fullname`, `email`, `type`, `password`)
                    VALUES ('$name', '$fullname', '$email', '$type', '$password') ";
        $user = $this->insert($sql);
      } else {
        return false;
      }
    } else {
      return false;
    }

    return $user;
  }
  //--------------------------------------------------------------
  public function getUsers($params = [])
  {
    

    if (!empty($params['keyword'])) {
      if (is_bool($params['keyword']) || is_array($params['keyword']) || is_null($params['keyword']) || is_numeric($params['keyword'])) {
        return 'error';
      }
      //  echo '<br>input ko rỗng';
      $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] . '%"';
      $users = $this->select($sql);
    } else {
      //  echo '<br>input rỗng';
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

  public function sumb($a, $b)
  {
    return $a + $b;
  }
}
