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
}
