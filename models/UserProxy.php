<?php
require "UserModel.php";
class UserProxy extends BaseModel
{
    private ?UserModel $usermodel = null;

    public function findUserById($id)
    {
        $this->getUserModel();
        $this->usermodel->findUserById($id);
    }

    public function findUser($keyword)
    {
        $this->getUserModel();
        $this->usermodel->findUser($keyword);
    }

    public function auth($userName, $password)
    {
        $this->getUserModel();
        $this->usermodel->findUser($userName, $password);
    }

    public function deleteUserById($id)
    {
        $this->getUserModel();
        $this->usermodel->deleteUserById($id);
    }


    public function updateUser($input)
    {
        $this->getUserModel();
        $this->usermodel->deleteUserById($input);
    }

    public function insertUser($input)
    {
        $this->getUserModel();
        $this->usermodel->insertUser($input);
    }

    public function getUsers($params = [])
    {
        $this->getUserModel();
        $this->usermodel->insertUser($params);
    }

    private function getUserModel()
    {
        if (empty($this->usermodel)) {
            $this->usermodel = UserModel::getInstance();
        }
    }
}
