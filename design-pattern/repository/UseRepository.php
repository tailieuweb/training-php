<?php
require_once './models/BaseModel.php';
require_once './models/UserModel.php';
require_once './models/BankModel.php';
class Repository
{
   protected static $_instance;
   private $userModel;
   private $bankModel;
   //constructor
   public function __construct() {
       $this->userModel = new UserModel;
       $this->bankModel = new BankModel;
   }
   public function getInstance()
    {
        return $this->userModel->getInstance();
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
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password)
    {
        return $this->userModel->auth($userName, $password);
    }


    public function findBankById($id)
    {
        return $this->bankModel->findBankById($id);
    }

    /**
     * Search banks
     * @param array $params
     * @return array
     */
    public function getBanks($params = [])
    {
        return $this->bankModel->getBanks($params);
    }

    public function insertUser_bank($input) {
        return $this->bankModel->insertUser($input);
    }
    protected function insert_bank($sql) {
        return $this->bankModel->getBanks($sql);
    }

    public function updateUser_bank($input) {
        return $this->bankModel->updateBank($input);
    }
    public function deleteBankById($id) {
        return $this->bankModel->deleteBankById($id);
    }
}