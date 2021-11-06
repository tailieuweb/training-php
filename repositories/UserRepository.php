<?php
require_once 'models/UserModel.php';
class UserRepository
{
  public function findUserById($id)
  {
    $userModel = new UserModel();
    $user = $userModel->findUserById($id);
    return $user;
  }
  //--------------------------------------------------------------
  public function auth($userName, $password)
  {
    $userModel = new UserModel();
    $user = $userModel->auth($userName, $password);
    return $user;
  }
  //--------------------------------------------------------------
  public function deleteUserById($id)
  {
    $userModel = new UserModel();
    return $userModel->deleteUserById($id);
  }
  //--------------------------------------------------------------
  public function updateUser($input)
  {
    $userModel = new UserModel();
    $user = $userModel->updateUser($input);
    return $user;
  }
  //--------------------------------------------------------------
  public function insertUser($input)
  {
    $userModel = new UserModel();
    $user = $userModel->insertUser($input);
    return $user;
  }
  //--------------------------------------------------------------
  public function getUsers($params = [])
  {
    $userModel = new UserModel();
    $user = $userModel->getUsers($params);
    return $user;
  }
  public function sumb($a, $b)
  {
    return $a + $b;
  }
}
