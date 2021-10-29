<?php
require_once 'BaseModel.php';
require_once 'UserModel.php';
class Repository
{
   private $userModel;
   private $bankModel;
   //constructor
   public function __construct() {
       $this->$userModel = new UserModel;
       $this->$bankModel = new BankModel;
   }
   public function findUserById($id)
    {
       return $this->userModel->findUserById($id);
    }
    public function findUser($keyword)
    {
        return $this->userModel->findUser($keyword);
    }
    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id)
    {
        return $this->userModel->deleteUserById($id);
    }
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        return $this->userModel->updateUser($input);
    }
    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input)
    {
        return $this->userModel->insertUser($input);
    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = [])
    {
        return $this->userModel->getUsers($params);
    }
/**
     * -----------BANK------------
     */
    public function getBankById($id)
    {
        return $this->userModel->getBankById($id);
    }
    /**
     * Insert bank
     * @param $input
     * @return mixed
     */
    public function insertBank($input)
    {
        return $this->userModel->insertBank($input);
    }
    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateBank($input)
    {
        return $this->userModel->updateBank($input);
    }
    /**
     * Delete bank by id
     * @param $id
     * @return mixed
     */
    public function deleteBankById($id)
    {
        return $this->userModel->deleteBankById($id);
    }
    /**
     * Get Banks follow User Id
     * Get all Banks
     */
    public function getBanks($params = [])
    {
        return $this->userModel->getBanks($params);
    }
}